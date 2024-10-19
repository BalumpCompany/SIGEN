<?php

class CronogramaRepo{
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli("localhost", "root", "", "heracles_bd"); //Conecto a la base de datos
        if ($this->conexion->connect_error) { //Si hay error 
            die("Conexión fallida: " . $this->conexion->connect_error);//Aviso al Cronograma
        }
    }

    public function obtenerTodos() {
        $resultado = $this->conexion->query("SELECT * FROM cronograma"); // Traigo todas las Cronogramas de la base de datos
        $retorno = []; //Arreglo auxiliar
        while($Cronograma = $resultado->fetch_object()){ //Voy convirtiendo, uno por uno, los resultados en objetos de la clase stdClass
            $retorno[] = $Cronograma; //Agrego los objetos al arreglo auxiliar
        }
        return $retorno; //Devuelvo el arreglo
    }

    public function verificarDispCliente($id){
        $trabaja = $this->conexion->query("SELECT * FROM trabaja WHERE Id_Cronograma=$id")->num_rows;
        $asiste = $this->conexion->query("SELECT * FROM asiste WHERE Id_Cronograma=$id")->num_rows;
        if($trabaja<1 || $asiste>=6){
            return false;
        }
        return true;
    }

    public function verificarDispCoach($id){
        $trabaja = $this->conexion->query("SELECT * FROM trabaja WHERE Id_Cronograma=$id")->num_rows;
        if($trabaja>0){
            return false;
        }
        return true;
    }
}
?>