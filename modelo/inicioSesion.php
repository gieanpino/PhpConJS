<?php
include ('../modelo/conexion.php');
$user = $_POST['user'];
$clave = $_POST['clave'];
$query = "select count(*) as Respuesta from tbusuario where usuario='$user' and clave='$clave' and Rol='Administrador'";
$result = mysqli_query($conexion, $query);
if(!$result){
    echo ($sql.'error al realizar la consulta');
  }
  $json=array();
  
   while($row = mysqli_fetch_array($result))
       {
      $json[]=array(
          'Respuesta' => $row['Respuesta']
      );
      }
  $jsontexto=json_encode($json);
  echo $jsontexto;
?>