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
require_once '/home/santiago/Escritorio/Curso/objetos2/ta-te-ti-2/TurnoEmpate.php';
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

    public function testJuegaXEnCentro()
    {
        $jugadorX = new JugadorX();
        $jugadorO = new JugadorO();
        $game = new TatetiGame($jugadorX, $jugadorO);
        $posicion = new MyPoint(2, 2);
        $game->juegaX($posicion);
        $this->assertTrue($game->turnoDeO());
        $this->assertTrue($game->getValorDePosicion($posicion) == 'x');
    }

    public function testJuegaODespuesDeX()
    {
        $jugadorX = new JugadorX();
        $jugadorO = new JugadorO();
        $game = new TatetiGame($jugadorX, $jugadorO);
        $posicion = new MyPoint(1, 1);
        $game->juegaX($posicion);
        $posicionDos = new MyPoint(1, 2);
        $game->juegaO($posicionDos);
        $this->assertTrue($game->turnoDeX());
        $this->assertTrue($game->getValorDePosicion($posicionDos) == 'o');
    }

    public function testNoPuedenJugarMismaPosicion()
    {
        $jugadorX = new JugadorX();
        $jugadorO = new JugadorO();
        $game = new TatetiGame($jugadorX, $jugadorO);
        $posicion = new MyPoint(1, 1);
        $game->juegaX($posicion);
        try {
            $game->juegaO($posicion);
            $this->fail();
        } catch (Exception $e) {
            $this->assertTrue($e->getMessage() == 'Posicion ya ocupada');
        }
    }

    public function testNoPuedenJugarFueraDelTablero()
    {
        $jugadorX = new JugadorX();
        $jugadorO = new JugadorO();
        $game = new TatetiGame($jugadorX, $jugadorO);
        $posicion = new MyPoint(5, -1);
        try {
            $game->juegaX($posicion);
            $this->fail();
        } catch (Exception $e) {
            $this->assertTrue($e->getMessage() == 'Posicion fuera del tablero');
        }
    }

    public function testNoPuedenJugarFueraDeTurno()
    {
        $jugadorX = new JugadorX();
        $jugadorO = new JugadorO();
        $game = new TatetiGame($jugadorX, $jugadorO);
        $posicion = new MyPoint(2, 2);
        try {
            $game->juegaO($posicion);
            $this->fail();
        } catch (Exception $e) {
            $this->assertTrue($e->getMessage() == 'No es tu turno');
        }
    }

    public function testGanaXVertical()
    {
        $jugadorX = new JugadorX();
        $jugadorO = new JugadorO();
        $game = new TatetiGame($jugadorX, $jugadorO);
        $posicionX = new MyPoint(2, 2);
        $game->juegaX($posicionX);
        $posicionO = new MyPoint(1, 1);
        $game->juegaO($posicionO);
        $posicionXDos = new MyPoint(2, 1);
        $game->juegaX($posicionXDos);
        $posicionODos = new MyPoint(1, 2);
        $game->juegaO($posicionODos);
        $posicionXTres = new MyPoint(2, 3);
        $game->juegaX($posicionXTres);
        $posicionOTres = new MyPoint(1, 3);
        try {
            $game->juegaO($posicionOTres);
            $this->fail();
        } catch (Exception $e) {
            $this->assertTrue($e->getMessage() == 'Game Over');
            $this->assertTrue($game->ganadorX());
        }
    }

    public function testGanaXHorizontal()
    {
        $jugadorX = new JugadorX();
        $jugadorO = new JugadorO();
        $game = new TatetiGame($jugadorX, $jugadorO);
        $posicionX = new MyPoint(1, 1);
        $game->juegaX($posicionX);
        $posicionO = new MyPoint(1, 2);
        $game->juegaO($posicionO);
        $posicionXDos = new MyPoint(2, 1);
        $game->juegaX($posicionXDos);
        $posicionODos = new MyPoint(2, 2);
        $game->juegaO($posicionODos);
        $posicionXTres = new MyPoint(3, 1);
        $game->juegaX($posicionXTres);
        $posicionOTres = new MyPoint(2, 1);
        try {
            $game->juegaO($posicionOTres);
            $this->fail();
        } catch (Exception $e) {
            $this->assertTrue($e->getMessage() == 'Game Over');
            $this->assertTrue($game->ganadorX());
        }
    }

    public function testGanaOVertical()
    {
        $jugadorX = new JugadorX();
        $jugadorO = new JugadorO();
        $game = new TatetiGame($jugadorX, $jugadorO);
        $posicionXTres = new MyPoint(3, 3);
        $game->juegaX($posicionXTres);
        $posicionODos = new MyPoint(1, 2);
        $game->juegaO($posicionODos);
        $posicionX = new MyPoint(2, 2);
        $game->juegaX($posicionX);
        $posicionO = new MyPoint(1, 1);
        $game->juegaO($posicionO);
        $posicionXDos = new MyPoint(2, 1);
        $game->juegaX($posicionXDos);
        $posicionOTres = new MyPoint(1, 3);
        $game->juegaO($posicionOTres);
        $posicionXCuatro = new MyPoint(2, 3);
        try {
            $game->juegaX($posicionXCuatro);
            $this->fail();
        } catch (Exception $e) {
            $this->assertTrue($e->getMessage() == 'Game Over');
            $this->assertTrue($game->ganadorO());
        }
    }

    public function testGanaOHorizontal()
    {
        $jugadorX = new JugadorX();
        $jugadorO = new JugadorO();
        $game = new TatetiGame($jugadorX, $jugadorO);
        $posicionX = new MyPoint(1, 1);
        $game->juegaX($posicionX);
        $posicionO = new MyPoint(1, 2);
        $game->juegaO($posicionO);
        $posicionXDos = new MyPoint(2, 1);
        $game->juegaX($posicionXDos);
        $posicionODos = new MyPoint(2, 2);
        $game->juegaO($posicionODos);
        $posicionXTres = new MyPoint(3, 3);
        $game->juegaX($posicionXTres);
        $posicionOTres = new MyPoint(3, 2);
        $game->juegaO($posicionOTres);
        $posicionXCuatro = new MyPoint(3, 1);
        try {
            $game->juegaX($posicionXCuatro);
            $this->fail();
        } catch (Exception $e) {
            $this->assertTrue($e->getMessage() == 'Game Over');
            $this->assertTrue($game->ganadorO());
        }
    }

    public function testGanaXDiagonalUno()
    {
        $jugadorX = new JugadorX();
        $jugadorO = new JugadorO();
        $game = new TatetiGame($jugadorX, $jugadorO);
        $posicionX = new MyPoint(1, 1);
        $game->juegaX($posicionX);
        $posicionO = new MyPoint(1, 2);
        $game->juegaO($posicionO);
        $posicionXDos = new MyPoint(2, 2);
        $game->juegaX($posicionXDos);
        $posicionODos = new MyPoint(2, 1);
        $game->juegaO($posicionODos);
        $posicionXTres = new MyPoint(3, 3);
        $game->juegaX($posicionXTres);
        $posicionOTres = new MyPoint(2, 1);
        try {
            $game->juegaO($posicionOTres);
            $this->fail();
        } catch (Exception $e) {
            $this->assertTrue($e->getMessage() == 'Game Over');
            $this->assertTrue($game->ganadorX());
        }
    }

    public function testGanaODiagonalUno()
    {
        $jugadorX = new JugadorX();
        $jugadorO = new JugadorO();
        $game = new TatetiGame($jugadorX, $jugadorO);
        $posicionX = new MyPoint(1, 2);
        $game->juegaX($posicionX);
        $posicionO = new MyPoint(1, 1);
        $game->juegaO($posicionO);
        $posicionXDos = new MyPoint(2, 1);
        $game->juegaX($posicionXDos);
        $posicionODos = new MyPoint(2, 2);
        $game->juegaO($posicionODos);
        $posicionXTres = new MyPoint(3, 1);
        $game->juegaX($posicionXTres);
        $posicionOTres = new MyPoint(3, 3);
        $game->juegaO($posicionOTres);
        $posicionXCuatro = new MyPoint(3, 1);
        try {
            $game->juegaX($posicionXCuatro);
            $this->fail();
        } catch (Exception $e) {
            $this->assertTrue($e->getMessage() == 'Game Over');
            $this->assertTrue($game->ganadorO());
        }
    }

    public function testGanaXDiagonalDos()
    {
        $jugadorX = new JugadorX();
        $jugadorO = new JugadorO();
        $game = new TatetiGame($jugadorX, $jugadorO);
        $posicionX = new MyPoint(3, 1);
        $game->juegaX($posicionX);
        $posicionO = new MyPoint(1, 2);
        $game->juegaO($posicionO);
        $posicionXDos = new MyPoint(2, 2);
        $game->juegaX($posicionXDos);
        $posicionODos = new MyPoint(2, 1);
        $game->juegaO($posicionODos);
        $posicionXTres = new MyPoint(1, 3);
        $game->juegaX($posicionXTres);
        $posicionOTres = new MyPoint(2, 1);
        try {
            $game->juegaO($posicionOTres);
            $this->fail();
        } catch (Exception $e) {
            $this->assertTrue($e->getMessage() == 'Game Over');
            $this->assertTrue($game->ganadorX());
        }
    }

    public function testGanaODiagonalDos()
    {
        $jugadorX = new JugadorX();
        $jugadorO = new JugadorO();
        $game = new TatetiGame($jugadorX, $jugadorO);
        $posicionX = new MyPoint(1, 2);
        $game->juegaX($posicionX);
        $posicionO = new MyPoint(3, 1);
        $game->juegaO($posicionO);
        $posicionXDos = new MyPoint(2, 1);
        $game->juegaX($posicionXDos);
        $posicionODos = new MyPoint(2, 2);
        $game->juegaO($posicionODos);
        $posicionXTres = new MyPoint(3, 3);
        $game->juegaX($posicionXTres);
        $posicionOTres = new MyPoint(1, 3);
        $game->juegaO($posicionOTres);
        $posicionXCuatro = new MyPoint(3, 1);
        try {
            $game->juegaX($posicionXCuatro);
            $this->fail();
        } catch (Exception $e) {
            $this->assertTrue($e->getMessage() == 'Game Over');
            $this->assertTrue($game->ganadorO());
        }
    }

    public function testEmpate()
    {
        $jugadorX = new JugadorX();
        $jugadorO = new JugadorO();
        $game = new TatetiGame($jugadorX, $jugadorO);
        $posicionX = new MyPoint(2, 1);
        $posicionXDos = new MyPoint(1, 2);
        $posicionXTres = new MyPoint(2, 2);
        $posicionXCuatro = new MyPoint(1, 3);
        $posicionXCinco = new MyPoint(3, 3);
        $posicionO = new MyPoint(1, 1);
        $posicionODos = new MyPoint(3, 1);
        $posicionOTres = new MyPoint(3, 2);
        $posicionOCuatro = new MyPoint(2, 3);
        $posicionOCinco = new MyPoint(3, 3);
        $game->juegaX($posicionX);
        $game->juegaO($posicionO);
        $game->juegaX($posicionXDos);
        $game->juegaO($posicionODos);
        $game->juegaX($posicionXTres);
        $game->juegaO($posicionOTres);
        $game->juegaX($posicionXCuatro);
        $game->juegaO($posicionOCuatro);
        $game->juegaX($posicionXCinco);
        try {
            $game->juegaO($posicionOCinco);
            $this->fail();
        } catch (Exception $e) {
            $this->assertTrue($e->getMessage() == 'Empate');
            $this->assertTrue($game->empatado());
            $this->assertTrue(!$game->ganadorX());
            $this->assertTrue(!$game->ganadorO());
        }
    }
}
