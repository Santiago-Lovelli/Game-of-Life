<?php
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti-2/Turno.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti-2/TurnoO.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti-2/TurnoX.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti-2/Estado.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti-2/Jugador.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti-2/Casilla.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti-2/Tablero.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti-2/MyPoint.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti-2/JugadorO.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti-2/JugadorX.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti-2/TatetiGame.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti-2/MyNullPoint.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti-2/EstadoLibre.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti-2/EstadoOcupada.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti-2/TurnoGameOver.php';

use PHPUnit\Framework\TestCase;

class TatetiGameTest extends TestCase
{
    public function testListoParaIniciar()
    {
        $jugadorX = new JugadorX();
        $jugadorO = new JugadorO();
        $game = new TatetiGame($jugadorX, $jugadorO);
        $this->assertTrue($game->listoParaIniciar());
    }

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

    // public function testNoPuedenJugarFueraDelTablero()
    // {
    //     $jugadorX = new Jugador('x');
    //     $jugadorO = new Jugador('o');
    //     $game = new TatetiGame($jugadorX, $jugadorO);
    //     $posicion = new Posicion(5, -1);
    //     try {
    //         $game->juegaX($posicion);
    //         $this->fail();
    //     } catch (Exception $e) {
    //         $this->assertTrue($e->getMessage() == 'Posicion fuera del tablero');
    //     }
    // }

    // public function testNoPuedenJugarFueraDeTurno()
    // {
    //     $jugadorX = new Jugador('x');
    //     $jugadorO = new Jugador('o');
    //     $game = new TatetiGame($jugadorX, $jugadorO);
    //     $posicion = new Posicion(2, 2);
    //     try {
    //         $game->juegaO($posicion);
    //         $this->fail();
    //     } catch (Exception $e) {
    //         $this->assertTrue($e->getMessage() == 'No es tu turno');
    //     }
    // }

    // public function testGanaXVertical()
    // {
    //     $jugadorX = new Jugador('x');
    //     $jugadorO = new Jugador('o');
    //     $game = new TatetiGame($jugadorX, $jugadorO);
    //     $posicionX = new Posicion(0, 0);
    //     $game->juegaX($posicionX);
    //     $posicionO = new Posicion(1, 0);
    //     $game->juegaO($posicionO);
    //     $posicionXDos = new Posicion(0, 1);
    //     $game->juegaX($posicionXDos);
    //     $posicionODos = new Posicion(1, 1);
    //     $game->juegaO($posicionODos);
    //     $posicionXTres = new Posicion(0, 2);
    //     $game->juegaX($posicionXTres);
    //     $this->assertTrue($game->gameOver());
    // }

    // public function testGanaXHorizontal()
    // {
    //     $jugadorX = new Jugador('x');
    //     $jugadorO = new Jugador('o');
    //     $game = new TatetiGame($jugadorX, $jugadorO);
    //     $posicionX = new Posicion(0, 0);
    //     $game->juegaX($posicionX);
    //     $posicionO = new Posicion(0, 1);
    //     $game->juegaO($posicionO);
    //     $posicionXDos = new Posicion(1, 0);
    //     $game->juegaX($posicionXDos);
    //     $posicionODos = new Posicion(0, 2);
    //     $game->juegaO($posicionODos);
    //     $posicionXTres = new Posicion(2, 0);
    //     $game->juegaX($posicionXTres);
    //     $this->assertTrue($game->gameOver());
    // }

    // public function testGanaXDiagonalUno()
    // {
    //     $jugadorX = new Jugador('x');
    //     $jugadorO = new Jugador('o');
    //     $game = new TatetiGame($jugadorX, $jugadorO);
    //     $posicionX = new Posicion(0, 0);
    //     $game->juegaX($posicionX);
    //     $posicionO = new Posicion(0, 1);
    //     $game->juegaO($posicionO);
    //     $posicionXDos = new Posicion(1, 1);
    //     $game->juegaX($posicionXDos);
    //     $posicionODos = new Posicion(0, 2);
    //     $game->juegaO($posicionODos);
    //     $posicionXTres = new Posicion(2, 2);
    //     $game->juegaX($posicionXTres);
    //     $this->assertTrue($game->gameOver());
    // }

    // public function testGanaXDiagonalDos()
    // {
    //     $jugadorX = new Jugador('x');
    //     $jugadorO = new Jugador('o');
    //     $game = new TatetiGame($jugadorX, $jugadorO);
    //     $posicionX = new Posicion(2, 0);
    //     $game->juegaX($posicionX);
    //     $posicionO = new Posicion(0, 1);
    //     $game->juegaO($posicionO);
    //     $posicionXDos = new Posicion(1, 1);
    //     $game->juegaX($posicionXDos);
    //     $posicionODos = new Posicion(1, 2);
    //     $game->juegaO($posicionODos);
    //     $posicionXTres = new Posicion(0, 2);
    //     $game->juegaX($posicionXTres);
    //     $this->assertTrue($game->gameOver());
    // }

}
