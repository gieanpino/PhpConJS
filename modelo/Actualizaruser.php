<?php

include ('../modelo/conexion.php');
    $tipoDocumento = $_POST['TipoDocumento'];
    $documento= $_POST['documento'];
    $nombre= $_POST['nombre'];
    $genero= $_POST['genero'];
    $telefono= $_POST['telefono'];
    $correo= $_POST['correo'];
    $rol= $_POST['rol'];
    $usuario= $_POST['usuario'];
    $clave= $_POST['clave'];
    
    $query = "UPDATE  tbusuario SET tipodocumento='$tipoDocumento',nombreUsuario='$nombre',genero='$genero',telefono='$genero',correo='$correo',Rol='$rol',usuario='$usuario',clave='$clave' WHERE $documento=Documento";

    $result = mysqli_query($conexion, $query);
    
    if (!$result) {
    die('Problemas al registrar datos'.$query);
    }
  
    echo 'Se Actualizo con exito';  
  
  
  

?>
