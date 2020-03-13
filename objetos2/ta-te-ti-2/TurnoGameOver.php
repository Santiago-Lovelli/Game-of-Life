<?php

class TurnoGameOver
{
    public function para($unJuego)
    {
        return !$unJuego->empatado() && $unJuego->terminado();
    }

    public function puedeJugarX($unTateti)
    {
        return $unTateti->finDelJuego();
    }

    public function puedeJugarO($unTateti)
    {
        return $unTateti->finDelJuego();
    }
}
