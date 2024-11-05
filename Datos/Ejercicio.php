<?php

class Ejercicio{
    private $id;
    private $nombre;
    private $desc;
    private $gif;

    public function __construct($id,$nombre,$desc,$gif){
        $this->id=$id;
        $this->nombre=$nombre;
        $this->desc=$desc;
        $this->gif=$gif;
    }

    public function getId(){
        return $this->id;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function getDesc(){
        return $this->desc;
    }
    
    public function getGif(){
        return $this->gif;
    }
}
?>