<?php
/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/
session_name('quadro');
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ./login");
}


use \web\admin\Modelo\Mueble;
use \web\admin\Modelo\TipoMueble;
use \web\admin\Controladores\MueblesControlador;
use \web\admin\Controladores\TiposMueblesControlador;


require_once 'Controladores/MueblesControlador.php';
require_once 'Controladores/TiposMueblesControlador.php';
require_once 'Modelo/TipoMueble.php';
require_once 'Modelo/Mueble.php';


$mueble = new Mueble();
$mControlador = new MueblesControlador();

?>

<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">
<head>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Quadro :: Administración</title>
</head>
<body>


<div class="container">
<!--<div id="sidebar">
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Portafolio</a></li>
        <li><a href="#">Productos</a></li>
        <li><a href="#">Contacto</a></li>
    </ul>
</div>-->
<header id="header">

    <nav class="navbar" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index">
                    <img class="img-responsive" src="../images/quadro_logo_png.png"
                         alt="logo"></a>

            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-user"></i>&nbsp; <?php echo $_SESSION['usuario']; ?>
                            <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="index"><i class="fa fa-plus"></i> Mi cuenta </a></li>
                            <li class="divider"></li>
                            <li><a href="validarUsuario.php?accion=cerrar-sesion"><i class="fa fa-power-off"></i> Salir</a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>

        </div>
        <!--/.container-->
    </nav>
    <!--/nav-->

</header>
<!--/header-->

<!--<div class="main-content">
<a href="#" data-toggle=".container" class="btn btn-primary" id="sidebar-toggle">
    <i class="fa fa-bars"></i>
</a>-->
<!--<div class="content">-->

<div id="modalTipoMueble" data-backdrop="static" data-keyboard="false" class="modal bs-example-modal-sm fade"
     tabindex="-1"
     role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#333 !important;">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                -->
                <center>
                    <h4 class="modal-title" style="color:white !important;" id="myModalLabel">
                        Nuevo tipo de mueble</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="hidden" id="mensajeTipoMueble"></div>
                <form id="frmTipoMueble" class="form form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-2">Nombre:</label>

                        <div class="col-sm-7">
                            <input type="text" class="input-lg form-control" id="txtNombreTipoMueble">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Descripción:</label>

                        <div class="col-sm-7">
                            <textarea class="form-control input-lg" id="txtDescripcionTipoMueble"></textarea>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">

                <a href="#" id="btnGuardarTipoMueble" class="btn btn-success">Guardar</a>
                <a href="#" data-dismiss="modal" id="btnCancelarTipoMueble" class="btn btn-default">Cancelar</a>
            </div>
        </div>
    </div>
</div>
<div id="container-botones" class="">

    <h2 class="page-header"> Administración de muebles</h2>
    <a href="#" id="btnNuevoMueble" class="btn btn-success btn-lg">
        <i class="fa fa-plus"></i>
        &nbsp;Nuevo
    </a>
    <a href="#" id="btnVerListadoMuebles" class="btn btn-primary btn-lg">
        <i class="fa fa-th-list"></i>
        &nbsp;Ver listado
    </a>
</div>
<div id="container-tipos-de-muebles" class="">

    <h2 class="page-header"> Administración de tipos de muebles</h2>
    <a href="#" data-toggle="modal" data-target="#modalTipoMueble" id="btnNuevoTipoMueble"
       class="btn btn-success btn-lg">
        <i class="fa fa-plus"></i>
        &nbsp;Nuevo
    </a>
    <a href="#" id="btnVerListadoTiposMuebles" class="btn btn-primary btn-lg">
        <i class="fa fa-th-list"></i>
        &nbsp;Ver listado
    </a>


</div>

<div id="container-nuevo-mueble" class="hidden " style="margin-top: 5%;">

<h2 class="page-header">

    Registro de muebles
    <small class="pull-right"><a href="#" class="btnVolver">Volver</a></small>
</h2>
<?php
if (!isset($_GET['id'])) {
    #die("No hay nada para mostrar");
}
if (isset($_GET['id'])) {
    $get = explode("/", $_GET['id']);
    $id = $get[0];


    if ($get[1] == 'Editar') {


        #$muebleDAO = new MueblesDAO();
        $mueble->setId($_GET['id']);
        $seleccionado = $mControlador->ConsultarEntidad($mueble);

        #$seleccionado = $muebleDAO->ObtenerPorID($_GET['id']);

        $mueble->setId($seleccionado->getId());
        $mueble->setNombre($seleccionado->getNombre());
        $mueble->setDescripcion($seleccionado->getDescripcion());
        $mueble->setTipoMueble($seleccionado->getTipoMueble());
        $mueble->setAlto($seleccionado->getAlto());
        $mueble->setAncho($seleccionado->getAncho());
        $mueble->setProfundidad($seleccionado->getProfundidad());
        $mueble->setMateriales($seleccionado->getMateriales());
        $mueble->setPrecio($seleccionado->getPrecio());
        $mueble->setFechaAlta($seleccionado->getFechaAlta());
        $mueble->setFechaBaja($seleccionado->getFechaBaja());


    }
}
?>

