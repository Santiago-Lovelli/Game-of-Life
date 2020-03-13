<?php

class TatetiGame
{
    private $tablero;
    private $jugadorX;
    private $jugadorO;
    private $turno;
    private $tieneQueJugar;

    public function __construct($primerJugador, $segundoJugador)
    {
        $this->turno = new TurnoX();
        $this->tablero = new Tablero();
        $this->jugadorX = $primerJugador;
        $this->jugadorO = $segundoJugador;
        $this->tieneQueJugar = $this->jugadorX;
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

    public function empate()
    {
        throw new Exception('Empate');
    }

    public function empatado()
    {
        return $this->tablero->enEmpate();
    }

    public function juegaX($unaPosicion)
    {
        $this->turnoDeX();
        $this->tablero->jugar($unaPosicion, $this->jugadorX);
        $this->tieneQueJugar = new JugadorO();
        $this->cambiarTurno();
    }

    public function juegaO($unaPosicion)
    {
        $this->turnoDeO();
        $this->tablero->jugar($unaPosicion, $this->jugadorO);
        $this->tieneQueJugar = new JugadorX();
        $this->cambiarTurno();
    }

    public function cambiarTurno()
    {
        $nuevoTurno = Turno::turnoPara($this);
        $this->turno = $nuevoTurno;
    }

    public function getValorDePosicion($unaPosicion)
    {
        return $this->tablero->valorDePosicion($unaPosicion);
    }

    public function jugadorPorJugar()
    {
        return $this->tieneQueJugar;
    }

    public function terminado()
    {
        return $this->tablero->gameOver();
    }

    public function ganadorX()
    {
        return $this->tablero->ganaX();
    }

    public function ganadorO()
    {
        return $this->tablero->ganaO();
    }

    public function getTurno()
    {
        return $this->turno;
    }
}
