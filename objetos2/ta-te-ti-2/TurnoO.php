<?php

class TurnoO implements Turno
{
    public function puedeJugarX($unTateti)
    {
        return $unTateti->noPuedeJugar();
    }

    public function puedeJugarO($unTateti)
    {
        return true;
    }
}
