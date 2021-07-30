<?php

include ('../modelo/conexion.php');

$sql= 'select * from tbusuario';
$resultado=mysqli_query($conexion,$sql);
if(!$resultado){
  echo ('error al realizar la consulta');
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
        'nombre' => $row['nombreUsuario']
    );
    }


$jsontexto=json_encode($json);
echo $jsontexto;

?>
        
