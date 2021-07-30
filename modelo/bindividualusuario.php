<?php

include ('../modelo/conexion.php');

$id=$_POST['id'];

$sql= "select * from tbusuario where Documento = {$id}";
$resultado=mysqli_query($conexion,$sql);
if(!$resultado){
  echo ($sql.'error para el id '.$id);
}
$json=array();

 while($row = mysqli_fetch_array($resultado))
     {
    $json[]=array(
        'TipoDocumento' => $row['tipodocumento'],
        'Documento' => $row['Documento'],
        'Genero' => $row['genero'],
        'Telefono' => $row['telefono'],
        'correo' => $row['correo'],
        'rol' => $row['Rol'],
        'nombre' => $row['nombreUsuario'],
        'usuario' => $row['usuario'],
        'clave' => $row['clave']
    );
    }


$jsontexto=json_encode($json);
echo $jsontexto;

?>