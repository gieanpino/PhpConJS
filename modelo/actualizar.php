<?php

include ('../modelo/conexion.php');
    $id = $_POST['id'];
    $nombre=$_POST['nombre'];
    $precio=$_POST['precio'];
    $descripcion=$_POST['descripcion'];
    $sql= "UPDATE tbservicio SET Servicio='{$nombre}',precio='{$precio}',description='{$descripcion}' WHERE idServicio={$id}";
    $resultado=mysqli_query($conexion,$sql);
    if(!$resultado){
      echo ('error al realizar la consulta');
    }
    $json=array();
    while($row = mysqli_fetch_array($resultado))
         {
        $json[]=array(
            'codigo' => $row['idServicio'],
            'nombre' => $row['Servicio'],
            'precio' => $row['precio'],
            'descripcion' => $row['description']
        );
        }
    
    
    $jsontexto=json_encode($json);
    echo $jsontexto;
  
  

?>