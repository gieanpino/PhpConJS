<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include '../vista/Componentes/head.php'?>
<link rel="stylesheet" type="text/css" href="../vista/inicio.css">
</head>    
<body>
    <?php include '../vista/Componentes/header.php' ?>
    <div class="contenidocentral">
    <?php include '../vista/Componentes/Navegador.php' ?>
        <div class="contenido">
            <h1>Empecemos</h1>
            <div class="menu">
                <div class="info col">
                <img src="../recursos/barbershop.png" class="imagenes">
                <button type="button" class="btn btn-dark"><a class="nav-link" href="../vista/servicio.php">Servicio</a></button>
                </div>
                <div class="info col">
                <img src="../recursos/calendar.png" class="imagenes">
                <button type="button" class="btn btn-dark"><a class="nav-link" href="../vista/citas.php">Citas</a></button>
                </div>
            </div>
            <div class="menu">
                <div class="otro col" >
                    <img src="../recursos/folder.png" class="imagenes" >
                    <button type="button" id="otro" class="btn btn-dark"><a class="nav-link" href="../vista/reportes.php">Reportes</a></button>    
                </div>
            </div>
        </div>
    </div>
    <?php include '../vista/Componentes/footer.php' ?>
</body>
</html>