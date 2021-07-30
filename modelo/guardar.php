<?php

include ('../modelo/conexion.php');
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $query = "INSERT into tbservicio(servicio,precio, description) VALUES ('$nombre','$precio', '$descripcion')";

    $result = mysqli_query($conexion, $query);
    
    if (!$result) {
    die('Problemas al registrar datos');
    }
  
    echo 'Se guardo con exito';  
  
  
  

?>
