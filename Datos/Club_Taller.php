<?php

class Club_Taller{
    private $numero;
    private $club_taller;
    private $nombre;

    public function __construct($numero,$club_taller,$nombre){
        $this->numero=$numero;
        $this->club_taller=$club_taller;
        $this->nombre=$nombre;
    }

    public function getNumero(){
        return $this->numero;
    }
    
    public function getClub_Taller(){
        return $this->club_taller;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
}
?>