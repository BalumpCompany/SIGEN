<?php
include '../Datos/Cliente.php';
include '../Datos/ClienteRepo.php';
$user=$_POST["user"];
$repo = new ClienteRepo();
$repo->obtenerPuntuacion($user);
header("Location:../Presentacion/verCalificaciones.php?user=".$_POST['user']);
exit();
?>