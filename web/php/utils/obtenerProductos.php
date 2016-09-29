<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 15/08/15
 * Time: 18:13
 */


use \web\php\Controladores\ImagenesMuebleControlador;
use \web\php\Controladores\MueblesControlador;


require_once __DIR__ . '/../Controladores/ImagenesMuebleControlador.php';
require_once __DIR__ . '/../Controladores/MueblesControlador.php';

$listaMuebles = null;
$imagen = null;
$muebleControlador = new MueblesControlador();
$muebles = $muebleControlador->ListarEntidades();
$imagenControlador = new ImagenesMuebleControlador();

foreach ($muebles as $mueble) {

    $imagen_path = $imagenControlador->ConsultarMiniaturas($mueble);

    if (empty($imagen_path["PathImagen"])) {
        $imagen = __DIR__ . "../../images/img-not-found.jpg";

    }else{

        $imagen = $imagen_path["PathImagen"];
    }
    $imagenes = $imagenControlador->ObtenerImagenes($mueble);
    $obj = array(
        "Id" => $mueble->getId(),
        "Nombre" => $mueble->getNombre(),
        "TipoMueble" => $mueble->getTipoMueble(),
        "Imagenes" => $imagenes
    );
    $listaMuebles[] = $obj;


}

echo json_encode(array("Muebles" => $listaMuebles, "Estado" => 'Ok'));

