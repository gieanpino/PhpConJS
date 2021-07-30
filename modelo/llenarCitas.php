<?php

include ('../modelo/conexion.php');

$sql= "SELECT c.idCita,c.fechaReserva,u.nombreUsuario,s.Servicio FROM tbcita as c INNER JOIN tbusuario as u on c.idBarbero=u.Documento INNER join tbservicio as s ON  c.servicio=s.idServicio where c.Estado='Pendiente'";
$resultado=mysqli_query($conexion,$sql);
if(!$resultado){
  echo ('error al realizar la consulta');
}
$json=array();

 while($row = mysqli_fetch_array($resultado))
     {
    $json[]=array(
        'codigo' => $row['idCita'],
        'fecha' => $row['fechaReserva'],
        'barbero' => $row['nombreUsuario'],
        'servicio' => $row['Servicio'],

    );
    }


$jsontexto=json_encode($json);
echo $jsontexto;

?>
        
