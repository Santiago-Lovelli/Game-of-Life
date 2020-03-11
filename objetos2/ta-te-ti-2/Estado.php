<?php

interface Estado
{
    function getValor();
    function setValor($valor, $unaCasilla);
    function vacio();
}
