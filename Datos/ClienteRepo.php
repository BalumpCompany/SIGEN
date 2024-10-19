<?php

class ClienteRepo
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new mysqli("localhost", "root", "", "heracles_bd"); //Conecto a la base de datos
        if ($this->conexion->connect_error) { //Si hay error 
            die("Conexión fallida: " . $this->conexion->connect_error);//Aviso al Cliente
        }
    }

    public function guardar(Cliente $cliente, $username)
    {
        $nombre = $cliente->getNombre();
        $apellido = $cliente->getApellido();
        $this->conexion->query("INSERT INTO cliente VALUES (NULL,'$nombre','$apellido');"); //Inserto los datos
        $result = $this->conexion->query("INSERT INTO escliente VALUES ('$username',NULL);");
        $this->conexion->close(); //Luego de insertado cierro la conexión
        return $result; //Devuelvo el resultado. En caso que sean ingresados los datos con éxito devuelve true. Caso contrario devuelve false.
    }

    public function obtenerTodos()
    {
        $resultado = $this->conexion->query("SELECT * FROM cliente"); // Traigo todas las Clientes de la base de datos
        $retorno = []; //Arreglo auxiliar
        while ($Cliente = $resultado->fetch_object()) { //Voy convirtiendo, uno por uno, los resultados en objetos de la clase stdClass
            $retorno[] = $Cliente; //Agrego los objetos al arreglo auxiliar
        }
        return $retorno; //Devuelvo el arreglo
    }

    public function asiste($id, $user)
    {
        $nro = $this->conexion->query("SELECT Numero_Socio FROM escliente WHERE Username='$user'")->fetch_array();
        $idEntrenador = $this->conexion->query("SELECT ID_Entrenador FROM trabaja WHERE ID_Cronograma=$id")->fetch_array();
        $dia = $this->conexion->query("SELECT Dia FROM cronograma WHERE Id_Cronograma='$id'")->fetch_array();
        $dias = $this->conexion->query("SELECT Dia FROM Cronograma INNER JOIN asiste ON Cronograma.Id_Cronograma = asiste.Id_Cronograma WHERE asiste.Numero_Socio=$nro[0] AND cronograma.Dia='$dia[0]'")->num_rows;
        if ($dias > 0) {
            $result = $this->conexion->multi_query("DELETE asiste FROM asiste INNER JOIN cronograma ON asiste.Id_Cronograma=cronograma.Id_Cronograma WHERE Numero_Socio=$nro[0] AND cronograma.Dia='$dia[0]'; UPDATE asignado SET Id_Entrenador=$idEntrenador[0], Numero_Socio=$nro[0] WHERE Numero_Socio=$nro[0]; INSERT INTO asiste VALUES ($id,$nro[0]);");
            $this->conexion->close();
            return $result;
        }
        $result = $this->conexion->query("INSERT INTO asiste VALUES ($id,$nro[0]);");
        $this->conexion->close();
        return $result;
    }

    public function crearDeportista($user, $deporte, $posicion)
    {
        $nro = $this->conexion->query("SELECT Numero_Socio FROM escliente WHERE Username='$user'")->fetch_array();
        $result = $this->conexion->query("INSERT INTO esDeportista VALUES ($deporte,'$posicion',$nro[0]);");
        $this->conexion->close();
        return $result;
    }

    public function crearFisioterapia($user, $lesion)
    {
        $nro = $this->conexion->query("SELECT Numero_Socio FROM escliente WHERE Username='$user'")->fetch_array();
        $result = $this->conexion->query("INSERT INTO fisioterapia VALUES ('$lesion',$nro[0]);");
        $this->conexion->close();
        return $result;
    }

}
?>