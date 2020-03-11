<?php

class TurnoX implements Turno
{
    public function puedeJugarX($unTateti)
    {
        return true;
    }

    public function puedeJugarO($unTateti)
    {
        return $unTateti->noPuedeJugar();
    }
}
