<?php
/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/
use \web\admin\DAO\MueblesDAO;
use \web\admin\DAO\ImagenesMuebleDAO;
use \web\admin\Conexion;
use \web\admin\Modelo\Anexo;
use \web\admin\DAO\TipoMueblesDAO;
use \web\admin\DAO\AnexosDAO;
use \web\admin\Controladores\TiposMueblesControlador;
use \web\admin\Controladores\MueblesControlador;
use \web\admin\Controladores\ImagenesMuebleControlador;
use \web\admin\Modelo\TipoMueble;
use \web\admin\Modelo\Mueble;


require_once '../admin/db/Conexion.php';
#require_once '../admin/Interfaces/iDAOBase.php';
require_once '../admin/Modelo/Mueble.php';
require_once '../admin/Modelo/TipoMueble.php';
require_once '../admin/Modelo/Anexo.php';
require_once '../admin/Controladores/ImagenesMuebleControlador.php';
require_once '../admin/Controladores/MueblesControlador.php';
#require_once '../admin/Controladores/TiposMueblesControlador.php';
require_once '../admin/DAO/MueblesDAO.php';
require_once '../admin/DAO/ImagenesMuebleDAO.php';
require_once '../admin/DAO/TipoMueblesDAO.php';
require_once '../admin/DAO/AnexosDAO.php';


//comprobamos que sea una petición ajax
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if (isset($_POST['funcion'])) {
        switch ($_POST['funcion']) {
            case 'eliminar':
                $idMueble = $_POST['id'];
                if (EliminarMueble($idMueble)) {
                    echo json_encode(array('Mensaje' => 'Ok'));
                    return;
                } else {
                    echo json_encode(array('Mensaje' => 'Fail'));
                    return;
                }

                break;
            case 'editar':
                break;
        }
    }

    $con = Conexion::Conectar();
    try {
        $con->beginTransaction();

        //obtenemos el archivo a subir
        $files = $_FILES['imagenes']['name'];
        $tmDAO = new TipoMueblesDAO();
        $muebleDAO = new MueblesDAO();
        $mueble = new Mueble();
        $mueble->setNombre($_POST['NombreMueble']);


        if ($muebleDAO->EstaRepetido($mueble)) {
            die("<h4 class='bg-danger'><p class='text-danger'><i class='fa fa-times'></i>&nbsp;Ya existe un mueble con ese nombre.</p></h4>");
        }

        $tipoMueble = $tmDAO->ObtenerNombreTipoMueble($_POST['TipoMueble']);
        if ($tipoMueble == null) {
            die("Error en la inserción");
        }

        $nombreMueble = $_POST["NombreMueble"];
        $directorio = "../images/files" . "/" . $tipoMueble . "/" . $nombreMueble;


        $i = 0;
        //comprobamos si el archivo ha subido

        if (!is_dir($directorio)) {
            mkdir($directorio, 0755, true);
        }
        foreach ($files as $file) {
            if (move_uploaded_file($_FILES['imagenes']['tmp_name'][$i], $directorio . '/' . $_FILES['imagenes']['name'][$i])) {
                echo "<p><i class='fa fa-check' style='color:green;'></i>&nbsp;El archivo <strong>" . $_FILES['imagenes']['name'][$i] . "</strong> se subió correctamente.</p><br>";
                $i++;
            } else {

                rmdir($directorio);
                die("<h4 class='bg-danger'><p class='text-danger'><i class='fa fa-times'></i>&nbsp;Ocurrió un error en la subida de las imágenes.<br>
                 Inténtelo de nuevo más tarde o contáctese con el administrador.</p></h4>");
            }
        }


        if (is_dir($directorio)) {

            $mueble->setNombre($_POST['NombreMueble']);
            $mueble->setDescripcion($_POST['Descripcion']);
            $mueble->setMateriales($_POST['Materiales']);
            $mueble->setPrecio($_POST['Precio']);
            $mueble->setTipoMueble($_POST['TipoMueble']);
            $mueble->setAlto($_POST['Alto']);
            $mueble->setAncho($_POST['Ancho']);
            $mueble->setProfundidad($_POST['Profundidad']);


            $resultado = $muebleDAO->Insertar($mueble);

            if ($resultado["Operacion"]) {

                $fotos = new FilesystemIterator($directorio, FilesystemIterator::SKIP_DOTS);
                $path = substr(str_replace(".", "", $directorio), 1);

                crearMiniatura($fotos, $path);

                $resultados_parciales = array();
                $parametros = array();
                $imagenesMuebleDAO = new ImagenesMuebleDAO();
                $parametros["MuebleID"] = $resultado["UltimoID"];


                if (isset($_POST['anexo']) && $_POST['anexo'][0] != "") {
                    $anexo = new Anexo();
                    $anexo->setMuebleID($resultado["UltimoID"]);
                    $anexo->setAlto($_POST['anexo'][0]);
                    $anexo->setAncho($_POST['anexo'][1]);
                    $anexo->setProfundidad($_POST['anexo'][2]);
                    $aDAO = new AnexosDAO();
                    $aDAO->Insertar($anexo);

                }

                foreach ($fotos as $foto) {


                    $parametros["PathImagen"] = $path . '/' . $foto->getFilename();
                    $parametros["Tamanio"] = $foto->getSize();
                    $parametros["Extension"] = $foto->getExtension();


                    $resultados_parciales [] = $imagenesMuebleDAO->Insertar(null, $parametros);


                } // foreach


                if (array_search(false, $resultados_parciales, true)) {

                    $con->rollBack();
                    rmdir($directorio);
                    die("<h4 class='bg-danger'><p class='text-danger'><i class='fa fa-times'></i>
                        &nbsp;Ocurrió un error intentando registrar el mueble.<br>
                        Inténtelo de nuevo más tarde o contáctese con el administrador.</p></h4>");
                }
                $con->commit();
                echo "<h4 class='bg-success'><p class='text-success'><i class='fa fa-check'></i>
                &nbsp;El mueble se registró exitosamente!</p></h4>";

            }
            // if query1
        }
    } catch
    (PDOException $e) {
        $con->rollBack();
        echo $e->getMessage();


    }


} else {
    throw new Exception("Error Processing Request", 1);
}

function crearMiniatura($fotos, $path)
{

    foreach ($fotos as $foto) {


// Fichero y nuevo tamaño
        $directorio = $path;
        $nombreFoto = $foto->getFileName();
        $nombre_fichero = rtrim("../" . $path . "/" . $nombreFoto);

        $porcentaje = 0.427;

// Tipo de contenido
#header('Content-Type: image/jpeg');

// Obtener los nuevos tamaños
        list($ancho, $alto) = getimagesize($nombre_fichero);
        $nuevo_ancho = $ancho * $porcentaje;
        $nuevo_alto = $alto * $porcentaje;

// Cargar
        $thumb = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
        $origen = imagecreatefromjpeg($nombre_fichero);


// Cambiar el tamaño
        imagecopyresized($thumb, $origen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho, $alto);

// Imprimir

#imagejpeg($thumb);

#header('Content-Type: text/html');
        $nombreFoto = str_replace(".jpg", "-mini.jpg", $nombreFoto);
        imagejpeg($thumb, "../" . $directorio . "/" . $nombreFoto);

    }
}

function EliminarMueble($id)
{
    $mControlador = new MueblesControlador();
    $mueble = new Mueble();
    $mueble->setId($id);
    if ($mControlador->EliminarEntidad($mueble)) {
        return true;
    }
    return false;
}