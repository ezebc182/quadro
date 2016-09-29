<?php


use \web\php\Modelo\Mueble;
use \web\php\Controladores\MueblesControlador;
use \web\php\Controladores\ImagenesMuebleControlador;
use \web\admin\DAO\AnexosDAO;
use \web\admin\Modelo\Anexo;

require_once 'php/Controladores/MueblesControlador.php';
require_once 'php/Controladores/ImagenesMuebleControlador.php';
require_once 'php/Modelo/Mueble.php';
require_once 'admin/DAO/AnexosDAO.php';
require_once 'admin/Modelo/Anexo.php';


$mControlador = new MueblesControlador();
$mueble = new Mueble();
$url = explode("/", ($_SERVER["REQUEST_URI"]));

#$mueble->setId($url[4]);
$mueble->setId($url[2]);
$mueble = $mControlador->ConsultarEntidad($mueble);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php
    include_once 'Paginas/meta.php';

    include_once 'Paginas/link.php';
    ?>
    <title>Quadro :: Productos / <?php echo $mueble->getNombre(); ?></title>
</head>
<body>
<?php
include_once 'Paginas/header.php';
?>

<div class="wrapper">
    <!--header-->

    <div class="container">

        <h2 class="page-header">
            <?php echo $mueble->getNombre(); ?>
            <small><a href="../../productos" class=" pull-right">
                    Volver a productos</a></small>
        </h2>

        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Imágenes</h4>
                </div>
                <div class="panel-body">
                    <figure>
                        <?php
                        $imgControlador = new ImagenesMuebleControlador();
                        $imagenes = $imgControlador->ObtenerImagenes($mueble);
                        if ($imagenes == null){
                            echo '<img class="img-thumbnail img-responsive principal" src="../../images/img-not-found.jpg" alt="No se encontró la imagen"/>';

                        }
                        else{

                        // TODO: Crear método que busque la imagen principal ("Imagen.jpg").
                        echo '<a href="#" title="' . $mueble->getNombre() . '" class="principal"><img class=" img-principal img-thumbnail img-responsive" src="../../' . $imagenes[0]["PathImagen"]
                            . '" alt="' . $mueble->getNombre() . '"/></a>';

                        ?>
                        <figcaption>
                            <?php
                            for ($i = 0; $i < count($imagenes); $i++) {
                                echo '<div class="col-md-3 port-left">
                                        <a href="../../' . $imagenes[$i]['PathImagen'] . '
                                           title="' . $mueble->getNombre() . '- Foto ' . ($i + 1) . '">
                                            <img title="Click para ampliar"
                                             src="../../' . $imagenes[$i]['PathImagen'] . '" alt="' . $imagenes[$i]['PathImagen'] . '"
                                                 class="miniatura img-responsive zoom-img"/>
                                        </a>
                                    </div>';
                            }
                            }
                            ?>


                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>

        <div class="col-md-5">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Detalle del producto:</h4>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Nombre:</strong>&nbsp;
                            <?php echo $mueble->getNombre(); ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Tipo:</strong>&nbsp;
                            <?php echo $mueble->getTipoMueble(); ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Descripción:</strong>&nbsp;
                            <?php echo $mueble->getDescripcion(); ?>
                        </li>
                        <li class="list-group-item"><strong>Medidas (cm):</strong>
                            &nbsp;Alto:&nbsp;<?php echo $mueble->getAlto(); ?>
                            &nbsp;| Ancho:&nbsp;<?php echo $mueble->getAncho(); ?>
                            &nbsp;| Profundidad:&nbsp;<?php echo $mueble->getProfundidad(); ?>
                        </li>
                        <?php

                        $aDAO = new AnexosDAO();
                        $anexo = $aDAO->ObtenerPorID($mueble);
                        if ($anexo != null) {

                            echo '<li class="list-group-item">
                            <strong>Medidas Anexo:</strong>
                            &nbsp;Alto:&nbsp;' . $anexo->getAlto()
                                . '&nbsp;| Ancho:&nbsp;' . $anexo->getAncho()
                                . '&nbsp;| Profundidad:&nbsp;' . $anexo->getProfundidad()
                                . '</li>';
                        }
                        ?>
                        <li class="list-group-item"><strong>Materiales:</strong>&nbsp;
                            <?php echo $mueble->getMateriales(); ?>
                            <!-- <div class="square" style="background: brown;"></div>
                             <div class="square" style="background: beige;"></div>
                             <div class="square" style="background: black;"></div>-->
                        </li>
                        <!--<li class="list-group-item"><strong>Stock:</strong>&nbsp;Si</li>-->
                        <li class="list-group-item"><strong>Precio:</strong>&nbsp;
                            <span class="badge">
                                $&nbsp;<?php echo $mueble->getPrecio(); ?>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <form class="form">
                        <center>
                            <a mp-mode="dftl" href="https://www.mercadopago.com/mla/checkout/start?pref_id=72893579-eb1e62bf-e1f2-4adb-b9d4-055e9d4ba8ad" name="MP-payButton" class='green-tr-l-sq-arall'>Comprar</a>
                            <!--<button data-toggle="modal" data-target="#modal-comprar-mueble"
                                    class="btn btn-primary btn-lg"
                                    type="button">
                                <i class="fa fa-shopping-cart"></i>&nbsp;Comprar
                            </button>-->
                        </center>

                    </form>
                </div>
            </div>
        </div>


        <div id="modal-comprar-mueble" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#a85489;color:#fff;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Comprar mueble</h4>
                    </div>
                    <div class="modal-body">
                        <p>Sr/a Cliente:</p>
                        <article class="text-justify">
                            Por el momento, vendemos a través de llamadas telefónicas y por formulario de contacto.
                            Próximamente estaremos integrando el servicio de venta online a través de
                            <strong>Mercado Pago &reg;</strong>.
                            <br/>

                            <div class="contacto2">
                                <h5>Contáctenos:</h5>
                                <i class="fa fa-phone"></i>
                                &nbsp;
                                <a href="#">+54 9 351 689-2711</a>&nbsp;
                                |
                                &nbsp;
                                <a href="#">+54 9 351 277-6963</a>
                                <br/>
                                <i class="fa fa-envelope"></i>&nbsp;
                                <a href="../../contacto">Déjenos un mensaje!</a>
                                <br/>
                                <i class="fa fa-facebook"></i>&nbsp;
                                <a target="_blank" href="https://www.facebook.com/quadroequipamiento">Visite
                                    nuestra página en facebook!</a>
                            </div>
                        </article>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
    <!--container-->
    <div class="push"></div>

