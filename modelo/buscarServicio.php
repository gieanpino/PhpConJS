<?php
include ('../modelo/conexion.php');
$id = $_POST['cita'];
$query = "SELECT servicio from tbcita where idcita=$id";
$result = mysqli_query($conexion, $query);
if(!$result){
    echo ('error al realizar la consulta '.$query);
  }
$json=array();
while($row = mysqli_fetch_array($result))
{
    $json[]=array(
        'idServicio' => $row['servicio'],
    );
}
$jsontexto=json_encode($json);
echo $jsontexto;
 
?> 