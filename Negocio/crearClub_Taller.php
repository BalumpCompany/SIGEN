<?php
require '../Datos/Club_Taller.php';
require '../Datos/Club_TallerRepo.php';

$numero = NULL;
$club_taller = $_POST["club_taller"];
$nombre = $_POST["nombre"];

$clubTaller = new Club_Taller($numero, $club_taller, $nombre);    
$clubTallerRepo = new Club_TallerRepo();
$clubTallerRepo->guardar($clubTaller);

header("Location: ../Presentacion/crearClub_Taller.php?user=".$_POST["user"]);
exit();
?>