<?php

class EstadoOcupada implements Estado
{
    private $valor;

    public function __construct($valor)
    {
        $this->valor = $valor;
    }

    public function getValor()
    {
        return $this->valor->getNombre();
    }

    public function setValor($valor, $unaCasilla)
    {
        $unaCasilla->soyUnEstadoOcupado();
    }

    public function vacio()
    {
        return false;
    }
}
