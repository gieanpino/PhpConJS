<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include '../vista/Componentes/head.php'?>
<link rel="stylesheet" type="text/css" href="../vista/indexb.css">
</head>

<body>
<?php include '../vista/Componentes/header.php'?>
    <div class="contenidocentral">
       <div class="contenido">
            <h1>Welcome to </h1>
            <h1 class="welcome">Barber Urban</h1>
            <form class="was-validated">
                <div class="form-group">
                    <label for="uname">Username:</label>
                    <input type="text" class="form-control" id="user" placeholder="Enter username" name="uname" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="clave" placeholder="Enter password" name="pswd" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <button id="iniciar" class="btn btn-dark">Iniciar Sesion</button>
                </div>
                
            </form>
           

        </div>   
    </div>
    <?php include '../vista/Componentes/footer.php' ?>
<script type="text/javascript" src="../controlador/inicioSesion.js"></script>
</body>
</html>