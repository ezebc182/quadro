<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 16/07/15
 * Time: 21:15
 */

namespace web\admin\Controladores;



use web\admin\Interfaces\iControlador;
use web\admin\Interfaces\iSesion;
use web\admin\DAO\SesionDAO;
use web\admin\DAO\UsuarioDAO;


require_once '../admin/Interfaces/iSesion.php';
require_once '../admin/Interfaces/iControlador.php';
require_once '../admin/DAO/SesionDAO.php';
require_once '../admin/DAO/UsuarioDAO.php';


class UsuariosControlador implements iControlador,iSesion
{
    private static $dao;
    private static $daoSesion;

    function __construct()
    {
        if (self::$dao == null) {
            self::$dao = new UsuarioDAO();
        }
        if (self::$daoSesion == null) {
            self::$daoSesion = new SesionDAO();
        }
    }

    function CrearEntidad($entidad, $parametros = null)
    {
        return self::$dao->Insertar($entidad);
    }

    function EliminarEntidad($entidad, $parametros = null)
    {
        $fecha = new Datetime('now', new \DateTimeZone('America/Argentina/Cordoba'));
        $fecha->getTimestamp();
        $fecha = date_format($fecha, 'Y/m/d H:i:s');
        $entidad->setFechaBaja($fecha);
        return self::$dao->Eliminar($entidad);
    }

    function ConsultarEntidad($entidad, $parametros = null)
    {
        return self::ConsultarEntidad($entidad);
    }

    function ActualizarEntidad($entidad, $parametros = null)
    {
        return self::$dao->Modificar($entidad);
    }

    function ListarEntidades()
    {
        return self::$dao->ObtenerTodos();
    }

    function IniciarSesion($entidad, $array = null)
    {
        return self::$daoSesion->IniciarSesion($entidad);
    }

    function CerrarSesion($entidad, $array = null)
    {
        return self::$daoSesion->CerrarSesion($entidad);
    }


} 