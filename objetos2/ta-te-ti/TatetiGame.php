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

    public function turnoDeJugadorX()
    {
        return $this->turnoDe->getValorDeJuego() == 'x';
    }

    public function turnoDeJugadorO()
    {
        return $this->turnoDe->getValorDeJuego() == 'o';
    }

    public function juegaX($unaPosicion)
    {
        if (!$this->turnoDeJugadorX()) {
            throw new Exception('No es tu turno');
        }
        $this->jugar($unaPosicion);
    }

    public function juegaO($unaPosicion)
    {
        if (!$this->turnoDeJugadorO()) {
            throw new Exception('No es tu turno');
        }
        $this->jugar($unaPosicion);
    }

    public function jugar($posicion)
    {
        $this->tablero->ocupar($posicion, $this->turnoDe->getValorDeJuego());
        $this->setTurnoDe($this->siguienteJugardor());
    }

    public function setTurnoDe($turnoDe)
    {
        $this->turnoDe = $turnoDe;

        return $this;
    }

    public function siguienteJugardor()
    {
        if ($this->turnoDe->getValorDeJuego() == 'x') {
            return $this->jugadorO;
        } else {
            return $this->jugadorX;
        }
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
