<?php
namespace web\php\Modelo;
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 15/06/15
 * Time: 19:08
 */
class TipoMueble
{

    private $id;
    private $nombre;

    public function __construct()
    {

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