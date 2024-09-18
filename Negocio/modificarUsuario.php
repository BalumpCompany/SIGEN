<?php
require '../Datos/Usuario.php';
require '../Datos/UsuarioRepo.php';

$username=$_POST["username"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$mail = $_POST["mail"];
$contrasena = $_POST["contrasena"];
$rol = $_POST["rol"];


$usuario = new Usuario($username, $nombre, $apellido, $mail, $contrasena, $rol);
$repo = new UsuarioRepo();
$repo->modificar($usuario);

header("Location: ../Presentacion/modificarUsuarios.php?user=".$_POST["user"]);
exit();
?>