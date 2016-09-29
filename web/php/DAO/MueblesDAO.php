<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 22/06/15
 * Time: 18:32
 */

namespace web\php\DAO;


use web\php\Conexion;
use web\php\Interfaces\iDAOBase;
use web\php\Modelo\Mueble;

require_once __DIR__.'/../Interfaces/iDAOBase.php';
require_once __DIR__.'/../db/Conexion.php';
require_once __DIR__.'/../Modelo/Mueble.php';

class MueblesDAO implements iDAOBase
{
    private $con;

    function __construct()
    {
        $this->con = Conexion::Conectar();
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
        // TODO: Implement Eliminar() method.
    }

    function ObtenerPorID($entidad, $array = null)
    {
        $mueble = null;
        $sql = $this->con->prepare("SELECT m.id,m.nombre,
            m.descripcion,m.fecha_alta,m.fecha_baja,m.alto,m.ancho,
            m.profundidad,m.precio,m.materiales,tm.nombre AS TipoMueble
            FROM muebles AS m
            JOIN tipo_muebles AS tm ON m.tipo_mueble_id = tm.id
            WHERE m.id = :id_mueble ");
        $muebleId = $entidad->getId();
        $sql->bindParam(":id_mueble", $muebleId);
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