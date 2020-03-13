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

    public function buscarKeyDePunto($unaPosicion)
    {
        $keyDePunto = array_search($unaPosicion, $this->posiciones);
        $this->posiciones[$keyDePunto]->estaEnTablero();
        return $keyDePunto;
    }

    public function buscarCasilla($unaPosicion)
    {
        $keyDeCasilla = $this->buscarKeyDePunto($unaPosicion);
        return $this->casillas[$keyDeCasilla];
    }

    public function jugar($unaPosicion, $unJugador)
    {
        $laCasilla = $this->buscarCasilla($unaPosicion);
        $laCasilla->ocuparPor($unJugador);
    }

    public function valorDePosicion($unaPosicion)
    {
        $laCasilla = $this->buscarCasilla($unaPosicion);
        return $laCasilla->valor();
    }

    public function casillerosLLenos()
    {
        $ocupado = function ($unCasillero) {
            return !$unCasillero->libre();
        };

        return count(array_filter($this->casillas, $ocupado)) == 9;
    }

    public function enEmpate()
    {
        return !$this->gameOver() && $this->casillerosLLenos();
    }

    public function gameOver()
    {
        return $this->ganaX() || $this->ganaO();
    }

    public function ganaX()
    {
        return $this->verticales(new JugadorX()) || $this->horizontales(new JugadorX()) || $this->diagonales(new JugadorX());
    }

    public function ganaO()
    {
        return $this->verticales(new JugadorO()) || $this->horizontales(new JugadorO()) || $this->diagonales(new JugadorO());
    }

    public function verticales($unJugador)
    {
        return $this->vertical(0, $unJugador) || $this->vertical(1, $unJugador) || $this->vertical(2, $unJugador);
    }

    public function vertical($valor, $unJugador)
    {
        return $this->algunaVertical($valor) && ($this->buscarCasilla(new MyPoint(1 + $valor, 1))->valor() == $unJugador->getNombre());
    }

    public function algunaVertical($valor)
    {
        return ($this->buscarCasilla(new MyPoint(1 + $valor, 1))->valor()
            == $this->buscarCasilla(new MyPoint(1 + $valor, 2))->valor()) &&
            ($this->buscarCasilla(new MyPoint(1 + $valor, 2))->valor()
            == $this->buscarCasilla(new MyPoint(1 + $valor, 3))->valor());
    }

    public function horizontales($unJugador)
    {
        return $this->horizontal(0, $unJugador) || $this->horizontal(1, $unJugador) || $this->horizontal(2, $unJugador);
    }

    public function horizontal($valor, $unJugador)
    {
        return
            ($this->buscarCasilla(new MyPoint(1, 1 + $valor))->valor() == $this->buscarCasilla(new MyPoint(2, 1 + $valor))->valor()
            && ($this->buscarCasilla(new MyPoint(2, 1 + $valor))->valor() == $this->buscarCasilla(new MyPoint(3, 1 + $valor))->valor()))
            && ($this->buscarCasilla(new MyPoint(3, 1 + $valor))->valor() == $unJugador->getNombre());
    }

    public function diagonales($unJugador)
    {
        return $this->diagonalUno($unJugador) || $this->diagonalDos($unJugador);
    }

    public function diagonalUno($unJugador)
    {
        return
            ($this->buscarCasilla(new MyPoint(1, 1))->valor() == $this->buscarCasilla(new MyPoint(2, 2))->valor()
            && ($this->buscarCasilla(new MyPoint(2, 2))->valor() == $this->buscarCasilla(new MyPoint(3, 3))->valor()))
            && ($this->buscarCasilla(new MyPoint(3, 3))->valor() == $unJugador->getNombre());
    }

    public function diagonalDos($unJugador)
    {
        return
            ($this->buscarCasilla(new MyPoint(3, 1))->valor() == $this->buscarCasilla(new MyPoint(2, 2))->valor()
            && ($this->buscarCasilla(new MyPoint(2, 2))->valor() == $this->buscarCasilla(new MyPoint(1, 3))->valor()))
            && ($this->buscarCasilla(new MyPoint(1, 3))->valor() == $unJugador->getNombre());
    }
}
