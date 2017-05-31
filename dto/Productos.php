<?php

class Productos{
    var $idProducto;
    var $nombre;
    var $totalUSD;
    var $ano;
    
    
    function __construct($idProducto=0,$nombre="",$totalUSD=0,$ano=0) {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->totalUSD = $totalUSD;
        $this->ano = $ano;
    }
}

