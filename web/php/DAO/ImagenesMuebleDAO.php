<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 15/07/15
 * Time: 11:00
 */

namespace web\php\DAO;


use web\php\Conexion;
use web\php\Interfaces\iDAOBase;

require_once __DIR__.'/../db/Conexion.php';
require_once __DIR__.'/../Interfaces/iDAOBase.php';

class ImagenesMuebleDAO implements iDAOBase
{

    private $con;

    function __construct()
    {
        $this->con = Conexion::Conectar();
    }

    function Insertar($entidad, $array = null)
    {
        try {

            $query = " INSERT INTO imagenes_x_muebles(mueble_id,path_imagen,tipo_imagen,tamanio_imagen)";
            $query .= " VALUES (:mueble_id,:path_imagen,:tipo_imagen,:tamanio_imagen)";
            $rta = $this->con->prepare($query)->execute(array(
                ":mueble_id" => $array["MuebleID"],
                ":path_imagen" => $array["PathImagen"],
                ":tipo_imagen" => $array["Extension"],
                ":tamanio_imagen" => $array["Tamanio"]
            ));
            if ($rta) {
                return true;
            }
            return false;
        } catch (\PDOException $e) {
            return false;
        }
    }

    function Modificar($entidad, $array = null)
    {

        try {

            $query = " UPDATE imagenes_x_muebles";
            $query .= " SET mueble_id = :mueble_id";
            $query .= ", path_imagen = :path_imagen";
            $query .= ", tipo_imagen = :tipo_imagen";
            $query .= ", tamanio_imagen = :tamanio_imagen";
            return $this->con->prepare($query)->execute(array(
                ":mueble_id" => $array["PathImagen"],
                ":path_imagen" => $array["PathImagen"],
                ":tipo_imagen" => $array["Extension"],
                ":tamanio_imagen" => $array["Tamanio"]
            ));
        } catch (\PDOException $e) {
            throw new \PDOException ("Error al actualizar: " . $e->getMessage());
        }
    }

    function Eliminar($entidad, $array = null)
    {
        try {
            return $this->con->prepare("DELETE FROM imagenes_x_muebles WHERE mueble_id = :mueble_id")
                ->execute(array(":mueble_id" => $entidad->getId()));
        } catch (\PDOException $e) {
            throw new \PDOException ("Error al eliminar: " . $e->getMessage());
        }

    }

    function ObtenerImagenesMueble($idMueble)
    {
        $array = array();

        $sql = $this->con->prepare("SELECT DISTINCT
        id_imagen,mueble_id,tipo_imagen,tamanio_imagen,path_imagen
        FROM imagenes_x_muebles
        WHERE mueble_id = :mueble_id
        AND path_imagen NOT LIKE '%mini%'");
        $sql->bindParam(":mueble_id", $idMueble);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $imagenesMuebles = $sql->fetchAll(\PDO::FETCH_OBJ);
            foreach ($imagenesMuebles as $imagenesMueble) {
                $array [] = array(
                    "IdImagen" => $imagenesMueble->id_imagen,
                    "MuebleID" => $imagenesMueble->mueble_id,
                    "TipoImagen" => $imagenesMueble->tipo_imagen,
                    "TamanioImagen" => $imagenesMueble->tamanio_imagen,
                    "PathImagen" => $imagenesMueble->path_imagen,
                    "PathMini" => str_replace(".jpg", "-mini.jpg", $imagenesMueble->path_imagen),
                    "Nombre" => ltrim($imagenesMueble->path_imagen,'/')

                );
            }
        }
        return $array;
    }

    function ObtenerPorID($entidad, $array = null)
    {
        $array = array();

        $sql = $this->con->prepare("SELECT * FROM imagenes_x_muebles WHERE mueble_id = :mueble_id");
        $sql->execute(array(":mueble_id" => $entidad->getId()));
        if ($sql->rowCount() > 0) {
            $imagenesMueble = $sql->fetch(\PDO::FETCH_OBJ);
            $array = array(
                "IdImagen" => $imagenesMueble->id_imagen,
                "MuebleID" => $imagenesMueble->mueble_id,
                "TipoImagen" => $imagenesMueble->tipo_imagen,
                "TamanioImagen" => $imagenesMueble->tamanio_imagen,
                "PathImagen" => $imagenesMueble->path_imagen
            );

        }
        return $array;

    }

    function ObtenerTodos()
    {
        $array = array();

        $sql = $this->con->prepare("SELECT * FROM imagenes_x_muebles")
            ->execute();
        if ($sql->rowCount() > 0) {
            $imagenesMuebles = $sql->fetchAll(\PDO::FETCH_OBJ);
            foreach ($imagenesMuebles as $imagenesMueble) {
                $array [] = array(
                    "IdImagen" => $imagenesMueble->id_imagen,
                    "MuebleID" => $imagenesMueble->mueble_id,
                    "TipoImagen" => $imagenesMueble->tipo_imagen,
                    "TamanioImagen" => $imagenesMueble->tamanio_imagen,
                    "PathImagen" => $imagenesMueble->path_imagen
                );
            }
        }
        return $array;
    }

    function ObtenerMiniaturaPorID($id)
    {
        $array = array();

        $sql = $this->con->prepare("SELECT * FROM imagenes_x_muebles WHERE mueble_id = :mueble_id
        AND path_imagen like '%mini%' LIMIT 1");
        $sql->execute(array(":mueble_id" => $id));
        if ($sql->rowCount() > 0) {
            $imagenesMueble = $sql->fetch(\PDO::FETCH_OBJ);
            $array = array(
                "IdImagen" => $imagenesMueble->id_imagen,
                "MuebleID" => $imagenesMueble->mueble_id,
                "TipoImagen" => $imagenesMueble->tipo_imagen,
                "TamanioImagen" => $imagenesMueble->tamanio_imagen,
                "PathImagen" => $imagenesMueble->path_imagen

            );

        }
        return $array;

    }

} 