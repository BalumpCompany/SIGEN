<?php
require '../Datos/Usuario.php';
require '../Datos/UsuarioRepo.php';

$username=$_POST["username"];

$repo = new UsuarioRepo();
$repo->eliminar($username);


header("Location: ../Presentacion/listaUsuarios.php?user=".$_GET["user"]);
exit();
?>