<?php
include("conexion_db.php");
if($_POST["pass"]===$_POST["pass2"]){
$queryRegistro= "INSERT INTO Usuario VALUES('".$_POST["user"]."','".$_POST["nom"]."','".$_POST["ape"]."','".$_POST["mail"]."','".$_POST["pass"]."','Cliente');";
}else{
    header("Location: ../Presentacion/registro.html");
    exit();
}
$conexionBDUsuario->query($queryRegistro);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro exitoso</title>
</head>
<body style="background-color:black; display:flex; flex-direction:column; align-items:center; width:99vw;">
    <img src="../Presentacion/recursos/logo_registro.jpg" alt="logo" style="width:10vw; margin-bottom:12vw; ">
    <div style="background-color:gray; border-style:none; border-radius:10px; text-align:center; padding:1.4vw; font-family:Arial; font-size:1.2vw;">Se ha registrado con éxito <br><a style="color:#f9e8b2;" href="../Presentacion/login.html">Ir al login</a></div>
</body>
</html>