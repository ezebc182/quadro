<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 24/07/15
 * Time: 11:32
 */

namespace web\php\Controladores;


use web\php\DAO\MueblesDAO;
use web\php\Interfaces\iControlador;

require_once __DIR__.'/../Interfaces/iControlador.php';
require_once __DIR__.'/../DAO/MueblesDAO.php';

class MueblesControlador implements iControlador
{
    private static $dao;

    function __construct()
    {
        if (self::$dao == null) {
            self::$dao = new MueblesDAO();
        }
    }

    function CrearEntidad($entidad, $parametros = null)
    {
        return self::$dao->Insertar($entidad);
    }

    function EliminarEntidad($entidad, $parametros = null)
    {
        return self::$dao->Eliminar($entidad);
    }

    function ConsultarEntidad($entidad, $parametros = null)
    {
        return self::$dao->ObtenerPorID($entidad);
    }

    function ActualizarEntidad($entidad, $parametros = null)
    {
        return self::$dao->Modificar($entidad);
    }

    function ListarEntidades()
    {
        return self::$dao->ObtenerTodos();
    }


} 