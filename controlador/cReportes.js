$(document).ready(function() 
{
    var fInicio="",fFin="";
    llenarBarbero();
    function definirfecha(valor){
        fecha=moment();
        switch(valor){
            case"1":
            fInicio= fecha.format("YYYY-MM-DD");
            fFin=fecha.format("YYYY-MM-DD");
            break;
            case"2":
            fInicio=fecha.startOf('month').format("YYYY-MM-DD");
            fFin=fecha.endOf('month').format('YYYY-MM-DD');
            break;
        }

    }
    function llenarBarbero(){
        $.ajax({
            type:"POST",
            url:"../modelo/llenarBarberos.php",
            success: function(response)
           {
               $('.selector-barbero select').html(response).fadeIn();
           }
    });
    }   
    $(document).on('click', '.btnBuscar', (e) => {
        definirfecha($('#tiempo').val());
        var postdata={
            id:$('#barbero').val(),
            fInicio,
            fFin
        }
         $.post(
            '../modelo/reportes.php',
            postdata,
            function(response) {
                const Reportes = JSON.parse(response);
                let template = '';
                let total=0;
                Reportes.forEach(reporte => {
                template += 
                    `
                        <tr cServiciosid="${Reportes.id}" id="${reporte.id}">
                            <td class="contenidot" ">
                                ${reporte.codigo}
                            </td>
                            <td class="contenidot">
                                <a href="#" class="task-item">
                                ${reporte.nombre} 
                                </a>
                            </td>
                            <td class="contenidot">
                                ${reporte.servicio}
                            </td>
                            <td class="contenidot">
                                ${reporte.Fecha}
                            </td>
                            <td class="contenidot">
                                ${reporte.precio}
                            </td>
                        </tr>

                    `
                    total=total + parseInt(reporte.precio);

                });
                $('#total').html(total);
                $('#cReporte').html(template);
            }
        );
    });
});