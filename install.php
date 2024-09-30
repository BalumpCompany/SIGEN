<?php
$server = "localhost";
$usuario = "root";
$contrasena = "";
$conexionBD = new mysqli($server, $usuario, $contrasena);
$conexionBD->multi_query(file_get_contents("base.sql"));
$conexionBD->close();
?>
