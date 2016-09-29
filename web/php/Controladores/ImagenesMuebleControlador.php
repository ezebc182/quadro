<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 24/07/15
 * Time: 11:52
 */

namespace web\php\Controladores;


use web\php\DAO\ImagenesMuebleDAO;
use web\php\Interfaces\iControlador;


require_once __DIR__ . '/../Interfaces/iControlador.php';
require_once __DIR__ . '/../DAO/ImagenesMuebleDAO.php';

class ImagenesMuebleControlador implements iControlador
{

    private static $dao;

    function __construct()
    {
        if (self::$dao == null) {
            self::$dao = new ImagenesMuebleDAO();
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

    function ObtenerImagenes($entidad)
    {
        $id = $entidad->getId();
        return self::$dao->ObtenerImagenesMueble($id);
    }

    function ConsultarMiniaturas($entidad)
    {
        return self::$dao->ObtenerMiniaturaPorID($entidad->getId());
    }


} 