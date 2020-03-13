<?php

class MyPoint
{
    private $x;
    private $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function igual($otroPunto)
    {
        return $this->x == $otroPunto->getX() && $this->y == $otroPunto->getY();
    }

    public function getX()
    {
        return $this->$x;
    }

    public function getY()
    {
        return $this->$y;
    }
    public function estaEnTablero()
    {
        return true;
    }
}
