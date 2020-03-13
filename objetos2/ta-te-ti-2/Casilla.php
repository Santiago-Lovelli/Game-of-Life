<?php

class Casilla
{
    private $estado;

    public function __construct()
    {
        $this->estado = new EstadoLibre();
    }

    public function ocuparPor($unJugador)
    {
        $this->estado->setValor($unJugador, $this);
    }

    public function getEstado()
    {
        return $this->estado;
    }

    private function setEstado($estado)
    {
        return $this->estado = $estado;
    }

    public function cambiarEstado($valor)
    {
        $estadoNuevo = new EstadoOcupada($valor);
        $this->setEstado($estadoNuevo);
    }

    public function soyUnEstadoOcupado()
    {
        throw new Exception('Posicion ya ocupada');
    }

    public function libre()
    {
        return $this->estado->vacio();
    }

    public function valor()
    {
        return $this->estado->getValor();
    }
}
