<?php
require '../Datos/SeleccionadorRepo.php';
$repo=new SeleccionadorRepo();

$repo->armarEquipo($_POST["clientes"],$_POST["id"]);
header("Location:../Presentacion/armarEquipos.php?user=".$_POST["user"]);
exit();
?>