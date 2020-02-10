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
    nProducto = $('#nProducto').val();   
    nCas = $('#nCas').val();  
    nombre= $('#nombre').val();  
    var datos = new FormData();
    datos.append("nProducto",nProducto);
    datos.append("nCas",nCas);
    datos.append("nombre",nombre);
    datos.append("ACTION","llenarGrilla");
    
    $('#cartel').html('<div class="loading"><h7>Aguarde Un momento, por favor...</h7><img src="images/save.gif"  width="50" height="50" alt="loading"/></div>'); 
    $.ajax({
            url:"ajax/ajaxMatpel.php",
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
                        $('#Tablamatpel').html(respuesta);
                         //TRADUCCION DE LA GRILLA DE MAESTRO SECTOR!!!
                        $('#idtablaMatpel').DataTable( {
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
                        //$('#idtablaMatpel').DataTable();
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
       Mostrar('INGRESE EL NUEVO MATPEL'); 
       
    });
   
});
/***********************************************************************************************/
/* MUESTRA EL MODAL Y CAMBIA EL TITULO AL H1 */
/***********************************************************************************************/
function  Limpiar(){
    
        $('#txtId').val('0'); 
        $('#txtProducto').val('');
        $('#ncas').val('');
        $('#clase').val('');
        $('#txtNombre').val('');
        $('#observaciones').val('');
        $('#ruta').val('');
        $('#salud').val(0);
        $('#inflamabilidad').val(0);
        $('#reactividad').val(0);
        $('#riesgoEspecial').val(0);
        
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
       $("#flotante").hide();
    
    $("#exampleAccordion").show();
       $("#sidenavToggler").show();
       
    $("h1").text('MAESTRO DE MATPELS');
       $("#flotante").slideUp();
       $("#panel_wrapper").slideDown();
       
}   
    $("#Cerrar").click(function() {
       //aqui lo que quieras que haga        .
       Cerrar();
     });  
     

/***********************************************************************************************/
/*CAMBIO DE COLORES*/
/***********************************************************************************************/
$(document).ready(function(){
   
   $("#bgcolorLetra").on("change",function(){
   
    $("#muestra").css("color",$("#bgcolorLetra").val());
    
    });
    $("#bgcolorFondo").on("change",function(){
        $("#muestra").css("background-color",$("#bgcolorFondo").val());
    
    });
   
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
                                        guardarMatpel();
                                    },
                                cancel: function () {
                                        //$.alert('Canceled!');
                                    }
                            }
        });
    });
});

