<?php

class EstadoLibre implements Estado
{
    public function getValor()
    {
        return '';
    }

    public function setValor($valor, $unaCasilla)
    {
        $unaCasilla->cambiarEstado($valor);
    }

    public function vacio()
    {
        return true;
    }
}