<form id="frmMuebles" action="server.php" class="from form-horizontal" method="post" enctype="multipart/form-data">
<div class="col-sm-offset-1">
<div class="form-group">
    <label for="txtNombreMueble" class="control-label col-sm-2">
        Nombre:
    </label>

    <div class="col-sm-7">
        <input type="text" id="txtNombreMueble" name="NombreMueble" class="input-lg form-control"
            />
    </div>
</div>
<div class="form-group">
    <label for="txtDescripcionMueble" class="control-label col-sm-2">
        Descripci&oacute;n:
    </label>

    <div class="col-sm-7">
        <textarea class="input-lg form-control" placeholder="Descripción" name="Descripcion"
                  id="txtDescripcionMueble" rows="5"></textarea>
    </div>
</div>
<div class="form-group">
    <label for="sltTipoMueble" class="control-label col-sm-2">
        Tipo:
    </label>

    <div class="col-sm-7">
        <select id="sltTipoMueble" name="TipoMueble" class="input-lg form-control">
            <option value="">Seleccione</option>
            <?php
            $tmControlador = new TiposMueblesControlador();
            #$tmDAO = new TipoMueblesDAO();
            $tipoMuebles = array();
            #$tipoMuebles = $tmDAO->ObtenerTodos();
            $tipoMuebles = $tmControlador->ListarEntidades();

            foreach ($tipoMuebles as $tipoMueble) {
                echo '<option value="' . $tipoMueble->getId() . '">'
                    . $tipoMueble->getNombre()
                    . '</option>';
            }


            ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="txtMateriales" class="control-label col-sm-2">
        Materiales:
    </label>

    <div class="col-sm-7">

        <textarea class="form-control input-lg" placeholder="Materiales" name="Materiales" id="txtMateriales"
                  rows="5"></textarea>
    </div>
</div>
<div class="form-group">


    <label for="txtAlto" class="control-label col-sm-2">
        Alto:
    </label>

    <div class="col-sm-2">
        <div class="input-group">
            <input name="Alto" id="txtAlto" type="number" min="0" step="1" class="numero input-lg form-control"
                />
            <span class="input-group-addon">cm</span>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="txtAncho" class="control-label col-sm-2">
        Ancho:
    </label>

    <div class="col-sm-2">
        <div class="input-group">
            <input name="Ancho" id="txtAncho" type="number" min="0" step="1"
                   class="numero input-lg form-control"
                />
            <span class="input-group-addon">cm</span>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="txtProfundidad" class="control-label col-sm-2">
        Profundidad:
    </label>

    <div class="col-sm-2">
        <div class="input-group">
            <input name="Profundidad" id="txtProfundidad" type="number" min="0" step="1"
                   class="numero input-lg form-control"
                />
            <span class="input-group-addon">cm</span>
        </div>
    </div>

</div>
<div class="form-group">
    <label class="control-label col-sm-2">¿Posee anexo?</label>

    <div class="col-sm-7">
        <div class="radio">
            <label><input type="radio" value="anexoNo" name="anexo">Si</label>
            &nbsp;&nbsp;
            <label><input type="radio" value="anexoSi" name="anexo" checked="checked">No</label>
        </div>
    </div>

</div>
<div id="anexo" class="hidden">

    <div class="form-group">
        <label for="txtAltoAnexo" class="text-info control-label col-sm-2">
            Alto anexo:
        </label>

        <div class="col-sm-2">
            <div class="input-group">
                <input name="anexo[]" id="txtAltoAnexo" type="number" min="0" step="1"
                       class="numero input-lg form-control"
                    />
                <span class="input-group-addon">cm</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="txtAnchoAnexo" class="text-info control-label col-sm-2">
            Ancho anexo:
        </label>

        <div class="col-sm-2">
            <div class="input-group">
                <input name="anexo[]" id="txtAnchoAnexo" type="number" min="0" step="1"
                       class="numero input-lg form-control"
                    />
                <span class="input-group-addon">cm</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="txtProfundidadAnexo" class="text-info control-label col-sm-2">
            Profundidad anexo:
        </label>

        <div class="col-sm-2">
            <div class="input-group">
                <input name="anexo[]" id="txtProfundidadAnexo" type="number" min="0" step="1"
                       class="numero input-lg form-control"
                    />
                <span class="input-group-addon">cm</span>
            </div>
        </div>

    </div>
</div>
<div class="form-group">
    <label for="txtPrecio" class="control-label col-sm-2">
        Precio:
    </label>

    <div class="col-sm-3 ">
        <div class="input-group">
            <span class="input-group-addon">$</span>
            <input name="Precio" id="txtPrecio" type="number" step="100.00" class="numero input-lg form-control"
                   pattern="^[0-9]$"
                   min="0"
                   max="100000"
                   value="<?php echo $mueble != null ? $mueble->getPrecio() : ''; ?>"/>
            <span class="input-group-addon">.00</span>
        </div>


    </div>
