<?php
include '../Datos/Cliente.php';
include '../Datos/ClienteRepo.php';
$deporte=$_POST["deporte"];
$user=$_POST["user"];
$posicion=$_POST["posicion"];
$repoCliente = new ClienteRepo();
$repoCliente->crearDeportista($user,$deporte,$posicion);
header("Location:../Presentacion/seleccionarDepFis.php?user=".$_POST['user']);
exit();
?>