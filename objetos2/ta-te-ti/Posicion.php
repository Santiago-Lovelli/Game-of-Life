<?php

class Posicion
{
    private $x;
    private $y;
    private $valor;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
        $this->valor = new ValorVacio();
    }

    public function getValor()
    {
        return $this->valor->getValor();
    }

    public function setValor($valor)
    {
        $this->valor = $this->valor->setValor($valor);
    }

    public function getX()
    {
        return $this->x;
    }

    public function setX($x)
    {
        $this->x = $x;

    }

    public function getY()
    {
        return $this->y;
    }

    public function setY($y)
    {
        $this->y = $y;

    }
}
