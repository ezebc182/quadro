<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 25/07/15
 * Time: 20:58
 */

namespace web\admin\DAO;


use web\admin\Conexion;
use web\admin\Interfaces\iDAOBase;
use web\admin\Modelo\Anexo;

require_once __DIR__ . '/../Interfaces/iDAOBase.php';

require_once __DIR__ . '/../db/Conexion.php';
require_once __DIR__ . '/../Modelo/Anexo.php';

class AnexosDAO implements iDAOBase
{
    private function _GetConexion()
    {
        return Conexion::Conectar();
    }

    function Insertar($entidad, $array = null)
    {
        try {
            $con = $this->_GetConexion();
            $sql = $con->prepare("INSERT INTO anexos (mueble_id,alto,ancho,profundidad)
                                  VALUES (:mueble_id,:alto,:ancho,:profundidad)");
            $sql->bindParam(":mueble_id", $entidad->getMuebleID());
            $sql->bindParam(":alto", $entidad->getAlto());
            $sql->bindParam(":ancho", $entidad->getAncho());
            $sql->bindParam(":profundidad", $entidad->getProfundidad());
            if ($sql->execute() && $sql->rowCount() >= 1) {
                return true;
            }
            return false;
        } catch (\PDOException $e) {
            return false;
        }

    }

    function Modificar($entidad, $array = null)
    {
        // TODO: Implement Modificar() method.
    }

    function Eliminar($entidad, $array = null)
    {
        if ($this->ObtenerPorID($entidad) != null) {
            try {
                $sql = $this->_GetConexion()->prepare("DELETE FROM anexos WHERE mueble_id = :mueble_id");
                $muebleId = $entidad->getId();
                $sql->bindParam(":mueble_id", $muebleId);
                if ($sql->execute() && $sql->rowCount() > 0) {
                    return true;
                }
                return 0;

            } catch (\PDOException $e) {
                return false;
            }
        }
    }

    function ObtenerPorID($entidad, $array = null)
    {

        $anexo = null;
        try {
            $sql = $this->_GetConexion()->prepare("SELECT * FROM anexos WHERE mueble_id = :mueble_id");
            $muebleId = $entidad->getId();
            $sql->bindParam(":mueble_id", $muebleId);
            if ($sql->execute() && $sql->rowCount() > 0) {
                $fila = $sql->fetch(\PDO::FETCH_OBJ);
                $anexo = new Anexo();
                $anexo->setMuebleID($fila->mueble_id);
                $anexo->setId($fila->id);
                $anexo->setAlto($fila->alto);
                $anexo->setAncho($fila->ancho);
                $anexo->setProfundidad($fila->profundidad);
            }
            return $anexo;
        } catch (\PDOException $e) {
            return $anexo;
        }
    }

    function ObtenerTodos()
    {
        // TODO: Implement ObtenerTodos() method.
    }

} 