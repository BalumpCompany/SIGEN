<?php

class Club_TallerRepo{
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli("localhost", "root", "", "heracles_bd"); //Conecto a la base de datos
        if ($this->conexion->connect_error) { //Si hay error 
            die("Conexión fallida: " . $this->conexion->connect_error);//Aviso al usuario
        }
    }

    public function guardar(Club_Taller $clubTaller) {
        $club_taller = $clubTaller->getClub_Taller();
        $nombre = $clubTaller->getNombre();
        $result = $this->conexion->query("INSERT INTO Club_Taller VALUES (NULL, '$club_taller', '$nombre')"); //Inserto los datos
        $this->conexion->close(); //Luego de insertado cierro la conexión
        return $result; //Devuelvo el resultado. En caso que sean ingresados los datos con éxito devuelve true. Caso contrario devuelve false.
    }
}
?>