</div>
<!--wrapper-->
<!--footer-->
<?php
include_once 'Paginas/footer.php';
?>
<!--footer-->
<?php
include_once 'Paginas/scripts.php';
?>


<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="../../third/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="../../third/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen"/>
<script type="text/javascript" src="../../third/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="../../third/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css"
      media="screen"/>
<script type="text/javascript" src="../../third/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="../../third/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<link rel="stylesheet" href="../../third/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css"
      media="screen"/>
<script type="text/javascript" src="../../third/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script src="https://rawgithub.com/kayahr/jquery-fullscreen-plugin/master/jquery.fullscreen.js"></script>
<script>

    $(".miniatura").click(function (e) {
        e.preventDefault();
        var src = $(this).attr("src");
        var principal = $(".img-principal");
        $(principal).attr("src", src);


    });
    $(".principal").click(function (e) {
        e.preventDefault();


        $.fancybox.open([
            {
                href: $(".img-principal").attr("src"),
                title: $(".principal").attr("title")

            }
        ], {
            padding: 0,
            afterShow: function () {
                $('<div title="Pantalla completa" class="expander"><i class="fa fa-plus-square-o fa-2x"></i></div>').appendTo(this.inner).click(function () {
                    $(document).toggleFullScreen();
                });
                $("a.fancybox-close").append('<div style="margin-top: 7px;margin-left: 13px;font-weight: 400 !important;">X</div>');
                $("a.fancybox-close").attr("title", "Cerrar");
            },
            afterClose: function () {
                $(document).fullScreen(false);
            }

        });

        return false;

    });
</script>
<script type="text/javascript">
    (function(){function $MPBR_load(){window.$MPBR_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;s.src = ("https:"==document.location.protocol?"https://www.mercadopago.com/org-img/jsapi/mptools/buttons/":"http://mp-tools.mlstatic.com/buttons/")+"render.js";var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPBR_loaded = true;})();}window.$MPBR_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPBR_load) : window.addEventListener('load', $MPBR_load, false)) : null;})();
</script>
</body>
</html>