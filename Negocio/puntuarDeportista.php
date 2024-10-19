<?php
require '../Datos/EntrenadorRepo.php';

$repo=new EntrenadorRepo();
$repo->puntuar($_POST["nroSocio"],$_POST["cumplimientoO"],$_POST["resAnaerobicaO"],$_POST["fuerzaO"],$_POST["resMuscularO"],$_POST["flexibilidadO"],$_POST["resMonotoniaO"],$_POST["resilenciaO"],$_POST["cumplimientoE"],$_POST["resAnaerobicaE"],$_POST["fuerzaE"],$_POST["resMuscularE"],$_POST["flexibilidadE"],$_POST["resMonotoniaE"],$_POST["resilenciaE"]);
header("Location:../Presentacion/verClientes.php?user=".$_POST['user']);
?>