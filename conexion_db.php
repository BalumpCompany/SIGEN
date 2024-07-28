<?php
$server = "localhost";
$usuario = "root";
$contrasena = "";
//$nombreBD = "heracles_bd";
$nombreBDUsuario = "heracles_usuario";
//$_SESSION["conexionBD"] = new mysqli($server, $usuario, $contrasena, $nombreBD);
$conexionBDUsuario = new mysqli($server, $usuario, $contrasena, $nombreBDUsuario);
/*if ($_SESSION["conexionBD"]->connect_error) {
    die("Falló la conexión " . $_SESSION["conexionBD"]->connect_error);
}*/
if ($conexionBDUsuario->connect_error) {
    die("Falló la conexión " . $conexionBDUsuario->connect_error);
}
?>