function guardarMatpel(){
        
        var id = $("#txtId").val();
        var nProducto = $("#txtProducto").val();
        var ncas = $("#ncas").val() ;
        var clase = $("#clase").val();
        var nombre = $("#txtNombre").val();
        var observaciones = $("#observaciones").val();
        var ruta = $("#ruta").val();
        
        var colorLetra = $("#bgcolorLetra").val();
        var colorFondo = $("#bgcolorFondo").val();
        var salud = parseInt($("#salud").val()) ;
        var inflamabilidad = parseInt($("#inflamabilidad").val()) ;
        var reactividad = parseInt($("#reactividad").val()) ;
        var riesgoEspecial = parseInt($("#riesgoEspecial").val()) ;
        var valorTotal = parseInt(salud) + parseInt(inflamabilidad) +  parseInt(reactividad) + parseInt(riesgoEspecial) ;
        var continuar = true;
       
            
        /*
            alert ('id:' + id);
            alert ('nProducto:'+ nProducto );
            alert ('clase:' + clase);
            alert ('nombre:'+ nombre );
            alert ('observaciones:' + observaciones );
            alert ('ruta:'+ruta);

            alert ('colorLetra:'+colorLetra);
            alert ('colorFondo:'+ colorFondo);
            alert ('salud:'+salud) ;
            alert ('inflamabilidad:' + inflamabilidad) ;
            alert ('reactividad:' + reactividad) ;
            alert ('riesgoEspecial:' + riesgoEspecial) ;
        */
    
    
    
    if (nombre.length <=0){
            $("#mensajes").fadeToggle(2000); 
            $("#mensajes").text('Debe ingresar un nombre') ;
            $("#mensajes").css("color", "red");
            continuar=false;
            $("#mensajes").fadeOut();
            return false;
        }
        
        if(nProducto <=0) {
            $("#mensajes").fadeToggle(2000); 
            $("#mensajes").text('Debe ingresar una Nº Producto') ;
            $("#mensajes").css("color", "red");
            $("#mensajes").fadeOut();
            continuar=false;
            return false; 
        }
      
        var datos = new FormData();

        datos.append("elId",id);
        datos.append("nProducto",nProducto);        
        datos.append("ncas",ncas);
        datos.append("clase",clase);
        datos.append("colorLetra",colorLetra);
        datos.append("colorFondo",colorFondo);
        datos.append("nombre",nombre);
        datos.append("observaciones",observaciones);
        datos.append("ruta",ruta);
        datos.append("salud",salud);
        datos.append("inflamabilidad",inflamabilidad);
        datos.append("reactividad",reactividad);
        datos.append("riesgoEspecial",riesgoEspecial);
        datos.append("valorTotal",valorTotal);
        
        if (id>0){   
            datos.append("ACTION",'modificar');
        }else{
            datos.append("ACTION",'nuevo');  
        }

        $.ajax({
                url:"ajax/ajaxMatpel.php",
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
        var matpel = "matpel-" + $(this).val() ;
        var elemento = document.getElementById(matpel);       
        var id = elemento.dataset.id;       
        var nombreProducto =elemento.dataset.nombreproducto;
        
        var id = elemento.dataset.id;
        var nProducto = elemento.dataset.nproducto;
        var ncas = elemento.dataset.ncas;
        var clase = elemento.dataset.clase;
        var nombre = elemento.dataset.nombreproducto;
        var ruta = elemento.dataset.ruta;
        var observaciones = elemento.dataset.observaciones;
        
        var colorLetra = elemento.dataset.colorletra ;
        var colorFondo = elemento.dataset.colorfondo;
        var salud = parseInt(elemento.dataset.salud) ;
        var inflamabilidad = parseInt(elemento.dataset.inflamabilidad) ;
        var reactividad = parseInt(elemento.dataset.reactividad) ;;
        var riesgoEspecial = parseInt(elemento.dataset.riesgoespecial) ;;
        var valorTotal = parseInt(salud) + parseInt(inflamabilidad) +  parseInt(reactividad) + parseInt(riesgoEspecial) ;
        var continuar = true;
        datos.append("ACTION",'eliminar');
        datos.append("elId",id);

        datos.append("nProducto",nProducto);        
        datos.append("ncas",ncas);
        datos.append("clase",clase);
        datos.append("colorLetra",colorLetra);
        datos.append("colorFondo",colorFondo);
        datos.append("nombre",nombre);
        datos.append("observaciones",observaciones);
        datos.append("ruta",ruta);
        datos.append("salud",salud);
        datos.append("inflamabilidad",inflamabilidad);
        datos.append("reactividad",reactividad);
        datos.append("riesgoEspecial",riesgoEspecial);
        datos.append("valorTotal",valorTotal);


	if (confirm('Esta seguro de eliminar el registro '+ nombreProducto +'?' ) ==true) {
            $.ajax({
                url:"ajax/ajaxMatpel.php",
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
        
        var matpel = "matpel-" + $(this).val() ;
        var elemento = document.getElementById(matpel);      
        var id = elemento.dataset.id;
        var nProducto = elemento.dataset.nproducto;
        var ncas = elemento.dataset.ncas;
        var clase = elemento.dataset.clase;
        var nombre = elemento.dataset.nombreproducto;
        var ruta = elemento.dataset.ruta;
        var observaciones = elemento.dataset.observaciones;
        
        var colorLetra = elemento.dataset.colorletra ;
        var colorFondo = elemento.dataset.colorfondo;
        var salud = parseInt(elemento.dataset.salud) ;
        var inflamabilidad = parseInt(elemento.dataset.inflamabilidad) ;
        var reactividad = parseInt(elemento.dataset.reactividad) ;;
        var riesgoEspecial = parseInt(elemento.dataset.riesgoespecial) ;;
        var valorTotal = parseInt(salud) + parseInt(inflamabilidad) +  parseInt(reactividad) + parseInt(riesgoEspecial) ;
        var continuar = true;

        $("#myModalLabel").text('MODIFICACION DE MATPEL');


        $('#txtId').val(id); 
        $('#txtProducto').val(nProducto);
        $('#ncas').val(ncas);
        $('#clase').val(clase);
        $('#txtNombre').val(nombre);
        $('#observaciones').val(observaciones);
        $('#ruta').val(ruta);
        $('#salud').val(salud);
        $('#inflamabilidad').val(inflamabilidad);
        $('#reactividad').val(reactividad);
        $('#riesgoEspecial').val(riesgoEspecial);
        
        $('#bgcolorLetra').val(colorLetra);
        $('#bgcolorFondo').val(colorFondo);
       
        /*CAMBIAMOS LA MUESTRA */
        $("#muestra").css("color",$("#bgcolorLetra").val());
        $("#muestra").css("background-color",$("#bgcolorFondo").val());
        /* */
        
        Mostrar('MODIFICAR EL SECTOR');
      
    });
});
