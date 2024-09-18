<?php

class Entrenador{
    private $ID;
    private $nombre;

    public function __construct($ID,$nombre){
        $this->ID=$ID;
        $this->nombre=$nombre;
    }

    public function getID(){
        return $this->ID;
    }

    public function getNombre(){
        return $this->nombre;
    }
    
}
?>