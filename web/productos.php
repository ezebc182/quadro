<?php
use \web\php\DAO\TipoMueblesDAO;
use  \web\php\DAO\MueblesDAO;
use \web\php\DAO\ImagenesMuebleDAO;

require_once 'php/Interfaces/iDAOBase.php';
require_once 'php/db/Conexion.php';
require_once 'php/DAO/ImagenesMuebleDAO.php';
require_once 'php/DAO/TipoMueblesDAO.php';
require_once 'php/DAO/MueblesDAO.php';
require_once 'php/Modelo/Mueble.php';
require_once 'php/Modelo/TipoMueble.php';
?>
<!doctype html>
<html>

<head>

    <?php
    include_once 'Paginas/meta.php';

    include_once 'Paginas/Titulo.php';

    include_once 'Paginas/link.php';
    ?>


</head>

<body>

<div class="wrapper">
    <div class="container">
        <!--header-->
        <?php
        include_once 'Paginas/header.php';
        ?>

        <!--//header-->


        <h3>PRODUCTOS</h3>


        <div class="jumbotron">
            <div class="text-justify">
                <h3>¡Bienvenido/a!</h3>

                <p>Le presentamos nuestro catálogo de muebles, esperamos que sean de su agrado.</p>

                <p>Por cualquier consulta, estamos a su disposición.</p>
            </div>
        </div>
        <div class="col-md-3">
            <h4 class=""><i class="fa fa-filter"></i>&nbsp;Filtrar por:</h4>

            <ul class="mueblesFilter list-group text-center">
                <li onclick="filtrar(this)" class="list-group-item filtro active">
                    <a id="clickInicio" href="#" data-filter="*" class=" current">Todas</a>
                </li>
                <?php
                $tipoMuebleDAO = new TipoMueblesDAO();
                $tiposMueble = array();
                $tiposMueble = $tipoMuebleDAO->ObtenerTodos();

                foreach ($tiposMueble as $tipoMueble) {
                    echo '<li onclick="filtrar(this)" class="list-group-item filtro">'
                        . '<a href="#" data-filter=".'
                        . implode("-", preg_split("/[\s]+/", strtolower($tipoMueble->getNombre())))
                        . '">'
                        . $tipoMueble->getNombre()
                        . '</a>'
                        . '</li>';
                }
                ?>


            </ul>
            <h4 class="text-center">Resultados:&nbsp;<span id="cantidad-productos" class="badge"></span></h4>
        </div>

        <div class="col-md-9" id="contenedor-productos">
            <div id="mueblesContainer" class="hidden grid "></div>
            <div class="cargando hidden">
                <div class="texto">
                    <i class="fa fa-spinner fa-pulse fa-4x"></i>

                    <h3>Cargando</h3>
                </div>
            </div>

        </div>
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
<script src="js/isotope.pkgd.min.js"></script>
<script src="third/ImageLoaded/imageloaded.min.js"></script>
<script src="js/paginas/activarActivas.js"></script>
<script src="js/paginas/productos.js"></script>

<script>
    var $container;
    $(document).ready(function () {

        cargarProductos();


    });
</script>


</body>
</html>