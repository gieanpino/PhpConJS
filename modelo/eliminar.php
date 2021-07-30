<?php
include ('../modelo/conexion.php');
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM tbservicio WHERE idServicio = $id"; 
    $result = mysqli_query($conexion, $query);
  
    if (!$result) {
      die('Query Failed.');
    }
    echo "Task Deleted Successfully";  
  }
?>