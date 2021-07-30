<?php
include ('../modelo/conexion.php');
$sql= 'SELECT * FROM `tbusuario` WHERE Rol="Empleado" ORDER by nombreUsuario';
$resultado=mysqli_query($conexion,$sql);
if(!$resultado){
  echo ('error al realizar la consulta');
}
$json=array();
echo '<option value="0">Seleccionar Barbero</option>';
while (($fila = mysqli_fetch_array($resultado)) != NULL) {
    echo '<option value="'.$fila["Documento"].'">'.$fila["nombreUsuario"].'</option>';
}
$jsontexto=json_encode($json);
echo $jsontexto;

?>