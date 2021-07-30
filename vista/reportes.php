<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include '../vista/Componentes/head.php' ?>
<link rel="stylesheet" type="text/css" href="../vista/reportes.css">
</head>
<body>
<?php include '../vista/Componentes/header.php' ?>
    <div class="contenidocentral">
    <?php include '../vista/Componentes/navegador.php' ?>
        <div class="contenido">
            <h1>Reportes</h1>
            <div id="formulario">
                <div class="divbuscar">
                    <div  class="selector-barbero">
                        <select id="barbero" class="barbero col">
                        </select>
                    </div>
                    <div>
                        <select class="tiempo col" id="tiempo">
                            <option value="1">Reporte Diario</option>
                            <option value="2">Reporte Mensual</option>
                        </select>
                    </div>
                    
                    <button class="btnBuscar" id="btnBuscar" style="background-color: black;color: white; width: 50px; margin-top: 10px;height: 38px;">Ir</button>
                </div>
            </div>
            <p class="mensaje"></p>
            <div class="Consulta">
                <table class="tablaContenido"  >
                    <thead>   
                        <tr class="contenidop">
                            <td class="contenidot" style="background-color: rgb(26, 26, 26);color:blanchedalmond;">Codigo</td>
                            <td class="contenidot" style="background-color: rgb(26, 26, 26);color:blanchedalmond;">Nombre</td>
                            <td class="contenidot" style="background-color: rgb(26, 26, 26);color:blanchedalmond;">Servicio</td>
                            <td class="contenidot" style="background-color: rgb(26, 26, 26);color:blanchedalmond;">Fecha</td>
                            <td class="contenidot" style="background-color: rgb(26, 26, 26);color:blanchedalmond;">Precio</td>
                        </tr>
                    </thead> 
                    <tbody id=cReporte>

                    
                    </tbody>
                    
                </table>
                <div class="divTotal" style="display: flex;">
                   <div class="col">
                       Total es:
                    </div>    
                    <div id="total" class="col">
                       
                    </div>   
                </div>
                     
                   
            </div>
        </div>
    </div>
</body>
<?php include '../vista/Componentes/footer.php' ?>
<script type="text/javascript" src="../controlador/cReportes.js"></script>

</html>

</html>