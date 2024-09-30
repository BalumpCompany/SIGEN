<?php

$archivos = array(
    './ejerciciosEjemplo.sql',
    './usuariosEjemplo.sql'
);


$server = "localhost";
$usuario = "root";
$contrasena = "";
$nombreBDUsuario = "heracles_bd";
$conexionBD = new mysqli($server, $usuario, $contrasena, $nombreBDUsuario);
if ($conexionBD->connect_error) {
    die("Falló la conexión " . $conexionBD->connect_error);
}
$pass=password_hash('Contrasena',PASSWORD_BCRYPT,["cost" => 10]);
echo $pass ."<br>";
echo "INSERT INTO usuario VALUES ('cliente', 'Usuario1', 'Cliente', 'cliente@gmail.com','$pass' , 'Cliente')";
$conexionBD->query("INSERT INTO usuario VALUES ('cliente', 'Usuario1', 'Cliente', 'cliente@gmail.com','$pass' , 'Cliente')");
$conexionBD->query("INSERT INTO usuario VALUES ('admin', 'Usuario2', 'Admin', 'Admin@gmail.com', '$pass', 'Admin')");
$conexionBD->query("INSERT INTO usuario VALUES ('coach', 'Usuario3', 'Coach', 'coach@gmail.com', '$pass', 'Coach')");
$conexionBD->query("INSERT INTO usuario VALUES ('avanzado', 'Usuario4', 'Avanzado', 'avanzado@gmail.com', '$pass', 'Avanzado')");
$conexionBD->query("INSERT INTO usuario VALUES ('seleccionador', 'Usuario5', 'Seleccionador', 'seleccionador@gmail.com', '$pass', 'Seleccionador')");
$conexionBD->query("INSERT INTO usuario VALUES ('adminit', 'Usuario6', 'AdminIT', 'adminIT@gmail.com', '$pass', 'AdminTI')");
$conexionBD->multi_query(file_get_contents("ejerciciosEjemplo.sql"));
$conexionBD->close();
?>