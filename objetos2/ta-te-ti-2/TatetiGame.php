<?php

class TatetiGame
{
    private $tablero;
    private $jugadorX;
    private $jugadorO;
    private $turno;

    public function __construct($primerJugador, $segundoJugador)
    {
        $this->jugadorX = $primerJugador;
        $this->jugadorO = $segundoJugador;
        $this->tablero = new Tablero();
        $this->turno = new TurnoX();
    }

    public function listoParaIniciar()
    {
        return $this->tablero->estaVacio() && $this->turnoDeX();
    }

    public function turnoDeX()
    {
        return $this->turno->puedeJugarX($this);
    }

    public function turnoDeO()
    {
        return $this->turno->puedeJugarO($this);
    }

    public function noPuedeJugar()
    {
        throw new Exception('No es tu turno');
    }

    public function finDelJuego()
    {
        throw new Exception('Game Over');
    }
}
