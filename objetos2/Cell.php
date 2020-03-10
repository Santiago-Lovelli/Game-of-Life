<?php

class Cell
{
    public $x;
    public $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX()
    {
        return $this->x;
    }

    public function setX($x)
    {
        $this->x = $x;

        return $this;
    }

    public function getY()
    {
        return $this->y;
    }

    public function setY($y)
    {
        $this->y = $y;

        return $this;
    }

    public function vive($cells)
    {
        return $this->cantidadDeVecinos($cells) >= 2 && $this->cantidadDeVecinos($cells) < 4;
    }

    public function cantidadDeVecinos($cells)
    {
        $cantidadDeVecinos = 0;
        foreach ($cells as $cell) {
            if ($this->esVecino($cell)) {
                $cantidadDeVecinos = $cantidadDeVecinos + 1;
            }
        }
        return $cantidadDeVecinos;
    }

    public function esVecino($cell)
    {
        $distanciaEnX = $this->getX() - $cell->getX();
        $distanciaEnY = $this->getY() - $cell->getY();
        return (
            ($distanciaEnX >= -1 && $distanciaEnX <= 1)
            && ($distanciaEnY >= -1 && $distanciaEnY <= 1)
            && ($distanciaEnX != 0 || $distanciaEnY != 0)
        );
    }

    public function generarCelula($aGame)
    {
        $vecinos = $this->generarVecinos();
        foreach ($vecinos as $vecino) {
            if (!$aGame->estaViva($vecino) && $vecino->cantidadDeVecinos($aGame->getAliveCells()) == 3) {
                $aGame->addAliveCell($vecino);
            }
        }

    }

    public function generarVecinos()
    {
        $vecinoArriba = new Cell($this->getX(), $this->getY() - 1);
        $vecinoAbajo = new Cell($this->getX(), $this->getY() + 1);
        $vecinoDerecha = new Cell($this->getX() + 1, $this->getY());
        $vecinoIzquierda = new Cell($this->getX() - 1, $this->getY());
        $vecinoArribaDerecha = new Cell($this->getX() + 1, $this->getY() - 1);
        $vecinoArribaIzquierda = new Cell($this->getX() - 1, $this->getY() - 1);
        $vecinoAbajoDerecha = new Cell($this->getX() + 1, $this->getY() + 1);
        $vecinoAbajoIzquierda = new Cell($this->getX() - 1, $this->getY() + 1);
        $vecinos[] = $vecinoArriba;
        $vecinos[] = $vecinoAbajo;
        $vecinos[] = $vecinoDerecha;
        $vecinos[] = $vecinoIzquierda;
        $vecinos[] = $vecinoArribaDerecha;
        $vecinos[] = $vecinoArribaIzquierda;
        $vecinos[] = $vecinoAbajoDerecha;
        $vecinos[] = $vecinoAbajoIzquierda;
        return $vecinos;
    }

}
