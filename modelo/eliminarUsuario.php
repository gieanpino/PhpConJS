<?php
include ('../modelo/conexion.php');
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM tbusuario WHERE Documento = $id"; 
    $result = mysqli_query($conexion, $query);
  
    if (!$result) {
      die('Query Failed.');
    }
    echo "Task Deleted Successfully";  
  }
?>