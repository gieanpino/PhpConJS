<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include '../vista/Componentes/head.php' ?>
<link rel="stylesheet" type="text/css" href="../vista/citas.css">
</head>

<body>
<?php include '../vista/Componentes/header.php' ?>
    <div class="contenidocentral">
    <?php include '../vista/Componentes/navegador.php' ?>
     <div class="contenido">
     <p class="tituloS">Citas</p>
            <div class="menu">
                <nav class="navbar navbar-expand justify-content-center">
                    <ul class="navbar-nav">
                        <li class="nav-item" style="width: 20%;">
                            <a class="nav-link" id="A">Asignar</a>
                        </li>
                        <li class="nav-item"  style="width: 20%;">
                            <a class="nav-link" id="C" >Cambiar</a>
                        </li>
                        <li class="nav-item"  style="width: 20%;">
                            <a class="nav-link"id="O" >Ocultar</a>
                        </li>
                    </ul>
                </nav>
            </div> 
            <div id="formulario">
                <div class="divbuscar">
                    <input type="text" class="inputBuscar"  placeholder="Codigo cita " id="inputBuscar" name="bCita" >  
                    <button class="btnCita btn-dark" id="btnCita">Ir</button>
                </div>
               <form class="form-inline" name="frmcitas" id="frmcitas">
                    <div  class="selector-Servicio col" >
                        <select id="servicio" class="form-control">
                        </select>
                    </div>
                    <div class="col">
                        <input type="date" class="form-control" placeholder="2021-07-26" id="fReserva" name="fReserva">
                    </div>
                    <div  class="col">
                        <select id="Estado" class="form-control">
                            <option value="Pendiente">Pendiente</option>
                            <!-- <option value="Finalizada">Finalizada</option> -->
                        </select>
                    </div>   
                    <div  class="selector-barbero col" >
                        <select id="barbero" class="form-control">
                        </select>
                    </div> 
                    <div id="botonGA" >
                        <button class="botonGA btn-dark" id="btnterminar" name="boton" >Guardar</button>
                    </div>
                </form>
            </div>
            <div class="Consulta">
                <table class="tablaContenido"  >
                    <thead>   
                        <tr class="contenidop">
                            <td class="contenidot" style="background-color: rgb(26, 26, 26);color:blanchedalmond;">Codigo</td>
                            <td class="contenidot" style="background-color: rgb(26, 26, 26);color:blanchedalmond;">fecha Reserva</td>
                            <td class="contenidot" style="background-color: rgb(26, 26, 26);color:blanchedalmond;">Barbero</td>
                            <td class="contenidot" style="background-color: rgb(26, 26, 26);color:blanchedalmond;">Servicio</td>
                            <td class="contenidot" style="background-color: rgb(26, 26, 26);color:blanchedalmond;">Eliminar</td>
                            <td class="contenidot" style="background-color: rgb(26, 26, 26);color:blanchedalmond;">Finalizada</td>
                         </tr>
                    </thead> 
                    <tbody id=cCitas>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include '../vista/Componentes/footer.php' ?>
    <script type="text/javascript" src="../controlador/cCitas.js"></script>
</body>
</html>

