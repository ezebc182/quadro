<?php

/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 16/07/15
 * Time: 20:16
 */


use \web\php\Modelo\Usuario;
use \web\php\Controladores\UsuariosControlador;


require_once '../php/Modelo/Usuario.php';
require_once '../php/Controladores/UsuariosControlador.php';


$usuario = new Usuario();
$usuarioControlador = new UsuariosControlador();
if (isset($_GET['accion']) && $_GET['accion'] == 'cerrar-sesion') {
    $usuario->setNombre($_SESSION['usuario']);
    if ($usuarioControlador->CerrarSesion($usuario)) {
        header('location: ./login');
        exit();
    }

}
if (isset($_POST['usuario']) && isset($_POST['password'])) {


    $usuario->setNombre($_POST['usuario']);
    $usuario->setPassword($_POST['password']);
    $resultado = $usuarioControlador->IniciarSesion($usuario);


    if ($resultado) {

        header('location: ./index');
        exit();
    }
    header('location: ./login');
} else {
    header('location: ./login');
}