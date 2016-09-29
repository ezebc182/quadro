<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 24/07/15
 * Time: 11:32
 */

namespace web\admin\Controladores;


use web\admin\DAO\MueblesDAO;
use web\admin\Interfaces\iControlador;

require_once 'Interfaces/iControlador.php';
require_once 'DAO/MueblesDAO.php';

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

    function Existe($entidad)
    {
        return self::$dao->EstaRepetido($entidad);
    }


} 