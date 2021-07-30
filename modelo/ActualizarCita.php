<?php

include ('../modelo/conexion.php');
    $id = $_POST['id']; 
    $Estado = $_POST['Estado'];
    $servicio = $_POST['servicio'];
    $fecha = $_POST['fecha'];
    $fecha= date("Y-m-d", strtotime($fecha));
    $Barbero = $_POST['barbero'];
    if($Estado=='Finalizada'){
        $query = "UPDATE tbcita set fechaReserva='$fecha',idBarbero='$Barbero',Estado='$Estado',servicio='$servicio'  where idCita=$id";
        $result = mysqli_query($conexion, $query);
        $query = "select idCita from tbcita where idBarbero='$Barbero'and Estado='$Estado' and fechaReserva ='$fecha';";
        $result = mysqli_query($conexion, $query);
        $hoy = date("Y-m-d"); 
        $query = "INSERT into tbhistorial(idServicio,idCita,fechaFinalizacion) VALUES ('$servicio','$result', '$hoy')";
        $result = mysqli_query($conexion, $query);
    }
    else{
        $query = "UPDATE tbcita set fechaReserva='$fecha',idBarbero='$Barbero',Estado='$Estado',servicio='$servicio'  where idCita=$id";
        $result = mysqli_query($conexion, $query);

    }
    
    
    if (!$result) {
    die('Problemas al registrar datos'.$query);
    }
    echo 'Se guardo con exito'.$query;  
?>
