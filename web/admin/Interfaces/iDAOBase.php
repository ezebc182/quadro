<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 16/06/15
 * Time: 15:43
 */

namespace web\admin\Interfaces;


interface iDAOBase
{
    function Insertar($entidad, $array = null);

    function Modificar($entidad, $array = null);

    function Eliminar($entidad, $array = null);

    function ObtenerPorID($entidad, $array = null);

    function ObtenerTodos();
} 