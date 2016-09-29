<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 19/07/15
 * Time: 20:16
 */

namespace web\php\Interfaces;


interface iControlador {

    function CrearEntidad($entidad, $parametros = null);

    function EliminarEntidad($entidad, $parametros = null);

    function ConsultarEntidad($entidad, $parametros = null);

    function ActualizarEntidad($entidad, $parametros = null);

    function ListarEntidades();
} 