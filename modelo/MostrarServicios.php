<?php
include ('../modelo/conexion.php');
$sql= 'SELECT * FROM tbservicio  ORDER by Servicio';
$resultado=mysqli_query($conexion,$sql);
if(!$resultado){
  echo ('error al realizar la consulta');
}
$json=array();
echo '<option value="0">Seleccionar Servicio</option>';
while (($fila = mysqli_fetch_array($resultado)) != NULL) {
    echo '<option value="'.$fila["idServicio"].'">'.$fila["Servicio"].'</option>';
}
$jsontexto=json_encode($json);
echo $jsontexto;

?>