<?php

class SeleccionadorRepo{
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli("localhost", "root", "", "heracles_bd"); //Conecto a la base de datos
        if ($this->conexion->connect_error) { //Si hay error 
            die("Conexión fallida: " . $this->conexion->connect_error);//Aviso al Cliente
        }
    }

    public function guardar(Seleccionador $seleccionador, $username) {
        $nombre=$seleccionador->getNombre();
        $this->conexion->query("INSERT INTO Seleccionador VALUES (NULL,'$nombre');"); //Inserto los datos
        $result = $this->conexion->query("INSERT INTO esSeleccionador VALUES ('$username',NULL);");
        $this->conexion->close(); //Luego de insertado cierro la conexión
        return $result; //Devuelvo el resultado. En caso que sean ingresados los datos con éxito devuelve true. Caso contrario devuelve false.
    }

    public function obtenerTodos() {
        $resultado = $this->conexion->query("SELECT * FROM Seleccionador"); // Traigo todas las Clientes de la base de datos
        $retorno = []; //Arreglo auxiliar
        while($Cliente = $resultado->fetch_object()){ //Voy convirtiendo, uno por uno, los resultados en objetos de la clase stdClass
            $retorno[] = $Cliente; //Agrego los objetos al arreglo auxiliar
        }
        return $retorno; //Devuelvo el arreglo
    }

    public function obtenerDeportistas()
    {
        $resultado = $this->conexion->query("SELECT * FROM esdeportista INNER JOIN Deporte ON Deporte.ID_Deporte=esdeportista.ID_Deporte"); // Traigo todas las Deportista de la base de datos
        $retorno = []; //Arreglo auxiliar
        while ($Cliente = $resultado->fetch_object()) { //Voy convirtiendo, uno por uno, los resultados en objetos de la clase stdClass
            $retorno[] = $Cliente; //Agrego los objetos al arreglo auxiliar
        }
        return $retorno; //Devuelvo el arreglo
    }
}
?>
