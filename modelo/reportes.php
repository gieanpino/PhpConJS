<?php
include ('../modelo/conexion.php');
$idBarbero = $_POST['id'];
$fInicio = $_POST['fInicio'];
$fInicio = date("Y-m-d", strtotime($fInicio));
$fFin = $_POST['fFin'];
$fFin= date("Y-m-d", strtotime($fFin));
$query = "SELECT s.Servicio,s.precio,h.fechaFinalizacion,c.idBarbero,c.idCita,u.nombreUsuario FROM tbhistorial as h INNER join tbcita as c on h.idCita=c.idCita INNER join tbusuario as u on c.idBarbero=u.Documento INNER join tbservicio as s on c.servicio=s.idServicio WHERE c.idBarbero=$idBarbero and h.fechaFinalizacion >= '$fInicio' and h.fechaFinalizacion <= '$fFin' and c.Estado='Finalizada'";
$result = mysqli_query($conexion, $query);
if(!$result){
    echo ('error al realizar la consulta '.$query);
  }
$json=array();
while($row = mysqli_fetch_array($result))
{
    $json[]=array(
        'codigo' => $row['idCita'],
        'nombre' => $row['nombreUsuario'],
        'Fecha' => $row['fechaFinalizacion'],
        'servicio' => $row['Servicio'],
        'precio' => $row['precio']
    );
}
$jsontexto=json_encode($json);
echo $jsontexto;
 
?>