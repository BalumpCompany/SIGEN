<?php
require '../Datos/SeleccionadorRepo.php';

$repo=new SeleccionadorRepo();

$repo->seleccionar($_POST["nro"],$_POST["deporte"],$_POST["user"]);
header("Location:../Presentacion/seleccionarClientes.php?user=".$_POST["user"]);
exit();
?>