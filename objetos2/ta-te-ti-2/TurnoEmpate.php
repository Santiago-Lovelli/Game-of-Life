<?php

class TurnoEmpate
{
    public function para($unJuego)
    {
        return $unJuego->empatado();
    }

    public function puedeJugarX($unTateti)
    {
        return $unTateti->empate();
    }

    public function puedeJugarO($unTateti)
    {
        return $unTateti->empate();
    }
}
