<?php
require "../Datos/ClienteRepo.php";

$repo=new ClienteRepo();
$repo->activarDesactivar($_POST["nro"]);

header("Location:../Presentacion/verClientesAdmin.php?user=".$_POST['user']);
exit();
?>