<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 24/07/15
 * Time: 12:36
 */

namespace web\php\Controladores;


use web\php\DAO\TipoMueblesDAO;
use web\php\Interfaces\iControlador;

require_once 'php/DAO/TipoMueblesDAO.php';
require_once 'php/Interfaces/iControlador.php';

class TiposMueblesControlador implements iControlador
{

    private static $dao;

    function __construct()
    {
        if (self::$dao == null) {
            self::$dao = new TipoMueblesDAO();
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

    function ConsultarNombreEntidad($entidad)
    {
        $id = $entidad->getId();
        return self::$dao->ObtenerNombreTipoMueble($id);
    }

} 