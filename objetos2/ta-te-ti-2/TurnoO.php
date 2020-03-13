<?php

class TurnoO
{
    public function para($unJuego)
    {
        return $unJuego->jugadorPorJugar()->getNombre() == 'o' && !$unJuego->terminado() && !$unJuego->empatado();
    }

    public function puedeJugarX($unTateti)
    {
        return $unTateti->noPuedeJugar();
    }

    public function puedeJugarO($unTateti)
    {
        return true;
    }
}
