<?php

class EntrenadorRepo{
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli("localhost", "root", "", "heracles_bd"); //Conecto a la base de datos
        if ($this->conexion->connect_error) { //Si hay error 
            die("Conexión fallida: " . $this->conexion->connect_error);//Aviso al Cliente
        }
    }

    public function guardar(Entrenador $entrenador, $username) {
        $nombre=$entrenador->getNombre();
        $this->conexion->query("INSERT INTO entrenador VALUES (NULL,'$nombre');"); //Inserto los datos
        $result = $this->conexion->query("INSERT INTO esentrenador VALUES ('$username',NULL);");
        $this->conexion->close(); //Luego de insertado cierro la conexión
        return $result; //Devuelvo el resultado. En caso que sean ingresados los datos con éxito devuelve true. Caso contrario devuelve false.
    }

    public function obtenerTodos() {
        $resultado = $this->conexion->query("SELECT * FROM entrenador"); // Traigo todas las Clientes de la base de datos
        $retorno = []; //Arreglo auxiliar
        while($Entrenador = $resultado->fetch_object()){ //Voy convirtiendo, uno por uno, los resultados en objetos de la clase stdClass
            $retorno[] = $Entrenador; //Agrego los objetos al arreglo auxiliar
        }
        return $retorno; //Devuelvo el arreglo
    }

    public function trabaja($id,$user){
        $nro=$this->conexion->query("SELECT ID_Entrenador FROM esentrenador WHERE Username='$user'")->fetch_array();
        $idSede=$this->conexion->query("SELECT ID_Sede FROM trabaja_sede WHERE ID_Entrenador=$nro[0]")->fetch_array();
        $result=$this->conexion->query("INSERT INTO trabaja VALUES ($nro[0],$id,$idSede[0])");
        $this->conexion->close();
        return $result;
    }

    public function trabaja_sede($user,$idSede){
        $idEntrenador=$this->conexion->query("SELECT ID_Entrenador FROM esentrenador WHERE Username='$user'")->fetch_array();
        $this->conexion->query("INSERT INTO trabaja_sede VALUES ($idEntrenador[0],$idSede);");
        $result=$this->conexion->query("UPDATE trabaja_sede SET `ID_Entrenador`=$idEntrenador[0],`ID_Sede`=$idSede WHERE ID_Entrenador=$idEntrenador[0]");
        $this->conexion->close();
        return $result;
    }

    public function obtenerClientesAsignados($user){
        $id=$this->conexion->query("SELECT ID_Entrenador FROM esentrenador WHERE Username='$user'")->fetch_array();
        $query=$this->conexion->query("SELECT Numero_Socio FROM asignado WHERE ID_Entrenador=$id[0]");
        $nros=[];
        $retorno=[];
        while($Nro=$query->fetch_object()){
            if(!in_array($Nro,$nros)){
                $nros[]=$Nro;
            }
        }
        foreach($nros as $nro1){
            $clientes=$this->conexion->query("SELECT cliente.*,asignado.Dia FROM asignado INNER JOIN cliente ON asignado.Numero_Socio=cliente.Numero_Socio WHERE asignado.Numero_Socio=$nro1->Numero_Socio AND asignado.ID_Entrenador=$id[0]")->fetch_all();
            foreach($clientes as $cliente){
                $retorno[]=$cliente;
            }
        }
        $this->conexion->close();
        return $retorno;
    }

    public function puntuar($nro,$cump,$resAn,$fuerza,$resMus,$flex,$resMon,$resi,$cumpE,$resAnE,$fuerzaE,$resMusE,$flexE,$resMonE,$resiE){
        $retorno=$this->conexion->multi_query("INSERT INTO califica VALUES ($nro,1,$cump,$cumpE,CURRENT_DATE); INSERT INTO califica VALUES ($nro,2,$resAn,$resAnE,CURRENT_DATE); INSERT INTO califica VALUES ($nro,3,$fuerza,$fuerzaE,CURRENT_DATE); INSERT INTO califica VALUES ($nro,4,$resMus,$resMusE,CURRENT_DATE); INSERT INTO califica VALUES ($nro,5,$flex,$flexE,CURRENT_DATE); INSERT INTO califica VALUES ($nro,6,$resMon,$resMonE,CURRENT_DATE); INSERT INTO califica VALUES ($nro,7,$resi,$resiE,CURRENT_DATE);");
        $this->conexion->close();
        return $retorno;
    }
}
?>
