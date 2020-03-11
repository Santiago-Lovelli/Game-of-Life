<?php

class TurnoGameOver implements Turno
{
    public function puedeJugarX($unTateti)
    {
        return $unTateti->finDelJuego();
    }

    public function puedeJugarO($unTateti)
    {
        return $unTateti->finDelJuego();
    }
}
