/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    //alert('pase por aca guachin');
    $("body").fadeIn("slow");
    $(".img-responsive").fadeIn("slow");
    /////////////////////////////////////////
    $("body").fadeIn("slow");
    /////////////////////////////////////////

    $("#cmdGuardar").on("click",function(e){
        e.preventDefault();    
        $.confirm({
                    title: 'Guardar datos',
                    content: '¿Guardar datos?',
                    buttons: {
                                Guardar: function () {
                                        guardarUser();
                                    },
                                cancel: function () {
                                        //$.alert('Canceled!');
                                    }
                            }
        });
    });
    /////////////////////////////////////////
    $("#Cerrar").on("click",function(){
         window.location.href= "panel.php?controlador=panel";
    });
});
function guardarUser(){
        
        var id = $("#txtId").val();
        var nombre = $("#nombre").val();
        var password = $("#password").val();
        
        var continuar = true;
        
      
    
    if (nombre.length <=0){
            $("#mensajes").fadeToggle(2000); 
            $("#mensajes").text('Debe ingresar un nombre') ;
            $("#mensajes").css("color", "red");
            continuar=false;
            $("#mensajes").fadeOut();
            return false;
        }
        if (password.length <=0){
            $("#mensajes").fadeToggle(2000); 
            $("#mensajes").text('Debe ingresar un password') ;
            $("#mensajes").css("color", "red");
            continuar=false;
            $("#mensajes").fadeOut();
            return false;
        }
        
        
      
        var datos = new FormData();

        datos.append("id",id);
        datos.append("nombre",nombre);        
        datos.append("password",password);
        /*
        alert ("Id:"+id);
        alert ("nombre:"+nombre);        
        alert ("password:"+password);
        */
        $.ajax({
                url:"ajax/ajaxUserEdit.php",
                method:"POST",
                data:datos,
                cache:false,
                contentType:false,
                processData :false,
                success:function(respuesta){
                    alert (respuesta);
                    if(respuesta==1){;
                        $("#mensajes").text('SE GUARDARON LOS DATOS') ;
                        $("#mensajes").css("color", "green");
                        $("#mensajes").fadeOut(3000);
                        window.location.href= "panel.php?controlador=panel";
                    }
                    else{
                            $("#mensajes").fadeToggle(2000); 
                            $("#mensajes").text('SE ENCONTRO UN ERROR' + respuesta)  ;
                            $("#estamensajesdo").css("color", "red");
                    }    
               }         
        });
}
