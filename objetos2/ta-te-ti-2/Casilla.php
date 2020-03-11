<?php

class Casilla
{
    private $estado;

    public function __construct()
    {
        $this->estado = new EstadoLibre();
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
        $estadoNuevo = new EstadoOcupado($valor);
        $this->setEstado($estadoNuevo);
        //$this->setEstado(new EstadoOcupado($valor));
    }

    public function soyUnEstadoOcupado()
    {
        throw new Exception('Posicion ya ocupada');
    }

    public function libre()
    {
        return $this->estado->vacio();
    }
}
