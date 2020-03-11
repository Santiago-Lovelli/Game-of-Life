<?php

class Tablero
{
    private $casillas = array();
    private $posicones = array();

    public function __construct()
    {
        //Generar puntos
        $this->posiciones[0] = new MyNullPoint();
        for ($i = 1; $i <= 3; $i++) {
            for ($j = 1; $j <= 3; $j++) {
                $this->posiciones[] = new MyPoint($i, $j);
            }
        }
        //Generar casillas
        foreach ($this->posiciones as $key => $unaPosicion) {
            $this->casillas[$key] = new Casilla();
        }
    }

    public function estaVacio()
    {
        $ocupado = function ($unCasillero) {
            return !$unCasillero->libre();
        };

        return count(array_filter($this->casillas, $ocupado)) == 0;
    }
}
