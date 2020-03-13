<?php

class MyNullPoint
{
    public function igual($otroPunto)
    {
        throw new Exception('Posicion fuera del tablero');
    }

    public function getX()
    {
        throw new Exception('Posicion fuera del tablero');
    }

    public function getY()
    {
        throw new Exception('Posicion fuera del tablero');
    }

    public function estaEnTablero()
    {
        throw new Exception('Posicion fuera del tablero');
    }
}
