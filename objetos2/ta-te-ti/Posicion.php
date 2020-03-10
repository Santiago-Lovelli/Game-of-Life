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
        $this->valor = '';
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        if ($this->valor != '') {
            throw new Exception('Posicion ya ocupada');
        }

        $this->valor = $valor;
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
