<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 30/07/15
 * Time: 14:26
 */

$url = explode("/", ($_SERVER["REQUEST_URI"]));
if ($url[1] == 'detalle-producto') {

    print('

<header>
    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="container-fluid">

            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../../">
                <img src="../../images/quadro_logo.png" class="img-responsive">
            </a>
        </div>

        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li id="home"><a href="../../">Home</a></li>
                <li id="la-empresa"><a href="../../la-empresa">¿Quiénes somos?</a></li>
                <li class="active" id="productos"><a href="../../productos">Productos</a></li>
                <li id="contacto"><a href="../../contacto">Contacto</a></li>

            </ul>
        </div>
        </div>
        </div>

    </nav>

</header>');
    return;
}

print('

<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
    <div class="container">

            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index">
                <img src="images/quadro_logo.png" class="img-responsive">
            </a>
        </div>

        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav text-center">
                <li id="home"><a href="index">Home</a></li>
                <li id="la-empresa"><a href="la-empresa">¿Quiénes somos?</a></li>
                <li id="productos"><a href="productos">Productos</a></li>
                <li id="contacto"><a href="contacto">Contacto</a></li>

            </ul>
        </div>
        </div>
        </div>
    </nav>

</header>');


