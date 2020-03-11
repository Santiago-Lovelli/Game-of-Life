<?php
require_once '/home/santiago/Escritorio/Curso/objetos2/Game-Of-Life/GameOfLife.php';
require_once '/home/santiago/Escritorio/Curso/objetos2/Game-Of-Life/Cell.php';

use PHPUnit\Framework\TestCase;

class GameOfLifeTest extends TestCase
{
    //Any live cell with fewer than two live neighbours dies, as if by underpopulation.
    public function testSiTieneMenosDeDosVecinosMuere()
    {
        $pointOne = new Cell(1, 1);
        $pointTwo = new Cell(1, 2);
        $aliveCells[] = $pointOne;
        $aliveCells[] = $pointTwo;
        $game = new GameOfLife($aliveCells);
        $game->nextGeneration();
        $this->assertTrue($game->sizeOfCells() == 0);
    }

    public function testSiTieneAlMenosDeDosVecinosVive()
    {
        $pointOne = new Cell(0, 0);
        $pointTwo = new Cell(0, 1);
        $pointThree = new Cell(0, 2);
        $aliveCells[] = $pointTwo;
        $aliveCells[] = $pointOne;
        $aliveCells[] = $pointThree;
        $game = new GameOfLife($aliveCells);
        $game->nextGeneration();
        $this->assertTrue($game->sizeOfCells() == 1);
    }

    public function testMataLosQueDebeYGeneraUno()
    {
        $pointOne = new Cell(1, 1);
        $pointTwo = new Cell(1, 2);
        $pointThree = new Cell(0, 1);
        $pointFour = new Cell(5, 5);
        $pointFive = new Cell(5, 6);
        $aliveCells[] = $pointOne;
        $aliveCells[] = $pointTwo;
        $aliveCells[] = $pointThree;
        $aliveCells[] = $pointFour;
        $aliveCells[] = $pointFive;
        $game = new GameOfLife($aliveCells);
        $game->nextGeneration();
        $this->assertTrue($game->sizeOfCells() == 4);
    }

    //Any live cell with two or three live neighbours lives on to the next generation.

    public function testConDosOTresVivosVive()
    {
        $pointOne = new Cell(0, 1);
        $pointTwo = new Cell(0, 0);
        $pointThree = new Cell(0, 2);
        $pointFour = new Cell(5, 5);
        $pointFive = new Cell(6, 5);
        $aliveCells[] = $pointOne;
        $aliveCells[] = $pointTwo;
        $aliveCells[] = $pointThree;
        $aliveCells[] = $pointFour;
        $aliveCells[] = $pointFive;
        $game = new GameOfLife($aliveCells);
        $game->nextGeneration();
        $this->assertTrue($game->sizeOfCells() == 1);
    }

    //Any live cell with more than three live neighbours dies, as if by overpopulation.

    public function testConCuatroMuere()
    {
        $pointOne = new Cell(0, 0);
        $pointTwo = new Cell(1, 0);
        $pointThree = new Cell(2, 0);
        $pointFour = new Cell(1, 1);
        $pointFive = new Cell(2, 1);
        $aliveCells[] = $pointOne;
        $aliveCells[] = $pointTwo;
        $aliveCells[] = $pointThree;
        $aliveCells[] = $pointFour;
        $aliveCells[] = $pointFive;
        $game = new GameOfLife($aliveCells);
        $game->nextGeneration();
        $this->assertTrue($game->sizeOfCells() == 5);
    }

    public function testMuerenTodes()
    {
        $pointOne = new Cell(0, 0);
        $pointTwo = new Cell(0, 2);
        $pointFour = new Cell(2, 1);
        $pointFive = new Cell(2, 2);
        $aliveCells[] = $pointOne;
        $aliveCells[] = $pointTwo;
        $aliveCells[] = $pointFour;
        $aliveCells[] = $pointFive;
        $game = new GameOfLife($aliveCells);
        $game->nextGeneration();
        $this->assertTrue($game->sizeOfCells() == 0);
    }

    //Any dead cell with exactly three live neighbours becomes a live cell, as if by reproduction.

    public function testRevive()
    {
        $pointOne = new Cell(0, 1);
        $pointTwo = new Cell(1, 1);
        $pointThree = new Cell(1, 2);
        $aliveCells[] = $pointOne;
        $aliveCells[] = $pointTwo;
        $aliveCells[] = $pointThree;
        $game = new GameOfLife($aliveCells);
        $game->nextGeneration();
        $this->assertTrue($game->sizeOfCells() == 4);
    }
}
