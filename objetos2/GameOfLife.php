<?php

class GameOfLife
{
    private $aliveCells;

    public function __construct($aliveCells)
    {
        $this->aliveCells = $aliveCells;
    }

    public function nextGeneration()
    {
        $total = $this->sizeOfCells();
        for ($i = 0; $i < $total; $i++) {
            if (isset($this->aliveCells[$i]) && !$this->aliveCells[$i]->vive($this->aliveCells)) {
                unset($this->aliveCells[$i]);
            }
        }
        foreach ($this->aliveCells as $cell) {
            $cell->generarCelula($this);
        }
    }

    public function getAliveCells()
    {
        return $this->aliveCells;
    }

    public function addAliveCell($aCell)
    {
        return $this->aliveCells[] = $aCell;
    }

    public function sizeOfCells()
    {
        return count($this->aliveCells);
    }

}
