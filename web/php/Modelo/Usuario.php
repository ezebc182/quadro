<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 15/06/15
 * Time: 19:10
 */
namespace web\php\Modelo;

class Usuario
{
    private $id;
    private $nombre;
    private $password;
    private $fechaAlta;
    private $fechaBaja;

    function __construct()
    {

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
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function __toString()
    {
        return $this->getNombre();
    }


}