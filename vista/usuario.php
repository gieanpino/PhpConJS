<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include '../vista/Componentes/head.php' ?>
<link rel="stylesheet" type="text/css" href="../vista/usuario.css">
</head>

<body>
<?php include '../vista/Componentes/header.php' ?>
    <div class="contenidocentral">
        <?php include '../vista/Componentes/navegador.php' ?>
        <div class="contenido">
            <p class="tituloS">usuario</p>
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
                            <a class="nav-link" id="O" >Ocultar</a>
                        </li>
                    </ul>
                </nav>
            </div> 
            <div id="formulario">
                        <div class="row" style="margin: 10px;">
                            <input type="text" class="form-control" id="buscaruser" placeholder="ingrese Documento" name="Documento">
                            <button class="btnDocumento" id="btnBuscar">Ir</button>
                        </div>
                <form id="formularioUser" style="padding-right:60px ;">
                    <div class="row" style="margin: 10px;">
                        <select id="tipoDocumento" class="select">
                            <option>Tipo Documento</option>
                            <option value="Cedula Cuidadania">Cedula Cuidadania</option>
                            <option value="Cedula Extranjeria">Cedula Extranjeria</option>
                            <option value="RUT">RUT</option>
                            <option value="NIT">NIT</option>
                        </select>   
                    </div>
                    <div class="row" style="margin: 10px;">
                        <input type="text" class="form-control"  placeholder="ingrese Documento" id="documento" name="documento" >
                    </div>
                    <div class="row" style="margin: 10px;">
                        <input type="text" class="form-control"  placeholder=" ingrese nombre" id="nombre" name="nombre" >
                    </div>
                    <div class="row" style="margin: 10px;">
                        <select class="select" id="genero">
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                        </select>
                    </div>
                    <div class="row" style="margin: 10px;">
                        <input type="text" class="form-control"  placeholder="telefono" id="telefono" name="telefono" >
                    </div>
                    <div class="row" style="margin: 10px;">
                        <input type="text" class="form-control"  placeholder=" ingrese correo" id="correo" name="correo" >
                    </div>
                    <div class="row" style="margin: 10px;">
                        <select class="select" id="rol">
                            <option value="Administrador">Administrador</option>
                            <option value="Empleado">Empleado</option>
                        </select>
                    </div>
                    <div class="row" style="margin: 10px;">
                        <input type="text" class="form-control"  placeholder="ingrese usuario" id="usuario" name="usuario" >
                    </div>
                    <div class="row" style="margin: 10px;">
                        <input type="text" class="form-control" placeholder="ingrese Clave" id="clave" name="clave">
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
                            <td class="contenidot" style="background-color: rgb(26, 26, 26);color:blanchedalmond;">Tipo Documento</td>
                            <td class="contenidot" style="background-color: rgb(26, 26, 26);color:blanchedalmond;">Documento</td>
                            <td class="contenidot" style="background-color: rgb(26, 26, 26);color:blanchedalmond;">Nombre</td>
                            <td class="contenidot" style="background-color: rgb(26, 26, 26);color:blanchedalmond;">Genero</td>
                            <td class="contenidot" style="background-color: rgb(26, 26, 26);color:blanchedalmond;">Telefono</td>
                            <td class="contenidot" style="background-color: rgb(26, 26, 26);color:blanchedalmond;">Correo</td>
                            <td class="contenidot" style="background-color: rgb(26, 26, 26);color:blanchedalmond;">Rol</td>
                            <td class="contenidot" style="background-color: rgb(26, 26, 26);color:blanchedalmond;">Eliminar</td>
                        </tr>
                    </thead> 
                    <tbody id=cUsuario>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
    </div>
    <?php include '../vista/Componentes/footer.php' ?>
    <script type="text/javascript" src="../controlador/cUsuario.js">
    </script>  
</body>

</html>

</html>