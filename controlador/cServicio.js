$(document).ready(function() 
{
    MostrarServicios();

    function  clickaction(dato){
    
    switch(dato){
            case "R":
                document.getElementById('formulario').style.display='block';
                document.getElementById('inputBuscar').style.display='none';
                document.getElementById('btnBuscar').style.display='none';
                document.getElementById('formulario').style.background='#144a93';
                document.getElementById('btnterminar').textContent='Registrar';
                document.getElementById('btnterminar').value="Registrar";
                document.getElementById('idServicio').disabled=true;
            break;
            case "A":
                document.getElementById('formulario').style.display='block';
                document.getElementById('inputBuscar').style.display='block';
                document.getElementById('btnBuscar').style.display='block';
                document.getElementById('formulario').style.background='#138D75';
                document.getElementById('btnterminar').textContent='Actualizar'; 
                document.getElementById('btnterminar').value='Actualizar';
                document.getElementById('idServicio').disabled=true;

            break;
            case "O":
                document.getElementById('formulario').style.display='none';
            
            break;
        }
    
    }
    
    function llenarFormulario(id){
        $.post('../modelo/bindividual.php', {id}, (response) => {
            let servicio = JSON.parse(response);
            for(let item of servicio){
                $('#idServicio').val(item.codigo);
                $('#nombre').val(item.nombre);
                $('#precio').val(item.precio);
                $('#descripcion').val(item.descripcion);
             }
          });
          e.preventDefault();
            
        
        
    }
    function guardar(){
        var postdata={
            nombre:$('#nombre').val(),
            precio:$('#precio').val(),
            descripcion:$('#descripcion').val()
        }
         $.post('../modelo/guardar.php',postdata , (response) => {
        $('#formulario').trigger('reset');
        MostrarServicios();
        
        });
    }
    function MostrarServicios(){
        $.ajax({
            url:'../modelo/llenarServicios.php',
            type:'POST',
            beforeSend: function () {
                console.log("Entro y envio los datos");
            },
            success: function(response) {
                const servicios = JSON.parse(response);
                let template = '';
                servicios.forEach(servicio => {
                template += 
                    `
                        <tr cServiciosid="${cServicios.id}" id="${servicio.codigo}">
                            <td class="contenidot" ">
                                ${servicio.codigo}
                            </td>
                            <td class="contenidot">
                                <a href="#" class="task-item">
                                ${servicio.nombre} 
                                </a>
                            </td>
                            <td class="contenidot">
                                ${servicio.precio}
                            </td>
                            <td class="contenidod">
                                ${servicio.descripcion}
                            </td>
                            <td class="contenidot">
                                <button class="servicio-delete btn btn-danger" >
                                x
                                </button>
                            </td>
                        </tr>
                    `
                });
                $('#cServicios').html(template);
            }
            
        });
    }
    function actualizar(){
        var postdata={
            id:$('#idServicio').val(),
            nombre:$('#nombre').val(),
            precio:$('#precio').val(),
            descripcion:$('#descripcion').val()
        }
         $.post('../modelo/actualizar.php',postdata , (response) => {
        $('#formulario').trigger('reset');
        MostrarServicios();
        
        });
    }
    $(document).on('click', '.servicio-delete', (e) => {
        if(confirm('desea eliminar este servicio?')) {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('id');
        $.post('../modelo/eliminar.php', {id}, (response) => {
            MostrarServicios();
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
            actualizar(); 
         }
        
    });
    $(document).on('click', '.btnBuscar', (e) => {
        const id =  document.querySelector('.inputBuscar').value;
        llenarFormulario(id);
        
        
    });

    
});