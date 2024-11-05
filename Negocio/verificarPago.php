<?php
require "../Datos/ClienteRepo.php";

$repo=new ClienteRepo();
$repo->verificarPago($_POST["nro"]);

header("Location:../Presentacion/verClientesAdmin.php?user=".$_POST['user']);
exit();
?>