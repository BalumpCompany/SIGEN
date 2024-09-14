<?php

class Usuario{
    private $username;
    private $nombre;
    private $apellido;
    private $mail;
    private $contrasena;
    private $rol;

    public function __construct($username,$nombre,$apellido,$mail,$contrasena,$rol){
        $this->username=$username;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->mail=$mail;
        $this->contrasena=$contrasena;
        $this->rol=$rol;
    }

    public function getUsername(){
        return $this->username;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function getApellido(){
        return $this->apellido;
    }
    
    public function getMail(){
        return $this->mail;
    }
    public function getContrasena(){
        return $this->contrasena;
    }
    public function getRol(){
        return $this->rol;
    }
}
?>