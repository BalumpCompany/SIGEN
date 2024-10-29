<?php
require '../Datos/CronogramaRepo.php';
require '../Datos/SucursalRepo.php';
session_start();
if($_SESSION["logueado"]==true && $_SESSION["rol"]=="Coach"){
    $cronogramaRepo=new CronogramaRepo();
    $cronogramas=$cronogramaRepo->obtenerTodos();
    $sucursalRepo=new SucursalRepo();
    $sucursales=$sucursalRepo->obtenerTodos();
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
        <a href="modificarRutina.php?user=<?php echo $_GET["user"]; ?>"><p>Modificar rutina</p></a>
        <a href="verClientes.php?user=<?php echo $_GET["user"]; ?>"><p>Ver clientes asignados</p></a>
        <a href="agruparEjercicios.php?user=<?php echo $_GET["user"]; ?>"><p>Agrupar ejercicios</p></a>
        <a href="modificarMinimos.php?user=<?php echo $_GET["user"]; ?>"><p>Modificar mínimos</p></a>
        <a href="seleccionarHorarioTrabajo.php?user=<?php echo $_GET["user"]; ?>"><p id="opcionActual">Seleccionar horario</p></a>
        <a href="seleccionarSedeCoach.php?user=<?php echo $_GET["user"]; ?>"><p>Seleccionar sede</p></a>
    </div>
    <div id="contenidoPrincipal">
        <h1>Selección horario a trabajar</h1>
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
                    if($cronogramaRepo->verificarDispCoach($cronograma->Id_Cronograma,$_GET["user"])){
                        echo "<td><a href='../Negocio/trabajaHorario.php?id=".$cronograma->Id_Cronograma."&user=".$_GET["user"]."'>".$cronograma->Inicio."-".$cronograma->Fin."</td>";
                    }else{
                        echo "<td style='background-color:grey;'><a style='pointer-events:none;' href='../Negocio/trabajaHorario.php?id=".$cronograma->Id_Cronograma."&user=".$_GET["user"]."'>".$cronograma->Inicio."-".$cronograma->Fin."</td>";
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