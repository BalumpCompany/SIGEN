<?php
require '../Datos/CronogramaRepo.php';
session_start();
if($_SESSION["logueado"]==true && $_SESSION["rol"]=="Cliente"){
    $cronogramaRepo=new CronogramaRepo();
    $cronogramas=$cronogramaRepo->obtenerTodos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver ejercicios - <?php echo $_GET["user"]; ?></title>
    <link rel="stylesheet" href="styleVerEjercicios.css">
    <link rel="icon" href="recursos/icono.png">
</head>
<body>
    <nav>
        <a href="index.php"><img src="recursos/header_beige.jpg" alt="Heracles" id="imgNav"></a>
        <form action="../Negocio/cerrarSesion.php" method="post" onsubmit="return confirmacion()"><button id="cerrarSesion">Cerrar sesión</button></form>
    </nav>
    <div id="barraLateral">
        <a href="verEjercicios.php?user=<?php echo $_GET["user"]; ?>"><p>Ver ejercicios</p></a>
        <a href="verCalificaciones.php?user=<?php echo $_GET["user"]; ?>"><p>Ver calificaciones</p></a>
        <a href="seleccionarHorario.php?user=<?php echo $_GET["user"]; ?>"><p id="opcionActual">Seleccionar horario</p></a>
        <a href="seleccionarDepFis.php?user=<?php echo $_GET["user"]; ?>"><p>Seleccionar deporte/fisioterapia</p></a>
    </div>
    <div id="contenidoPrincipal">
        <table>
            <thead>
                <tr>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miércoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                foreach ($cronogramas as $cronograma) {
                    if($i==1){
                        echo "<tr>";
                    }
                    if($i==6){
                        echo "</tr>";
                        $i=1;
                    }
                    if($cronogramaRepo->verificarDispCliente($cronograma->Id_Cronograma)){
                        echo "<td><a href='../Negocio/asisteHorario.php?id=".$cronograma->Id_Cronograma."&user=".$_GET["user"]."'>".$cronograma->Inicio."-".$cronograma->Fin."</td>";    
                    }else{
                        echo "<td style='background-color:grey;'><a style='pointer-events: none;' href='../Negocio/asisteHorario.php?id=".$cronograma->Id_Cronograma."&user=".$_GET["user"]."'>".$cronograma->Inicio."-".$cronograma->Fin."</td>";
                    }
                    
                    $i++;
                }
                ?></a>
            </tbody>
        </table>
    </div>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="confirmacion.js"></script>
</body>
</html>
<?php
}else{
    header("Location:index.php");
    exit();
}
?>