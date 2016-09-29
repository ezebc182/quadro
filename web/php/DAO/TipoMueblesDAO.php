<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 12/07/15
 * Time: 14:30
 */

namespace web\php\DAO;


use web\php\Conexion;
use web\php\Interfaces\iDAOBase;
use web\php\Modelo\TipoMueble;

require_once 'php/Interfaces/iDAOBase.php';
require_once 'php/db/Conexion.php';
require_once 'php/Modelo/TipoMueble.php';

class TipoMueblesDAO implements iDAOBase
{
    private $con;

    function __construct()
    {
        $this->con = Conexion::Conectar();
    }

    function Insertar($entidad, $array = null)
    {

        try {
            $sql = $this->con->prepare("INSERT INTO tipo_muebles(nombre)
            VALUES (:nombre)");
            $sql->bindParam(":nombre", $entidad->getNombre());

            return $sql->execute();


        } catch (\PDOException $e) {
            throw new \PDOException("Error al insertar :" . $e->getMessage());
        }
    }

    function Modificar($entidad, $array = null)
    {
        // TODO: Implement Modificar() method.
    }

    function Eliminar($entidad, $array = null)
    {
        // TODO: Implement Eliminar() method.
    }

    function ObtenerPorID($entidad, $array = null)
    {
        // TODO: Implement ObtenerPorID() method.
    }

    function ObtenerNombreTipoMueble($id)
    {
        $sql = $this->con->prepare("SELECT nombre FROM tipo_muebles WHERE id = :id LIMIT 1");
        $sql->bindParam(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $tipoMueble = $sql->fetch(\PDO::FETCH_OBJ);
            return $tipoMueble->nombre;

        }

        return null;

    }

    function ObtenerTodos()
    {
        $listaTipoMuebles = array();
        $sql = $this->con->prepare("SELECT * FROM tipo_muebles ORDER BY nombre");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $filas = $sql->fetchAll(\PDO::FETCH_OBJ);
            foreach ($filas as $fila) {
                $tipoMueble = new TipoMueble();
                $tipoMueble->setId($fila->id);
                $tipoMueble->setNombre($fila->nombre);
                $listaTipoMuebles [] = $tipoMueble;
            }
        }
        return $listaTipoMuebles;
    }


}