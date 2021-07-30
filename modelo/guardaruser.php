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
    
    $query = "INSERT into tbusuario(tipodocumento,Documento,nombreUsuario,genero,telefono,correo,Rol,usuario,clave)
     VALUES ('$tipoDocumento','$documento','$nombre','$genero','$telefono','$correo','$rol','$usuario','$clave')";

    $result = mysqli_query($conexion, $query);
    
    if (!$result) {
    die('Problemas al registrar datos');
    }
  
    echo 'Se guardo con exito';  
  
  
  

?>
