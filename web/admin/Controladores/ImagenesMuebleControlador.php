<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 24/07/15
 * Time: 11:52
 */

namespace web\admin\Controladores;


use web\admin\DAO\ImagenesMuebleDAO;
use web\admin\Interfaces\iControlador;

require_once 'Interfaces/iControlador.php';
require_once 'DAO/ImagenesMuebleDAO.php';

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
        $idMueble = $entidad->getId();
        if (count(self::$dao->ObtenerImagenesMueble($idMueble)) >= 0) {
            return self::$dao->Eliminar($entidad);
        }
        return 0;



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
        return self::$dao->ObtenerMiniaturaPorID($entidad);
    }


} 