<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 22/06/15
 * Time: 18:32
 */

namespace web\admin\DAO;


use web\admin\Conexion;
use web\admin\Controladores\ImagenesMuebleControlador;
use web\admin\Interfaces\iDAOBase;
use web\admin\Modelo\Mueble;

require_once 'Interfaces/iDAOBase.php';
require_once 'db/Conexion.php';
require_once 'Modelo/Mueble.php';

class MueblesDAO implements iDAOBase
{
    private $con;

    function __construct()
    {
        $this->con = Conexion::Conectar();
    }

    function EstaRepetido($entidad)
    {
        $sql = $this->con->prepare(" SELECT nombre FROM muebles WHERE nombre = :nombre");
        $sql->bindParam(":nombre", $entidad->getNombre());
        if ($sql->execute() && $sql->rowCount() >= 1) {
            return true;
        }
        return false;
    }

    function Insertar($entidad, $array = null)
    {

        $query = " INSERT INTO muebles(nombre,descripcion,tipo_mueble_id,alto,ancho,profundidad,precio,materiales)";
        $query .= " VALUES(:nombre,:descripcion,:tipo_mueble_id,:alto,:ancho,:profundidad,:precio,:materiales)";
        $resultado = array();
        try {

            $resultado["Operacion"] = $this->con->prepare($query)->execute(

                array(
                    ":nombre" => $entidad->getNombre(),
                    ":descripcion" => $entidad->getDescripcion(),
                    ":alto" => $entidad->getAlto(),
                    ":ancho" => $entidad->getAncho(),
                    ":profundidad" => $entidad->getProfundidad(),
                    ":precio" => $entidad->getPrecio(),
                    ":materiales" => $entidad->getMateriales(),
                    ":tipo_mueble_id" => $entidad->getTipoMueble()
                )
            );
            $resultado["UltimoID"] = $this->con->lastInsertId();
            return $resultado;

        } catch (\PDOException $e) {
            throw new \PDOException ("Error al insertar: \n" . $e->getMessage());
        }
    }

    function Modificar($entidad, $array = null)
    {
        // TODO: Implement Modificar() method.
    }

    function Eliminar($entidad, $array = null)
    {
        try {
            $this->con->beginTransaction();
            $imgControlador = new ImagenesMuebleControlador();
            $eliminarImg = $imgControlador->EliminarEntidad($entidad);
            if ($eliminarImg == 0 || $eliminarImg == true) {
                $anexoDAO = new AnexosDAO();
                $eliminarAnexo = $anexoDAO->Eliminar($entidad);

                if ($eliminarAnexo == 0 || $eliminarAnexo == true) {
                    $sql = $this->con->prepare("DELETE FROM muebles WHERE id= :mueble_id");
                    $id = $entidad->getId();
                    $sql->bindParam(":mueble_id", $id);
                    if ($sql->execute() && $sql->rowCount() >= 0) {
                        $this->con->commit();
                        return true;
                    }
                    $this->con->rollBack();
                    return false;
                }

            }


        } catch (\PDOException $e) {
            return false;
        }
    }

    function ObtenerPorID($entidad, $array = null)
    {
        $sql = $this->con->prepare("SELECT m.id,m.nombre,
            m.descripcion,m.fecha_alta,m.fecha_baja,m.alto,m.ancho,
            m.profundidad,m.precio,m.materiales,tm.nombre AS TipoMueble
            FROM muebles AS m
            JOIN tipo_muebles AS tm ON m.tipo_mueble_id = tm.id
            WHERE m.id = :id_mueble ");
        $sql->bindParam(":id_mueble", $entidad->getId());
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $fila = $sql->fetch(\PDO::FETCH_OBJ);

            $mueble = new Mueble();
            $mueble->setId($fila->id);
            $mueble->setNombre($fila->nombre);
            $mueble->setDescripcion($fila->descripcion);
            $mueble->setTipoMueble($fila->TipoMueble);
            $mueble->setAlto($fila->alto);
            $mueble->setAncho($fila->ancho);
            $mueble->setProfundidad($fila->profundidad);
            $mueble->setFechaAlta($fila->fecha_alta);
            $mueble->setFechaBaja($fila->fecha_baja);
            $mueble->setPrecio($fila->precio);
            $mueble->setMateriales($fila->materiales);

        }
        return $mueble;


    }

    function ObtenerTodos()
    {
        $listaMuebles = array();

        $sql = $this->con->prepare("SELECT m.*,tm.nombre AS TipoMueble FROM muebles AS m
         JOIN tipo_muebles AS tm ON m.tipo_mueble_id = tm.id ORDER BY m.nombre");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $filas = $sql->fetchAll(\PDO::FETCH_OBJ);
            foreach ($filas as $fila) {
                $mueble = new Mueble();
                $mueble->setId($fila->id);
                $mueble->setNombre($fila->nombre);
                $mueble->setDescripcion($fila->descripcion);
                $mueble->setTipoMueble($fila->TipoMueble);
                $mueble->setAlto($fila->alto);
                $mueble->setAncho($fila->ancho);
                $mueble->setProfundidad($fila->profundidad);
                $mueble->setFechaAlta($fila->fecha_alta);
                $mueble->setFechaBaja($fila->fecha_baja);
                $mueble->setPrecio($fila->precio);
                $mueble->setMateriales($fila->materiales);

                $listaMuebles [] = $mueble;
            }
        }
        return $listaMuebles;
    }


}