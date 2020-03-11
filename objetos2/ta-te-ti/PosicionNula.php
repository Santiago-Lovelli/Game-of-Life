<?php

class PosicionNula
{
    public function setValor($valor)
    {
        throw new Exception('Posicion fuera del tablero');
    }
}
