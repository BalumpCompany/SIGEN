<?php
require "../Datos/EntrenadorRepo.php";
$repo=new EntrenadorRepo();
switch($_POST["dia"]){
    case "Lunes":
        $dia=2;
        break;
    case "Martes":
        $dia=3;
        break;
    case "Miercoles":
        $dia=4;
        break;
    case "Jueves":
        $dia=5;
        break;
    case "Viernes":
        $dia=6;
        break;
}
$repo->modificarRutina($_POST["nro"],$dia,$_POST["ejercicios"]);
header("Location:../Presentacion/verClientes.php?user=".$_POST["user"]);
exit();
?>