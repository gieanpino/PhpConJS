$(document).ready(function() 
{
    MostrarCitas();
    llenarBarbero();
    llenarServicios();

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
    function llenarServicios(){
        $.ajax({
            type:"POST",
            url:"../modelo/MostrarServicios.php",
            success: function(response)
           {
               
                $('.selector-Servicio select').html(response).fadeIn();
           }
    });
    }
    function MostrarCitas(){
        $.ajax({
            url:'../modelo/llenarCitas.php',
            type:'POST',
            beforeSend: function () {
                console.log("Entro y envio los datos");
            },
            success: function(response) {
                const citas = JSON.parse(response);
                let template = '';
                console.log(citas);
                citas.forEach(cita => {
                template += 
                    `
                        <tr cServiciosid="${citas.id}" id="${cita.codigo}">
                            <td class="contenidot" ">
                                ${cita.codigo}
                            </td>
                            <td class="contenidot">
                                <a href="#" class="task-item">
                                ${cita.fecha} 
                                </a>
                            </td>
                            <td class="contenidot">
                                ${cita.barbero}
                            </td>
                            <td class="contenidot">
                                ${cita.servicio}
                            </td>
                            <td class="contenidot">
                                <button class="servicio-delete btn btn-danger" >
                                X
                                </button>
                            </td>
                            <td class="contenidot">
                                <button class="Terminar btn btn-success" >
                                Ok
                                </button>
                            </td>
                        </tr>
                    `
                });
                $('#cCitas').html(template);
            }
            
        });
    } 
    function  clickaction(dato){
    
        switch(dato){
                case "A":
                    document.getElementById('formulario').style.display='block';
                    document.getElementById('formulario').style.display='block';
                    document.getElementById('inputBuscar').style.display='none';
                    document.getElementById('btnCita').style.display='none';
                    document.getElementById('formulario').style.background='#144a93';
                    document.getElementById('btnterminar').textContent='Registrar';
                    document.getElementById('btnterminar').value="Registrar";
                   // document.getElementById('idServicio').disabled=true;
                break;
                case "C":
                    document.getElementById('formulario').style.display='block';
                    document.getElementById('inputBuscar').style.display='block';
                    document.getElementById('btnCita').style.display='block';
                    //document.getElementById('idcita').disabled=true;
                    document.getElementById('formulario').style.background='#138D75';
                    document.getElementById('btnterminar').textContent='Actualizar'; 
                    document.getElementById('btnterminar').value='Actualizar';
                    //document.getElementById('idServicio').disabled=true;
    
                break;
                case "O":
                    document.getElementById('formulario').style.display='none';
                
                break;
                
                
    
            }
        
    }
    function llenarFormulario(id){
        $.post('../modelo/bIndividualCita.php', {id}, (response) => {
            let servicio = JSON.parse(response);
            for(let item of servicio){
                $('#servicio').val(item.servicio);
                $('#fReserva').val(item.fecha);
                $('#Estado').val(item.estado);
                $('#barbero').val(item.nombre);
                
             }
             //document.getElementById('documento').disabled=true; 
          });
    }
    function guardar(){
        var postdata={
            servicio:$('#servicio').val(),
            Estado:$('#Estado').val(),
            fecha:$('#fReserva').val(),
            barbero:$('#barbero').val(),
        }
        $.post('../modelo/guardarcita.php',postdata , (response) => {
        $('#formulario').trigger('reset');
        MostrarCitas();
        });
    }
    function Actualizar(){
        var postdata={
            id:$('#inputBuscar').val(),
            servicio:$('#servicio').val(),
            Estado:$('#Estado').val(),
            fecha:$('#fReserva').val(),
            barbero:$('#barbero').val(),
        }
        $.post('../modelo/ActualizarCita.php',postdata , (response) => {
        $('#formulario').trigger('reset');
        MostrarCitas();
        });
    }
    $(document).on('click', '.servicio-delete', (e) => {
        if(confirm('desea eliminar este servicio?')) {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('id');
        $.post('../modelo/eliminarCita.php', {id}, (response) => {
            MostrarCitas();
        });
        }
    });
    function validarServicio(id,dato){
        var postdata={
        servicio: dato,
        idcita:id
        }
        $.post('../modelo/finalizarReserva.php', postdata, (response) => {
        MostrarCitas();
        });
    }
    $(document).on('click', '.Terminar', (e) => {
       if(confirm('desea Finalizar o cerrar la cita?')) {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('id');
        var dato='';
        $.ajax({
            url: '../modelo/buscarServicio.php',
            data:{cita:id},
            type: 'POST',
            success: function(response) {
            const servicio= JSON.parse(response);
            servicio.forEach(valor => {
                dato= valor.idServicio;
                validarServicio(id,dato);
            });
             }
        });
    }   
    });

    $(document).on('click', '.nav-link', (e) => {
        const id = e.target.getAttribute("id");
        clickaction(id);
    });
    $(document).on('click', '.botonGA', (e) => {
        const value = e.target.textContent;
        e.preventDefault();
         if(value=="Registrar"){
            guardar();
         }else{
            Actualizar(); 
         }
        
    });
    $(document).on('click', '.btnCita', (e) => {
        const id = document.querySelector('#inputBuscar').value;
        llenarFormulario(id);
        e.preventDefault();
    });
});