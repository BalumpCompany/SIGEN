<?php

class Sucursal{
    private $nombre;
    private $direccion;
    private $lugaresMaximos;
    private $logo;
    private $textoEditable;

    public function __construct($nombre,$direccion,$lugaresMaximos,$logo,$textoEditable){
        $this->nombre=$nombre;
        $this->direccion=$direccion;
        $this->lugaresMaximos=$lugaresMaximos;
        $this->logo=$logo;
        $this->textoEditable=$textoEditable;
    }

    public function getNombre(){
        return $this->nombre;
    }
    
    public function getDireccion(){
        return $this->direccion;
    }

    public function getLugaresMaximos(){
        return $this->lugaresMaximos;
    }
    
    public function getLogo(){
        return $this->logo;
    }

    public function getTextoEditable(){
        return $this->textoEditable;
    }
}
?>