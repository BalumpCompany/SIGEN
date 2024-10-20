<?php

class SucursalRepo{
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli("localhost", "root", "", "heracles_bd"); //Conecto a la base de datos
        if ($this->conexion->connect_error) { //Si hay error 
            die("Conexión fallida: " . $this->conexion->connect_error);//Aviso al Cliente
        }
    }

    public function guardar(Sucursal $sucursal) {
        $nombre = $sucursal->getNombre();
        $direccion = $sucursal->getDireccion();
        $lugaresMaximos = $sucursal->getLugaresMaximos();
        $logo = $sucursal->getLogo();
        $texto = $sucursal->getTextoEditable();
        $result = $this->conexion->query("INSERT INTO sede VALUES (NULL, '$nombre', '$direccion', '$lugaresMaximos', '$logo', '$texto')"); //Inserto los datos
        $this->conexion->close(); //Luego de insertado cierro la conexión
        return $result; //Devuelvo el resultado. En caso que sean ingresados los datos con éxito devuelve true. Caso contrario devuelve false.
    }

    public function obtenerTodos() {
        $resultado = $this->conexion->query("SELECT * FROM sede"); // Traigo todas las sucursales de la base de datos
        $retorno = []; //Arreglo auxiliar
        while($Sede = $resultado->fetch_object()){ //Voy convirtiendo, uno por uno, los resultados en objetos de la clase stdClass
            $retorno[] = $Sede; //Agrego los objetos al arreglo auxiliar
        }
        return $retorno; //Devuelvo el arreglo
    }
}
?>