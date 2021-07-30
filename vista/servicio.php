<!DOCTYPE html>
<html lang="es">
<head>
<?php include '../vista/Componentes/head.php' ?>
<link rel="stylesheet" type="text/css" href="../vista/servicio.css">

</head>
<body>
<?php include '../vista/Componentes/header.php' ?>
    <div class="contenidocentral">
     <?php include '../vista/Componentes/navegador.php' ?>
        <div class="contenido">
            <p class="tituloS">Servicios</p>
            <div class="menu">
                <nav class="navbar navbar-expand justify-content-center">
                    <ul class="navbar-nav">
                        <li class="nav-item" style="width: 20%;">
                            <a class="nav-link" id="R">Registrar</a>
                        </li>
                        <li class="nav-item"  style="width: 20%;">
                            <a class="nav-link" id="A" >Actualizar</a>
                        </li>
                        <li class="nav-item"  style="width: 20%;">
                            <a class="nav-link"id="O" >Ocultar</a>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <div id="formulario">
                <div class="divbuscar">
                    <input type="text" class="inputBuscar"  placeholder="Codigo a Actualizar " id="inputBuscar" name="Buscar" >  
                    <button class="btnBuscar btn-dark" id="btnBuscar">Ir</button>
                </div>
               <form class="form-inline" name="frmdatos" id="frmdatos">
                <div class="col">
                    <input type="text" class="form-control"  placeholder="Ingrese Codigo" id="idServicio" name="codigo" >
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Ingrese Nombre" id="nombre" name="nombre">
                </div>   
                <div class="col">
                    <input type="text" class="form-control" placeholder="Ingrese precio" id="precio" name="precio">
                </div> 
                <div class="col">
                    <input type="text" class="form-control" placeholder="Ingrese descripcion" id="descripcion" name="descripcion">
                </div>  
                <div class="col" style="padding-left: 150px;">
                    <button class="botonGA btn-dark" id="btnterminar" name="boton" >Guardar</button>
                </div>
                </form>
            </div>
            <p class="mensaje"></p>
            <div class="Consulta">
                <?php include '../vista/Componentes/tableServicios.php' ?>
            </div>
        </div>
    </div>
    <?php include '../vista/Componentes/footer.php' ?>
    <script type="text/javascript" src="../controlador/cServicio.js">
</script>
</body>

</html>

