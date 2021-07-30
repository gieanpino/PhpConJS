<?php

include ('../modelo/conexion.php');
    $Estado = $_POST['Estado'];
    $servicio = $_POST['servicio'];
    $fecha = $_POST['fecha'];
    $fecha= date("Y-m-d", strtotime($fecha));
    $Barbero = $_POST['barbero'];
    if($Estado=="Finalizada"){
        $query = "INSERT into tbcita(fechaReserva,idBarbero,Estado,servicio) VALUES ('$fecha','$Barbero', '$Estado','$servicio')";
        $result = mysqli_query($conexion, $query);
        $result2=GuardarHistorial();
     }
    else{
        $query = "INSERT into tbcita(fechaReserva,idBarbero,Estado,servicio) VALUES ('$fecha','$Barbero', '$Estado','$servicio')";
        $result = mysqli_query($conexion, $query);
    }
    function GuardarHistorial(){
    include ('../modelo/conexion.php');
        $idCita=hallaridCita();
        $hoy= $hoy = date("Y-m-d"); 
        $query="INSERT  into tbhistorial(idServicio,idCita,fechaFinalizacion) VALUES ('$servicio','$idCita','$hoy')";
        $result = mysqli_query($conexion, $query);
    } 
    function hallaridCita(){
    include ('../modelo/conexion.php');
       $query="select idCita from tbcita order by idCita desc limit 1";
       $result= mysqli_query($conexion, $query); 
       if(!$result){
        echo ($sql.'error para el id '.$id);
      }
      $json=array();
      
       while($row = mysqli_fetch_array($result))
           {
          $json[]=array(
              'idcita' => $row['idCita']
          );
          }
        return $json['idcita'];
    }
?>
