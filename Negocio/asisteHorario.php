<?php
require '../Datos/ClienteRepo.php';

$repo=new ClienteRepo();
$repo->asiste($_GET["id"],$_GET["user"]);
header("Location:../Presentacion/seleccionarHorario.php");
?>