<?php

class Jugador
{
    private $valorDeJuego;

    public function __construct($unValor)
    {
        $this->valorDeJuego = $unValor;
    }

    public function getValorDeJuego()
    {
        return $this->valorDeJuego;
    }
    public function setValorDeJuego($valorDeJuego)
    {
        $this->valorDeJuego = $valorDeJuego;

        return $this;
    }
}
