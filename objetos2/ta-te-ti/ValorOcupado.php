<?php

class ValorOcupado
{
    private $valor;

    public function __construct($valor)
    {
        $this->valor = $valor;
    }

    public function setValor($valor)
    {
        throw new Exception('Posicion ya ocupada');
    }

    public function getValor()
    {
        return $this->valor;
    }
}
