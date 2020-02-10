/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 

$(window).on('load', function() {
    $( document ).ready(function() {

     
        LlenarGrilla();        
    });
});

$( document ).ready(function() {
   $(document).on('click', '#Buscar', function(){
      
        LlenarGrilla();   
    })  ;
});


function LlenarGrilla(){
    nombre = $('#user').val();   
  
    var datos = new FormData();
    datos.append("nombre",nombre);
    datos.append("ACTION","llenarGrilla");
    
    $('#cartel').html('<div class="loading"><h7>Aguarde Un momento, por favor...</h7><img src="images/save.gif"  width="50" height="50" alt="loading"/></div>'); 
    $.ajax({
            url:"ajax/ajaxUser.php",
                method:"POST",
                data:datos,
                cache:false,
                contentType:false,
                processData :false,
                success:function(respuesta){
                    //alert(respuesta);
                    var n = respuesta.length;
                    //alert(n);
                    if(n>0) {
                        $('#tablaUsuarios').html(respuesta);
                         //TRADUCCION DE LA GRILLA DE MAESTRO SECTOR!!!
                        $('#idTablaUser').DataTable( {
                                    "language": {
                                        "lengthMenu": "Mostrando _MENU_ registros por página",
                                        "zeroRecords": "Nada para Mostrar",
                                        "info": "Mostrando Pagina _PAGE_ de _PAGES_",
                                        "infoEmpty": "No hay registros disponibles",
                                        "search":"Buscar",
                                        "paginate": {
                                        "first":      "Primero",
                                        "last":       "Ultimo",
                                        "next":       "Siguiente",
                                        "previous":   "Anterior"
                                                    },
                                        "infoFiltered": "(Filtrado de _MAX_ total registros),"
                                    }
                                } );
                       
                        $('#cartel').html('');                         
                    }    
                }         
        });
        $('#cartel').html(''); 
}
/* PARA MOSTRAR EL MODIFICAR Y EL ELIMINAR */
    $(document).ready(function(){ 
        $(document).on('click', '.new', function(){
        //aqui lo que quieras que haga
        
       Limpiar();
       Mostrar('INGRESE EL NUEVO USUARIO'); 
       
    });
   
});
/***********************************************************************************************/
/* MUESTRA EL MODAL Y CAMBIA EL TITULO AL H1 */
/***********************************************************************************************/
function  Limpiar(){
    
        $('#txtId').val('0'); 
        $('#nombre').val('');
        $('#mail').val('');
        $('#password').val('');
        $('#rol').val('0');
        
}

function Mostrar($titulo){
    
       $("#panel_wrapper").hide();
       
         
       $("#exampleAccordion").hide();
       $("#sidenavToggler").hide();
       
       
       $("#flotante").css({'background-color':'white',
                            'border-color': 'red',
                             'border-radius':'15px',
                             'box-shadow': '8px 10px 8px #999',
                             'position':'absolute',
                             'top':'100'
                             
                            });
       $("h1").text($titulo);
       $("#flotante").slideDown();
     
}
    $(document).ready(function(){
    
    Cerrar();
});
/***********************************************************************************************/
/* CIERRA EL MODAL Y MUESTRA LA GRILLA*/
/***********************************************************************************************/

function Cerrar(){
    
       $("#exampleAccordion").show();
       $("#sidenavToggler").show();
    
       $("#flotante").hide();
       $("h1").text('MAESTRO DE USUARIOS');
       $("#flotante").slideUp();
       $("#panel_wrapper").slideDown();
       
}   
    $("#Cerrar").click(function() {
       //aqui lo que quieras que haga        .
       Cerrar();
     });  
     

$(document).ready(function() {                 
    
   /* ACA VEMOS SI ENTRAMOS O NO AL PANEL DE CONTROL!!!!!!*/ 
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
});

