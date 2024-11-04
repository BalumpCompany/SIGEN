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
        $resultado = $this->conexion->query("SELECT cliente.*,deporte.Nombre as `nombreD` ,deporte.ID_Deporte,esdeportista.Posicion FROM cliente JOIN esdeportista ON cliente.Numero_Socio=esdeportista.Numero_Socio INNER JOIN deporte ON esdeportista.ID_Deporte=deporte.ID_Deporte"); // Traigo todas las Deportista de la base de datos
        $retorno = []; //Arreglo auxiliar
        while ($Cliente = $resultado->fetch_object()) { //Voy convirtiendo, uno por uno, los resultados en objetos de la clase stdClass
            $retorno[] = $Cliente; //Agrego los objetos al arreglo auxiliar
        }
        return $retorno; //Devuelvo el arreglo
    }

    public function obtenerParaSeleccionar(){
        $resultado = $this->conexion->query("SELECT cliente.*,deporte.Nombre as `nombreD` ,deporte.ID_Deporte,esdeportista.Posicion FROM cambia_estado JOIN esdeportista ON cambia_estado.Numero_Socio=esdeportista.Numero_Socio INNER JOIN cliente ON cliente.Numero_Socio=cambia_estado.Numero_Socio INNER JOIN deporte ON esdeportista.ID_Deporte=deporte.ID_Deporte WHERE Id_Estado=5 AND ISNULL(Fecha_Fin);"); // Traigo todas las Deportista de la base de datos
        $retorno = []; //Arreglo auxiliar
        while ($Cliente = $resultado->fetch_object()) { //Voy convirtiendo, uno por uno, los resultados en objetos de la clase stdClass
            $retorno[] = $Cliente; //Agrego los objetos al arreglo auxiliar
        }
        return $retorno; //Devuelvo el arreglo
    }

    public function seleccionar($nro, $deporte,$user){
        $id=$this->conexion->query("SELECT ID_Seleccionador FROM esseleccionador WHERE Username='$user'")->fetch_array();
        $result=$this->conexion->query("INSERT INTO seleccionado VALUES ($deporte,$nro,$id[0],CURRENT_DATE);");
        $this->conexion->close();
        return $result;
    }

    public function obtenerSeleccionados(){
        $resultado = $this->conexion->query("SELECT * FROM seleccionado INNER JOIN cliente ON cliente.Numero_Socio=seleccionado.Numero_Socio;"); // Traigo todas las Deportista de la base de datos
        $retorno = []; //Arreglo auxiliar
        while ($Cliente = $resultado->fetch_object()) { //Voy convirtiendo, uno por uno, los resultados en objetos de la clase stdClass
            $retorno[] = $Cliente; //Agrego los objetos al arreglo auxiliar
        }
        return $retorno; //Devuelvo el arreglo
    }

    public function armarEquipo($nros,$id){
        foreach($nros as $nro){
            $this->conexion->query("INSERT INTO formaparte VALUES ($nro,$id)");
        }
        return;
    }
}
?>
