<?php
$server = "localhost";
$usuario = "root";
$contrasena = "";
$nombreBDUsuario = "heracles_bd";
$conexionBDUsuario = new mysqli($server, $usuario, $contrasena, $nombreBDUsuario);
if ($conexionBDUsuario->connect_error) {
    die("Falló la conexión " . $conexionBDUsuario->connect_error);
}
?>