function guardarUser(){
        
        var id = $("#txtId").val();
        var nombre = $("#nombre").val();
        var mail = $("#mail").val();
        var password = $("#password").val();
        var rol = $("#rol").val();
        var activo = $("#activo").val();
        
        
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

        datos.append("elId",id);
        datos.append("nombre",nombre);        
        datos.append("mail",mail);
        datos.append("password",password);
        datos.append("rol",rol);
        datos.append("activo",activo);
       if (id>0){   
            datos.append("ACTION",'modificar');
        }else{
            datos.append("ACTION",'nuevo');  
        }

        $.ajax({
                url:"ajax/ajaxUser.php",
                method:"POST",
                data:datos,
                cache:false,
                contentType:false,
                processData :false,
                success:function(respuesta){
                   
                    if(respuesta==1){;
        
                        $("#estado").text('SE GUARDARON LOS DATOS') ;
                                $("#estado").css("color", "green");
                                Cerrar();    
                                LlenarGrilla();
                                $("#estado").fadeOut(3000);

                    }
                    else{
                                $("#estado").fadeToggle(2000); 
                                $("#estado").text('SE ENCONTRO UN ERROR')  ;
                                $("#estado").css("color", "red");
                    }    
               }         
        });
}
/***********************************************************************************************/
/* ELIMINAR!! */
/***********************************************************************************************/
$(document).ready(function(){
    $(document).on('click', '.delete', function(){
        var datos = new FormData();
        var matpel = "user-" + $(this).val() ;
        var elemento = document.getElementById(matpel);       
        var id = elemento.dataset.id;       
        var nombre = elemento.dataset.nombre;       
        var password = elemento.dataset.password;       
        var mail = elemento.dataset.mail;
        var rol = elemento.dataset.rol;
        var activo = elemento.dataset.activo;
        
        var continuar = true;
        datos.append("ACTION",'eliminar');
        datos.append("elId",id);
        datos.append("nombre",nombre);        
        datos.append("mail",mail);
        datos.append("password",password);
        datos.append("rol",rol);
        datos.append("activo",activo);

	if (confirm('Esta seguro de eliminar el registro '+ nombre +'?' ) ==true) {
            $.ajax({
                url:"ajax/ajaxUser.php",
                method:"POST",
                data:datos,
                cache:false,
                contentType:false,
                processData :false,
                success:function(respuesta){
                    
                    if(respuesta==1){;
                            $("#estado").text('SE ELIMINO CORRECTAMENTE') ;
                            $("#estado").css("color", "green");
                            Cerrar();    
                            LlenarGrilla();
                            $("#estado").fadeOut(3000);
                         
                    }
                    else{
                            $("#estado").fadeToggle(2000); 
                            alert( respuesta);
                            $("#estado").text('SE ENCONTRO UN ERROR')  ;
                            $("#estado").css("color", "red");
                    }    
               }         
        });
	  
	    return true;

	}else{

	    //alert('Cancelo la eliminacion');

	    return false;

	}


     
    });
});

/***********************************************************************************************/
/* VER EL MODAL PARA MODIFICAR!! */
/***********************************************************************************************/
$(document).ready(function(){
    $(document).on('click', '.edit', function(){
        var datos = new FormData();
        var matpel = "user-" + $(this).val() ;
        var elemento = document.getElementById(matpel);       
        var id = elemento.dataset.id;       
        var nombre = elemento.dataset.nombre;       
        var password = elemento.dataset.password;       
        var mail = elemento.dataset.mail;
        var rol = elemento.dataset.rol;
        var activo = elemento.dataset.activo;
        
        var continuar = true;
      
        datos.append("ACTION",'traerPass');
        datos.append("id",id);

        $("#myModalLabel").text('MODIFICACION EL USUARIO');
        $('#txtId').val(id); 
        $('#nombre').val(nombre);
        $('#mail').val(mail);
        $('#rol').val(rol); 
        
        $.ajax({
                url:"ajax/ajaxUser.php",
                method:"POST",
                data:datos,
                cache:false,
                contentType:false,
                processData :false,
                success:function(respuesta){
                    
                    if(respuesta.length>1){
                        $('#password').val(respuesta);
                     }    
               }         
        });
        Mostrar('MODIFICAR EL USUARIO');
    });
});
