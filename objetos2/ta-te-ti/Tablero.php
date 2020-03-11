<?php

class Tablero
{
    private $posiciones;

    public function __construct()
    {
        $this->posiciones[0] = new PosicionNula();
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $this->posiciones[] = new Posicion($i, $j);
            }
        }
    }

    public function estaVacio()
    {
        $noEstaOcupada = function ($unPosicion) {
            return $unPosicion->getValor() != '';
        };
        return count(array_filter($this->posiciones, $noEstaOcupada) == 0);
    }

    public function ocupar($unaPosicion, $valorDeJuego)
    {
        $esEsta = function ($posicion) use ($unaPosicion) {
            return $posicion->getX() == $unaPosicion->getX() && $posicion->getY() == $unaPosicion->getY();
        };

        $findKey = function () use ($esEsta) {
            return key(array_filter($this->posiciones, $esEsta));
        };

        $keyAOcupar = $findKey();

    }

    public function valorEn($posicion)
    {
        for ($i = 0; $i < 9; $i++) {
            if ($this->posiciones[$i]->getX() == $posicion->getX() && $this->posiciones[$i]->getY() == $posicion->getY()) {
                return $this->posiciones[$i]->getValor();
            }
        }
    }

    public function terminoElJuego()
    {
        return $this->ganaVertical() || $this->ganaHorizontal() || $this->ganaDiagonal();
    }

    public function ganaVertical()
    {
        return $this->verticales(0) || $this->verticales(3) || $this->verticales(6);
    }

    public function ganaHorizontal()
    {
        return $this->horizontal(0) || $this->horizontal(1) || $this->horizontal(2);
    }

    public function ganaDiagonal()
    {
        return $this->diagonalUno() || $this->diagonalDos();
    }

    public function verticales($valor)
    {
        return
        ($this->posiciones[0 + $valor]->getValor() == $this->posiciones[1 + $valor]->getValor()) ==
        $this->posiciones[2 + $valor]->getValor();
    }

    public function horizontal($valor)
    {
        return
        ($this->posiciones[0 + $valor]->getValor() == $this->posiciones[3 + $valor]->getValor()) ==
        $this->posiciones[6 + $valor]->getValor();
    }

    public function diagonalUno()
    {
        return ($this->posiciones[0]->getValor() == $this->posiciones[4]->getValor()) == $this->posiciones[8]->getValor();
    }

    public function diagonalDos()
    {
        return ($this->posiciones[2]->getValor() == $this->posiciones[4]->getValor()) == $this->posiciones[6]->getValor();
    }
}
