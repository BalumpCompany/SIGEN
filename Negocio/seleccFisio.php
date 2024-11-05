<?php
include '../Datos/Cliente.php';
include '../Datos/ClienteRepo.php';
$lesion=$_POST["lesion"];
$user=$_POST["user"];
$repoCliente = new ClienteRepo();
$repoCliente->crearFisioterapia($user,$lesion);
header("Location:../Presentacion/seleccionarDepFis.php?user=".$_POST['user']);
exit();
?>