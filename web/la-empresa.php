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


        <h3>LA EMPRESA</h3>
        <style>
            .jumbotron {
                background-color: #a85489;
                color: #ffffff;
                border-radius: 0 !important;
            }

        </style>
        <div class="jumbotron text-justify">
            <p>
                Quadro es una empresa dedicada al diseño, desarrollo y fabricación de equipamientos para

                viviendas y oficinas.

                Nuestra línea de productos abarca muebles de cocina, muebles de baño, mesas bajas, muebles de

                TV, mesas de comedor, mesas de luz, bibliotecas y escritorios. Nuestros productos apuestan a

                brindar una solución que se destaque por su diseño, calidad y compromiso con el medio ambiente.

                A través del trabajo en conjunto conseguimos como resultado la calidad de nuestros productos, los

                cuales son un fiel reflejo del aporte, la pasión y la responsabilidad con que cada uno de nosotros

                realiza su trabajo.
            </p>
            <br>
            <br>

            <div class="row">
                <div class="col-sm-4">
                    <p>Misión:</p> Ofrecer a nuestros clientes una amplia gama de muebles para
                    viviendas y oficinas, con características que cuidan tanto los aspectos estéticos como funcionales a
                    precios competitivos.
                </div>
                <div class="col-sm-4">
                    <p>Visión:</p> Consolidarnos como una empresa líder en el mercado y en
                    continuo crecimiento que se distinga por proporcionar una excelente calidad de servicios y
                    productos.
                </div>
                <div class="col-sm-4">
                    <p>Valores:</p>
                    <center>
                        <ul class="valores">
                            <li>
                                <i class="fa fa-check"></i>
                                &nbsp;
                                Responsabilidad
                            </li>
                            <li>
                                <i class="fa fa-check"></i>
                                &nbsp;
                                Productividad
                            </li>
                            <li>
                                <i class="fa fa-check"></i>
                                &nbsp;
                                Superación
                            </li>

                            <li>
                                <i class="fa fa-check"></i>
                                &nbsp;
                                Calidad
                            </li>
                            <li>
                                <i class="fa fa-check"></i>
                                &nbsp;
                                Compromiso
                            </li>
                            <li>
                                <i class="fa fa-check"></i>
                                &nbsp;
                                Confianza
                            </li>

                        </ul>
                    </center>
                </div>
            </div>


        </div>


        <h3>ARQUITECTOS</h3>

        <div class="jumbotron">
            <div class="row">
                <div class="col-sm-6">
                    <div class="col-sm-3">
                        <center>
                            <img src="images/juan.jpg" class="img-circle img-responsive">
                        </center>
                    </div>
                    <div class="col-sm-9  text-justify">
                        <p>
                            Juan Pablo Achimón nació el 6 de marzo del año 1984 en Córdoba, Argentina.
                            Es arquitecto graduado de la Facultad de Arquitectura, Urbanismo y Diseño de la universidad
                            nacional
                            de Córdoba (año 2008) y co-fundador de la empresa Quadro Equipamiento.
                        </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="col-sm-3">
                        <center>
                            <img src="images/seba.jpg" class="img-circle img-responsive">
                        </center>

                    </div>
                    <div class="col-sm-9 text-justify">
                        <p>
                            Sebastián Achimón nació el 26 de febrero del año 1988 en Rio Negro, Argentina.
                            Es arquitecto egresado de la Facultad de Arquitectura, Urbanismo y Diseño de la universidad
                            nacional
                            de Córdoba (año 2012) y co-fundador de la empresa Quadro Equipamiento.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/container-->
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
</body>

</html>