$(document).ready(function () {
    Mostrarusuarios();

    function Mostrarusuarios() {
        $.ajax({
            url: '../modelo/llenarUsuarios.php',
            type: 'POST',
            beforeSend: function () {
                console.log("Entro y envio los datos");
            },
            success: function (response) {
                const usuarios = JSON.parse(response);
                let template = '';
                usuarios.forEach(usuario => {
                    template +=
                        `
                        <tr id="${usuario.Documento}">
                            <td class="contenidot" ">
                                ${usuario.TipoDocumento}
                            </td>
                            <td class="contenidot">
                                ${usuario.Documento} 
                            </td>
                            <td class="contenidod">
                                 ${usuario.nombre}
                            </td>
                            <td class="contenidot">
                                ${usuario.Genero}
                            </td>
                            <td class="contenidot">
                                ${usuario.Telefono}
                            </td>
                            <td class="contenidod">
                                ${usuario.correo}
                            </td>
                            <td class="contenidot">
                                ${usuario.rol}
                            </td>
                            <td class="contenidot">
                                <button class="servicio-delete btn btn-danger" >
                                x
                                </button>
                            </td>
                        </tr>
                    `
                });
                $('#cUsuario').html(template);
            }

        });
    }
   function  clickaction(dato){
    
        switch(dato){
                case "R":
                    document.getElementById('formulario').style.display='block';
                    document.getElementById('buscaruser').style.display='none';
                    document.getElementById('btnBuscar').style.display='none';
                    document.getElementById('formulario').style.background='#144a93';
                    document.getElementById('btnterminar').textContent='Registrar';
                    document.getElementById('btnterminar').value="Registrar";
                    document.getElementById('idServicio').disabled=true;
                break;
                case "A":
                    document.getElementById('formulario').style.display='block';
                    document.getElementById('buscaruser').style.display='block';
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
    function guardar(){
        var postdata={
            TipoDocumento:ValidarDocumento($('#tipoDocumento').val()),
            documento:$('#documento').val(),
            nombre:$('#nombre').val(),
            genero:$('#genero').val(),
            telefono:$('#telefono').val(),
            correo:$('#correo').val(),
            rol:$('#rol').val(),
            usuario:$('#usuario').val(),
            clave:$('#clave').val()
        }
         $.post('../modelo/guardaruser.php',postdata , (response) => {
        $('#formularioUser').trigger('reset');
        Mostrarusuarios();
        
        });
    }
    function Actualizar(){
        var postdata={
            TipoDocumento:ValidarDocumento($('#tipoDocumento').val()),
            documento:$('#documento').val(),
            nombre:$('#nombre').val(),
            genero:$('#genero').val(),
            telefono:$('#telefono').val(),
            correo:$('#correo').val(),
            rol:$('#rol').val(),
            usuario:$('#usuario').val(),
            clave:$('#clave').val()
        }
        $.post('../modelo/Actualizaruser.php',postdata , (response) => {
        $('#formularioUser').trigger('reset');
        Mostrarusuarios();
        
        });
    }
    function ValidarDocumento(valor){
        switch(valor){
            case "1":
                return "Cedula Cuidadania";
            case "2":
                return "Cedula Extranjeria";
            case "3":
                return "RUT";
            case "4":
                return "NIT";
        
            case "Cedula Cuidadania":
                return "1";
            case "Cedula Extranjeria":
                return "2";
            case "RUT":
                return "3";
            case "NIT":
                return "4";
        }  
    }
    function llenarFormulario(id){
        
        $.post('../modelo/bindividualusuario.php', {id}, (response) => {
            let servicio = JSON.parse(response);
            var td;
            for(let item of servicio){
                td=ValidarDocumento(item.TipoDocumento);
                $('#tipoDocumento').val(td);
                $('#documento').val(item.Documento);
                $('#nombre').val(item.nombre);
                $('#genero').val(item.Genero);
                $('#telefono').val(item.Telefono);
                $('#correo').val(item.correo);
                $('#rol').val(item.rol);
                $('#usuario').val(item.usuario);
                $('#clave').val(item.clave);
             }
             document.getElementById('documento').disabled=true; 
          });
        
    }
    $('form').on('submit', function(e){
        if(!valid) {
          e.preventDefault();
        }
      });
    $(document).on('click', '.nav-link', (e) => {
        const id = e.target.getAttribute('id');
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
    $(document).on('click', '.servicio-delete', (e) => {
        if(confirm('desea eliminar este servicio?')) {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('id');
        $.post('../modelo/eliminarUsuario.php', {id}, (response) => {
            Mostrarusuarios();
        });
        }
    });
    $(document).on('click', '.btnDocumento', (e) => {
        const id = document.querySelector('#buscaruser').value;
        llenarFormulario(id);
        e.preventDefault();
        
    });
    
});