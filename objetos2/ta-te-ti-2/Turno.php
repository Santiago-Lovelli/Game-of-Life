<?php

abstract class Turno
{
    public static function turnoPara($unJuego)
    {
        $cumple = static function ($turnoPosible) use ($unJuego) {
            return $turnoPosible->para($unJuego);
        };

        $turnosPosibles = array(
            '1' => new TurnoX,
            '2' => new TurnoO,
            '3' => new TurnoGameOver,
            '4' => new TurnoEmpate,
        );

        $unTurno = array_filter($turnosPosibles, $cumple);

        return current($unTurno);
    }
}
