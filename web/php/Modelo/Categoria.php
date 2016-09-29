<?php

/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 15/06/15
 * Time: 19:17
 */
class Categoria
{
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $nombre;

    /**
     * @param $id
     * @param $nombre
     */
    function __construct($id, $nombre)
    {
        $this->id = $id;
        $this->nombre = $nombre;
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