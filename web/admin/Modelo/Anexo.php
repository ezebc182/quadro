<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 25/07/15
 * Time: 20:34
 */

namespace web\admin\Modelo;


class Anexo
{
    private $id;
    private $alto;
    private $ancho;
    private $profundidad;
    private $muebleID;

    /**
     * @param mixed $muebleID
     */
    public function setMuebleID($muebleID)
    {
        $this->muebleID = $muebleID;
    }

    /**
     * @return mixed
     */
    public function getMuebleID()
    {
        return $this->muebleID;
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