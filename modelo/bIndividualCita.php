<?php

include ('../modelo/conexion.php');

$id=$_POST['id'];

$sql= "SELECT * FROM tbcita WHERE idcita={$id}";
$resultado=mysqli_query($conexion,$sql);
if(!$resultado){
  echo ($sql.'error para el id '.$id);
}
$json=array();

 while($row = mysqli_fetch_array($resultado))
     {
    $json[]=array(
        'servicio' => $row['servicio'],
        'nombre' => $row['idBarbero'],
        'fecha' => $row['fechaReserva'],
        'estado' => $row['Estado'],
        
    );
    }


$jsontexto=json_encode($json);
echo $jsontexto;

?>