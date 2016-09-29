<?php
namespace web\admin\Modelo;

/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 15/06/15
 * Time: 19:15
 */
class Medida
{

    private $id;
    private $nombre;
    private $ancho;
    private $alto;
    private $profundidad;

    function __construct($alto, $ancho, $id, $nombre, $profundidad)
    {
        $this->alto = $alto;
        $this->ancho = $ancho;
        $this->id = $id;
        $this->nombre = $nombre;
        $this->profundidad = $profundidad;
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


} 