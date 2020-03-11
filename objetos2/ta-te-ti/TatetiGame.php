<?php

class TatetiGame
{
    private $jugadorX;
    private $jugadorO;
    private $tablero;
    private $turnoDe;

    public function __construct($primerJugador, $segundoJugador)
    {
        $this->jugadorX = $primerJugador;
        $this->jugadorO = $segundoJugador;
        $this->tablero = new Tablero();
        $this->turnoDe = $this->jugadorX;
    }

    public function tableroVacio()
    {
        return $this->tablero->estaVacio();
    }

    public function esMiTurno($unJugador)
    {
        return $this->turnoDe->getValorDeJuego() == $unJugador->getValorDeJuego();
    }

    public function turnoDeJugadorO()
    {
        return $this->turnoDe->getValorDeJuego() == 'o';
    }

    public function juegaX($unaPosicion)
    {
        $this->jugar($unaPosicion, $this->jugadorX);
        $this->setTurnoDe($this->jugadorO);
    }

    public function juegaO($unaPosicion)
    {
        $this->jugar($unaPosicion, $this->jugadorO);
        $this->setTurnoDe($this->jugadorX);
    }

    public function jugar($posicion, $unJugador)
    {
        if (!$this->esMiTurno($unJugador)) {
            throw new Exception('No es tu turno');
        }
        $this->tablero->ocupar($posicion, $unJugador->getValorDeJuego());
    }

    public function setTurnoDe($turnoDe)
    {
        $this->turnoDe = $turnoDe;

        return $this;
    }

    public function getValorDePosicion($posicion)
    {
        return $this->tablero->valorEn($posicion);
    }

    public function gameOver()
    {
        return $this->tablero->terminoElJuego();
    }
}