</div>
<div class="form-group">
    <label for="imagenesExtra" class="control-label col-sm-2">Im&aacute;genes:</label>

    <div id="imagenesExtra" class="col-sm-5">
        <!--<input type="hidden" name="MAX_FILE_SIZE" value="300000"/>-->
        <input id="imagenes" name="imagenes[]" type="file" class="input-lg imagen form-control"
               accept=".jpg"/>
    </div>
    <div class="col-sm-1">
        <a id="btnAgregarImagen" href="#" class="btn btn-primary btn-lg">
            <i class="fa fa-plus"></i>
            &nbsp;Agregar
        </a>

    </div>


</div>
<div id="barra" class="form-group">
    <label class="col-sm-2"></label>

    <div class="col-sm-7">
        <center>
            <div class="progress">
                <div class="bar"></div>
                <div class="percent">0%</div>
            </div>

            <div id="status"></div>
        </center>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-7 col-sm-offset-2">
        <button type="submit" id="btnGuardar" class="btn btn-success btn-lg btn-block">
            <i class="fa fa-save"></i>
            &nbsp;Guardar
        </button>
    </div>
</div>
</div>
<div class="mensaje">

</div>
</form>

</div>
<div class="hidden" id="container-listado-muebles">

    <h2 class="page-header">Listado de muebles
        <small class="pull-right"><a href="#" class="btnVolver">Volver</a></small>
    </h2>
    <table class="table table-responsive table-hover">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Tipo</th>
            <th>Medidas(cm)</th>
            <th>Materiales</th>
            <th>Precio</th>
            <th>Acciones</th>

        </tr>
        </thead>
        <tbody>
        <div class="container">
            <?php

            #$muebleDAO = new MueblesDAO();
            $muebles = $mControlador->ListarEntidades();

            foreach ($muebles as $mueble) {
                echo '<tr id="' . $mueble->getId() . '">'
                    . '<td>' . $mueble->getNombre() . '</td>'
                    . '<td>' . $mueble->getDescripcion() . '</td>'
                    . '<td>' . $mueble->getTipoMueble() . '</td>'
                    . '<td> Alto:' . $mueble->getAlto() . ' -Ancho: ' . $mueble->getAncho() . ' -Prof: ' . $mueble->getProfundidad() . '</td>'
                    . '<td>' . $mueble->getMateriales() . '</td>'
                    . '<td>' . $mueble->getPrecio() . '</td>'
                    . '<td colspan="2">'
                    . '<a  href="#" title="Editar"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;'
                    . '<a  href="#" onclick="eliminarMueble(this.parentNode.parentNode.id)" title="Eliminar"><i class="fa fa-times"></i></a>'
                    . '</td>'
                    . '</tr>';
                #. '<td><a href="' . $mueble->getId() . '/' . $mueble->getNombre() . '/Editar" title="Editar"><i class="fa fa-edit"></i></a>
                #        &nbsp;&nbsp;
                #        <a href="' . $mueble->getId() . '/' . $mueble->getNombre() . '/Eliminar" title="Eliminar"><i class="fa fa-times"></i></a>
                #        </td>'
                #. '</tr>';

            }
            ?>
        </div>
        </tbody>
    </table>
</div>

<!--</div>
</div>-->
</div>
<script src="../../js/jquery.min.js"></script>
<script src="../../js/bootstrap/js/bootstrap.min.js"></script>

<!--<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
 Latest compiled and minified JavaScript
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
-->

<script src="../js/jquery.form.js"></script>
<script src="../js/admin/abm-muebles.js"></script>

<script>
    $(document).ready(function () {

        $("[data-toggle]").click(function () {
            var toggle_el = $(this).data("toggle");
            $(toggle_el).toggleClass("open-sidebar");
        });

    });

    $('#modalTipoMueble').on('shown.bs.modal', function () {
        $("#mensajeTipoMueble").addClass("hidden");
        $("#frmTipoMueble").removeClass("hidden");
        $("#txtNombreTipoMueble").focus();
    });

    $('input[type=radio][name=anexo]').change(function (e) {
        e.preventDefault();
        $("#anexo").find('input').val('');
        $("#anexo").toggleClass("hidden");


    });

</script>
<script>
    function eliminarMueble(id) {
        this.event.preventDefault();
        var $id = id;

        $.ajax({
                method: 'post',
                url: 'server.php',
                data: {funcion: 'eliminar', id: $id},
                beforeSend: function () {

                },
                success: function (rta) {
                    var obj = JSON.parse(rta);
                    if (obj.Mensaje === 'Ok') {
                        $("tr#" + id).fadeTo("slow", 0.7, function () {
                            $(this).remove();

                        });
                        return;
                    }
                    alert('Ocurrió un error al eliminar el mueble');
                },
                error: function (e) {
                    alert('Error del servidor ' + e);


                }

            }
        )
    }
</script>
</body>
</html>
