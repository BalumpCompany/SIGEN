<?php
$server = "localhost";
$usuario = "root";
$contrasena = "";
$nombrebd = "heracles_bd";
$conexion = new mysqli($server, $usuario, $contrasena, $nombrebd);
if ($conexion->connect_error) {
    die("Falló la conexión " . $conexion->connect_error);
} else {
    if ($_GET["opcion"] == "login") {
        header("location:login.html");
    } else {
        header("location:registro.html");
    }
    exit();
}

?>