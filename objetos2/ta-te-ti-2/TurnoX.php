<?php

class TurnoX
{
    public function para($unJuego)
    {
        return $unJuego->jugadorPorJugar()->getNombre() == 'x' && !$unJuego->terminado() && !$unJuego->empatado();
    }

    public function puedeJugarX($unTateti)
    {
        return true;
    }

    public function puedeJugarO($unTateti)
    {
        return $unTateti->noPuedeJugar();
    }
}
