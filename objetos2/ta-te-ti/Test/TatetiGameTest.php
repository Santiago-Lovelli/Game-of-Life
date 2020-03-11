<?php
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti/Jugador.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti/Tablero.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti/Posicion.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti/ValorVacio.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti/TatetiGame.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti/ValorOcupado.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti/PosicionNula.php';

use PHPUnit\Framework\TestCase;

class TatetiGameTest extends TestCase
{
    // public function testListoParaIniciar()
    // {
    //     $jugadorX = new Jugador('x');
    //     $jugadorO = new Jugador('o');
    //     $game = new TatetiGame($jugadorX, $jugadorO);
    //     $this->assertTrue($game->tableroVacio() && $game->esMiTurno($jugadorX));
    // }

    // public function testJuegaXEnCentro()
    // {
    //     $jugadorX = new Jugador('x');
    //     $jugadorO = new Jugador('o');
    //     $game = new TatetiGame($jugadorX, $jugadorO);
    //     $posicion = new Posicion(1, 1);
    //     $game->juegaX($posicion);
    //     $this->assertTrue($game->esMiTurno($jugadorO));
    //     $this->assertTrue($game->getValorDePosicion($posicion) == 'x');
    // }

    // public function testJuegaODespuesDeX()
    // {
    //     $jugadorX = new Jugador('x');
    //     $jugadorO = new Jugador('o');
    //     $game = new TatetiGame($jugadorX, $jugadorO);
    //     $posicion = new Posicion(1, 1);
    //     $game->juegaX($posicion);
    //     $posicionDos = new Posicion(0, 1);
    //     $game->juegaO($posicionDos);
    //     $this->assertTrue($game->esMiTurno($jugadorX));
    //     $this->assertTrue($game->getValorDePosicion($posicionDos) == 'o');
    // }

    // public function testNoPuedenJugarMismaPosicion()
    // {
    //     $jugadorX = new Jugador('x');
    //     $jugadorO = new Jugador('o');
    //     $game = new TatetiGame($jugadorX, $jugadorO);
    //     $posicion = new Posicion(1, 1);
    //     $game->juegaX($posicion);
    //     try {
    //         $game->juegaO($posicion);
    //         $this->fail();
    //     } catch (Exception $e) {
    //         $this->assertTrue($e->getMessage() == 'Posicion ya ocupada');
    //     }
    // }

    public function testNoPuedenJugarFueraDelTablero()
    {
        $jugadorX = new Jugador('x');
        $jugadorO = new Jugador('o');
        $game = new TatetiGame($jugadorX, $jugadorO);
        $posicion = new Posicion(5, -1);
        try {
            $game->juegaX($posicion);
            $this->fail();
        } catch (Exception $e) {
            $this->assertTrue($e->getMessage() == 'Posicion fuera del tablero');
        }
    }

    public function testNoPuedenJugarFueraDeTurno()
    {
        $jugadorX = new Jugador('x');
        $jugadorO = new Jugador('o');
        $game = new TatetiGame($jugadorX, $jugadorO);
        $posicion = new Posicion(2, 2);
        try {
            $game->juegaO($posicion);
            $this->fail();
        } catch (Exception $e) {
            $this->assertTrue($e->getMessage() == 'No es tu turno');
        }
    }

    public function testGanaXVertical()
    {
        $jugadorX = new Jugador('x');
        $jugadorO = new Jugador('o');
        $game = new TatetiGame($jugadorX, $jugadorO);
        $posicionX = new Posicion(0, 0);
        $game->juegaX($posicionX);
        $posicionO = new Posicion(1, 0);
        $game->juegaO($posicionO);
        $posicionXDos = new Posicion(0, 1);
        $game->juegaX($posicionXDos);
        $posicionODos = new Posicion(1, 1);
        $game->juegaO($posicionODos);
        $posicionXTres = new Posicion(0, 2);
        $game->juegaX($posicionXTres);
        $this->assertTrue($game->gameOver());
    }

    public function testGanaXHorizontal()
    {
        $jugadorX = new Jugador('x');
        $jugadorO = new Jugador('o');
        $game = new TatetiGame($jugadorX, $jugadorO);
        $posicionX = new Posicion(0, 0);
        $game->juegaX($posicionX);
        $posicionO = new Posicion(0, 1);
        $game->juegaO($posicionO);
        $posicionXDos = new Posicion(1, 0);
        $game->juegaX($posicionXDos);
        $posicionODos = new Posicion(0, 2);
        $game->juegaO($posicionODos);
        $posicionXTres = new Posicion(2, 0);
        $game->juegaX($posicionXTres);
        $this->assertTrue($game->gameOver());
    }

    public function testGanaXDiagonalUno()
    {
        $jugadorX = new Jugador('x');
        $jugadorO = new Jugador('o');
        $game = new TatetiGame($jugadorX, $jugadorO);
        $posicionX = new Posicion(0, 0);
        $game->juegaX($posicionX);
        $posicionO = new Posicion(0, 1);
        $game->juegaO($posicionO);
        $posicionXDos = new Posicion(1, 1);
        $game->juegaX($posicionXDos);
        $posicionODos = new Posicion(0, 2);
        $game->juegaO($posicionODos);
        $posicionXTres = new Posicion(2, 2);
        $game->juegaX($posicionXTres);
        $this->assertTrue($game->gameOver());
    }

    public function testGanaXDiagonalDos()
    {
        $jugadorX = new Jugador('x');
        $jugadorO = new Jugador('o');
        $game = new TatetiGame($jugadorX, $jugadorO);
        $posicionX = new Posicion(2, 0);
        $game->juegaX($posicionX);
        $posicionO = new Posicion(0, 1);
        $game->juegaO($posicionO);
        $posicionXDos = new Posicion(1, 1);
        $game->juegaX($posicionXDos);
        $posicionODos = new Posicion(1, 2);
        $game->juegaO($posicionODos);
        $posicionXTres = new Posicion(0, 2);
        $game->juegaX($posicionXTres);
        $this->assertTrue($game->gameOver());
    }

}
