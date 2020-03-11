<?php

class ValorVacio
{

    public function setValor($valor)
    {
        return new ValorOcupado($valor);
    }

    public function getValor()
    {
        return '';
    }
}
