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
        $this->matar();
        $this->reproducir();
    }

    public function matar()
    {
        $noVive = function ($cell) {
            return !$cell->vive($this->aliveCells);
        };

        $celulasParaMatar = array_filter($this->aliveCells, $noVive);

        foreach ($celulasParaMatar as $key => $cell) {
            unset($this->aliveCells[$key]);
        }
    }

    public function reproducir()
    {
        $celulasIniciales = $this->getAliveCells();

        foreach ($celulasIniciales as $cell) {

            $porVivir = function ($vecino) use ($celulasIniciales) {
                return !$this->estaViva($vecino) && $vecino->cantidadDeVecinos($celulasIniciales) == 3;
            };

            $vecinoDeLaCelula = $cell->generarVecinos();

            $celulasParaAgregar = array_filter($vecinoDeLaCelula, $porVivir);

            foreach ($celulasParaAgregar as $aAgregar) {
                $this->addAliveCell($aAgregar);
            }
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

    public function estaViva($aCell)
    {
        $perteneceA = function ($unElemento) use ($aCell) {
            return $unElemento->getX() == $aCell->getX() && $unElemento->getY() == $aCell->getY();
        };
        $vivos = array_filter($this->aliveCells, $perteneceA);
        return count($vivos) == 1;
    }

}
