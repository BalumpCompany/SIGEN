<?php
require '../Datos/EntrenadorRepo.php';

$repo=new EntrenadorRepo();
$repo->trabaja($_GET["id"],$_GET["user"]);
header("Location:../Presentacion/seleccHorarioTrabajo.php?user=".$_GET['user']);
exit();
?>