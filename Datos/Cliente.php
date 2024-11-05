<?php

class Cliente{
    private $numero;
    private $nombre;
    private $apellido;

    public function __construct($numero,$nombre,$apellido){
        $this->numero=$numero;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
    }

    public function getNumero(){
        return $this->numero;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function getApellido(){
        return $this->apellido;
    }
}
?>