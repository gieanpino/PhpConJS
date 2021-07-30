<?php

include ('../modelo/conexion.php');

$id=$_POST['id'];

$sql= "select * from tbservicio where idservicio = {$id}";

$resultado=mysqli_query($conexion,$sql);
if(!$resultado){
  echo ($sql.'aqui angie'.$id);
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