
$(document).ready(function() {
   /* ACA VEMOS SI ENTRAMOS O NO AL PANEL DE CONTROL!!!!!!*/ 
   $("#btn-login").click(function() {
      
        var usuario = $("#inputEmail").val();
        var continuar = true;  
        if (usuario.length <=0){
            $("#divUsuario").fadeToggle(2000); 
            $("#divUsuario").text('Debe ingresar un usuario') ;
            $("#divUsuario").css("color", "red");
            continuar=false;
            return false;
        }
        if (usuario.length <=0){
        $("#divPass").fadeToggle(2000); 
        $("#divPass").text('Debe ingresar una mail') ;
        $("#divPass").css("color", "red");
        continuar=false;
        return false; 
       }
    
          
    if (continuar == true){
        var datos = new FormData();
        
        datos.append("mail",usuario);
        
           $.ajax({
               url:"ajax/ajaxrecuperoPass.php",
                method:"POST",
                data:datos,
                cache:false,
                contentType:false,
                processData :false,
                success:function(respuesta){

                if(respuesta.length == 0) {
                    $("#divPass").fadeToggle(2000); 
                    $("#divPass").text(respuesta) ;
                    $("#divPass").css("color", "red");  
                    } 
                else {
                        window.location.href= respuesta;
                 }
               }         
        });
    }  
  });
});
