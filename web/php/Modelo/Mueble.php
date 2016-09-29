<?php
namespace web\php\Modelo;
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 22/06/15
 * Time: 18:37
 */
class Mueble
{

    private $id;
    private $nombre;
    private $descripcion;
    private $tipoMueble;
    private $precio;
    private $alto;
    private $ancho;
    private $profundidad;
    private $materiales;
    private $fechaAlta;
    private $fechaBaja;

    function __construct()
    {

    }


    /**
     * @param mixed $alto
     */
    public function setAlto($alto)
    {
        $this->alto = $alto;
    }

    /**
     * @return mixed
     */
    public function getAlto()
    {
        return $this->alto;
    }

    /**
     * @param mixed $ancho
     */
    public function setAncho($ancho)
    {
        $this->ancho = $ancho;
    }

    /**
     * @return mixed
     */
    public function getAncho()
    {
        return $this->ancho;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $fechaAlta
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;
    }

    /**
     * @return mixed
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * @param mixed $fechaBaja
     */
    public function setFechaBaja($fechaBaja)
    {
        $this->fechaBaja = $fechaBaja;
    }

    /**
     * @return mixed
     */
    public function getFechaBaja()
    {
        return $this->fechaBaja;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $materiales
     */
    public function setMateriales($materiales)
    {
        $this->materiales = $materiales;
    }

    /**
     * @return mixed
     */
    public function getMateriales()
    {
        return $this->materiales;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $profundidad
     */
    public function setProfundidad($profundidad)
    {
        $this->profundidad = $profundidad;
    }

    /**
     * @return mixed
     */
    public function getProfundidad()
    {
        return $this->profundidad;
    }

    /**
     * @param mixed $tipoMueble
     */
    public function setTipoMueble($tipoMueble)
    {
        $this->tipoMueble = $tipoMueble;
    }

    /**
     * @return mixed
     */
    public function getTipoMueble()
    {
        return $this->tipoMueble;
    }


} 