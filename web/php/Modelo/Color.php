<?php

/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 15/06/15
 * Time: 19:12
 */
class Color
{
    private $id;
    private $nombre;
    private $descripcion;

    function __construct($descripcion, $id, $nombre)
    {
        $this->descripcion = $descripcion;
        $this->id = $id;
        $this->nombre = $nombre;
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


}