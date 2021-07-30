$(document).ready(function() 
{
    $(document).on('click', '#iniciar', (e) => {
        var datos={
            user:$('#user').val(),
            clave:$('#clave').val()
        }
        IniciarSesion(datos).then(d => {
            if(d==true){
                window.location.href='../vista/inicio.php';
            }
            else{
                confirm('los Datos Son erroneos');
            }
            
        });
        e.preventDefault();
    });   
    function validarUsuarios(datos){
        return new Promise(resolve => {
        setTimeout(() => {
            resolve(
                $.ajax({
                url: '../modelo/inicioSesion.php',
                data:datos,
                type: 'POST',
                success: function(response) {
                    const res=JSON.parse(response);
                    let respuesta = '';
                    res.forEach(r => {
                        respuesta += r.Respuesta;
                    });
                    console.log("Respuesta: ", respuesta);
                    if(respuesta==1){
                        console.log("Entro al true");
                        return true;
                    }else{
                        console.log("Entro al false");
                        return false;
                    }
                }
                })
            );
        },3000);    
    });
    
    }
    async function IniciarSesion(datos){
            const res = JSON.parse(await validarUsuarios(datos));
            let respuesta = '';
            for(let item of res){
               respuesta= item.Respuesta;
            }
            if(respuesta=='1'){
                return true;
            } 
            else{
                return false;
            }
    }
});