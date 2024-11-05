<?php

class UsuarioRepo{
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli("localhost", "root", "", "heracles_bd"); //Conecto a la base de datos
        if ($this->conexion->connect_error) { //Si hay error 
            die("Conexión fallida: " . $this->conexion->connect_error);//Aviso al usuario
        }
    }

    public function guardar(Usuario $Usuario) {
        $username = $Usuario->getUsername();
        $nombre = $Usuario->getNombre();
        $apellido = $Usuario->getApellido();
        $mail = $Usuario->getMail();
        $contrasena = $Usuario->getContrasena();
        $rol = $Usuario->getRol();
        $result = $this->conexion->query("INSERT INTO usuario VALUES ('$username','$nombre','$apellido','$mail','$contrasena','$rol')"); //Inserto los datos
        $this->conexion->close(); //Luego de insertado cierro la conexión
        return $result; //Devuelvo el resultado. En caso que sean ingresados los datos con éxito devuelve true. Caso contrario devuelve false.
    }

    public function modificar(Usuario $Usuario) {
        $username = $Usuario->getUsername();
        $nombre = $Usuario->getNombre();
        $apellido = $Usuario->getApellido();
        $mail = $Usuario->getMail();
        $contrasena = $Usuario->getContrasena();
        $rol = $Usuario->getRol();
        $result = $this->conexion->query("UPDATE usuario SET Username='$username', Nombre='$nombre', Apellido='$apellido', Email='$mail', Rol='$rol' WHERE Username='$username'");
        $this->conexion->close(); //Luego de insertado cierro la conexión
        return $result; //Devuelvo el resultado. En caso que sean ingresados los datos con éxito devuelve true. Caso contrario devuelve false.
    }
    public function eliminar($username){
        $result = $this->conexion->query("DELETE esentrenador,entrenador FROM esentrenador INNER JOIN entrenador ON entrenador.ID_Entrenador=esentrenador.ID_Entrenador WHERE Username='$username'");
        $result = $this->conexion->query("DELETE escliente,cliente FROM escliente INNER JOIN cliente ON cliente.Numero_Socio=escliente.Numero_Socio WHERE Username='$username'");
        $result = $this->conexion->query("DELETE esSeleccionador,seleccionador FROM esSeleccionador INNER JOIN seleccionador ON seleccionador.ID_seleccionador=esSeleccionador.ID_Seleccionador WHERE Username='$username'");
        $result = $this->conexion->query("DELETE FROM usuario WHERE Username='$username'");
        $this->conexion->close(); //Luego de insertado cierro la conexión
        return $result; //Devuelvo el resultado. En caso que sean ingresados los datos con éxito devuelve true. Caso contrario devuelve false.
    }
    public function obtenerTodos() {
        $resultado = $this->conexion->query("SELECT * FROM usuario"); // Traigo todas las Usuarios de la base de datos
        $retorno = []; //Arreglo auxiliar
        while($Usuario = $resultado->fetch_object()){ //Voy convirtiendo, uno por uno, los resultados en objetos de la clase stdClass
            $retorno[] = $Usuario; //Agrego los objetos al arreglo auxiliar
        }
        return $retorno; //Devuelvo el arreglo
    }

    public function obtener($username){
        $resultado = $this->conexion->query("SELECT * FROM usuario WHERE Username='$username'"); // Traigo todas las Usuarios de la base de datos
        $retorno = []; //Arreglo auxiliar
        while($Usuario = $resultado->fetch_object()){ //Voy convirtiendo, uno por uno, los resultados en objetos de la clase stdClass
            $retorno[] = $Usuario; //Agrego los objetos al arreglo auxiliar
        }
        return $retorno; //Devuelvo el arreglo
    }
}
?>