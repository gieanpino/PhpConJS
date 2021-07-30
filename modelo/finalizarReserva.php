<?php
/* */
$id = $_POST['idcita'];
$servicio=$_POST['servicio'];
include ('../modelo/conexion.php');
    
    $query = "UPDATE tbcita set Estado='Finalizada'where idCita=$id";
    $result = mysqli_query($conexion, $query);
    if ($result){
        $respuesta=RegistrarHistorial($servicio,$id);
        if($respuesta){
            echo 'Se guardo con exito'.$respuesta; 
        }
        die($respuesta); 
    }
    die('Problemas al registrar cita'.$query); 

    function RegistrarHistorial($servicio,$id){
        include ('../modelo/conexion.php');
        $hoy = date("Y-m-d"); 
        $query2 = "INSERT into tbhistorial(idServicio,idCita,fechaFinalizacion) VALUES ($servicio,$id, '$hoy')";
        $result = mysqli_query($conexion, $query2);
        if($result){
            return $servicio; 
        }
        die('Problemas al registrar historial'.$query2.$result);
        
    }
   
?>
