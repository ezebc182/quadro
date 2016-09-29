<?php

/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 15/06/15
 * Time: 19:19
 */
class Presentacion
{

    private $muebleID;
    private $colorID;
    private $medidaID;
    private $precio;
    private $stock;


    /**
     * @param $colorID INT
     * @param $medidaID INT
     * @param $muebleID INT
     * @param $precio FLOAT
     * @param $stock INT
     */
    function __construct($colorID, $medidaID, $muebleID, $precio, $stock)
    {
        $this->colorID = $colorID;
        $this->medidaID = $medidaID;
        $this->muebleID = $muebleID;
        $this->precio = $precio;
        $this->stock = $stock;
    }


    /**
     * @param mixed $colorID
     */
    public function setColorID($colorID)
    {
        $this->colorID = $colorID;
    }

    /**
     * @return mixed
     */
    public function getColorID()
    {
        return $this->colorID;
    }

    /**
     * @param mixed $medidaID
     */
    public function setMedidaID($medidaID)
    {
        $this->medidaID = $medidaID;
    }

    /**
     * @return mixed
     */
    public function getMedidaID()
    {
        return $this->medidaID;
    }

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
     * @param mixed $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }


}