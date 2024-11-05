<?php
session_start();
if($_SESSION["rol"]==="Cliente"){
    require '../Datos/ClienteRepo.php';
    $repo=new ClienteRepo();
    $repo->asiste_sede($_POST["user"],$_POST["sucursal"]);
    header("Location:../Presentacion/ventanaCliente.php?user=".$_POST["user"]);
    exit();
}
    require '../Datos/EntrenadorRepo.php';
    $repo=new EntrenadorRepo();
    $repo->trabaja_sede($_POST["user"],$_POST["sucursal"]);
    header("Location:../Presentacion/ventanaCoach.php?user=".$_POST["user"]);
    exit();
?>