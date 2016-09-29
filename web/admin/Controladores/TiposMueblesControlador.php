<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 24/07/15
 * Time: 12:36
 */

namespace web\admin\Controladores;


use web\admin\DAO\TipoMueblesDAO;
use web\admin\Interfaces\iControlador;

require_once 'DAO/TipoMueblesDAO.php';
require_once 'Interfaces/iControlador.php';

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