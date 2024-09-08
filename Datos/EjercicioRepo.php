<?php

class EjercicioRepo{
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli("localhost", "root", "", "heracles_bd"); //Conecto a la base de datos
        if ($this->conexion->connect_error) { //Si hay error 
            die("Conexión fallida: " . $this->conexion->connect_error);//Aviso al usuario
        }
    }

    public function guardar(Ejercicio $ejercicio) {
        $nombre = $ejercicio->getNombre();
        $desc = $ejercicio->getDesc();
        $gif = $ejercicio->getGif();
        $result = $this->conexion->query("INSERT INTO ejercicios (titulo, descripcion, gif) VALUES ('$nombre', '$desc', '$gif')"); //Inserto los datos
        $this->conexion->close(); //Luego de insertado cierro la conexión
        return $result; //Devuelvo el resultado. En caso que sean ingresados los datos con éxito devuelve true. Caso contrario devuelve false.
    }

    public function obtenerTodos() {
        $resultado = $this->conexion->query("SELECT * FROM ejercicios"); // Traigo todas las tareas de la base de datos
        $retorno = []; //Arreglo auxiliar
        while($ejercicio = $resultado->fetch_object()){ //Voy convirtiendo, uno por uno, los resultados en objetos de la clase stdClass
            $retorno[] = $ejercicio; //Agrego los objetos al arreglo auxiliar
        }
        var_dump($retorno);
        return $retorno; //Devuelvo el arreglo
    }

    public function obtener($nombre){
        $resultado = $this->conexion->query("SELECT * FROM ejercicios WHERE Nombre LIKE'%$nombre%'"); // Traigo todas las tareas de la base de datos
        $retorno = []; //Arreglo auxiliar
        while($ejercicio = $resultado->fetch_object()){ //Voy convirtiendo, uno por uno, los resultados en objetos de la clase stdClass
            $retorno[] = $ejercicio; //Agrego los objetos al arreglo auxiliar
        }
        var_dump($retorno);
        return $retorno; //Devuelvo el arreglo
    }
}
?>