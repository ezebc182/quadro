<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 16/07/15
 * Time: 20:03
 */

namespace web\php\Interfaces;


interface iSesion
{
    function IniciarSesion($entidad, $array = null);

    function CerrarSesion($entidad, $array = null);


} 