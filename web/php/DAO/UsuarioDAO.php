<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 16/06/15
 * Time: 15:42
 */

namespace web\php\DAO;

use web\php\Conexion;
use web\php\Interfaces\iDAOBase;
use web\php\Modelo\Usuario;

require_once '../php/Interfaces/iDAOBase.php';
require_once '../php/db/Conexion.php';
require_once '../php/Modelo/Usuario.php';


class UsuarioDAO implements iDAOBase
{
    function Insertar($entidad, $array = null)
    {
        $con = Conexion::Conectar();
        $query = "INSERT INTO usuarios(nombre,password)";
        $query .= " VALUES(:nombre,:password)";
        $sql = $con->prepare($query);
        $sql->bindParam(":nombre", $entidad->getNombre());
        $sql->bindParam(":password", $entidad->getPassword());
        if ($sql->execute()) {
            return true;

        }
        return false;
    }

    function Modificar($entidad, $array = null)
    {
        $con = Conexion::Conectar();
        $query = "UPDATE usuarios";
        $query .= " SET password = :password";
        $query .= " WHERE id = :id";
        $sql = $con->prepare($query);
        $sql->bindParam(":id", $entidad->getId());
        $sql->bindParam(":password", $entidad->getPassword());
        if ($sql->execute()) {
            return true;
        }
        return false;
    }

    function Eliminar($entidad, $array = null)
    {
        $con = Conexion::Conectar();
        $query = "DELETE FROM usuarios";
        $query .= " WHERE id = :id";
        $sql = $con->prepare($query);
        $sql->bindParam(":id", $entidad->getId());
        if ($sql->execute()) {
            return true;
        }
        return false;
    }

    function ObtenerPorID($entidad, $array = null)
    {
        $con = Conexion::Conectar();
        $query = "SELECT * FROM usuarios";
        $query .= " WHERE id = :id";
        $sql = $con->prepare($query);
        $sql->bindParam(":id", $entidad->getId());
        if ($sql->execute()) {
            $usuario = new Usuario();
            while ($row = $sql->fetch()) {
                $usuario->setId($row['id']);
                $usuario->setNombre($row['nombre']);
                $usuario->setFechaAlta($row['fecha_alta']);
                $usuario->setFechaBaja($row['fecha_baja']);
            }
            return $usuario;
        }
        return false;
    }

    function ObtenerTodos()
    {
        $usuarios = array();
        try {
            $con = Conexion::Conectar();
            $query = "SELECT * FROM usuarios";
            $sql = $con->prepare($query);
            if ($sql->execute()) {

                while ($row = $sql->fetch()) {
                    $usuario = new Usuario();
                    $usuario->setId($row['id']);
                    $usuario->setNombre($row['nombre']);
                    $usuario->setFechaAlta($row['fecha_alta']);
                    $usuario->setFechaBaja($row['fecha_baja']);

                    $usuarios[] = $usuario;
                }
            }

        } catch (\PDOException $e) {
            $usuarios = $e->getMessage();
        }
        return $usuarios;

    }

} 