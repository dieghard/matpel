
$(document).ready(function() {
   /* ACA VEMOS SI ENTRAMOS O NO AL PANEL DE CONTROL!!!!!!*/ 
   $("#btn-login").click(function() {
      1
        var usuario = $("#inputEmail").val();
        var password = $("#inputPassword").val();
        var cuartelID = $("#cmbCuartel").val();
    
       var continuar = true;  
        if (usuario.length <=0){
            $("#divUsuario").fadeToggle(2000); 
            $("#divUsuario").text('Debe ingresar un usuario') ;
            $("#divUsuario").css("color", "red");
            continuar=false;
            return false;
        }
        if (cuartelID <=0){
            $("#divUsuario").fadeToggle(2000); 
            $("#divUsuario").text('Debe Seleccionar un cuartel, si no existe contactese a info@bmnp51.com') ;
            $("#divUsuario").css("color", "red");
            continuar=false;
            return false;
        }
    if (password.length <=0){
        $("#divPass").fadeToggle(2000); 
        $("#divPass").text('Debe ingresar una contraseña') ;
        $("#divPass").css("color", "red");
        continuar=false;
        return false;
    }
    
          
    if (continuar == true){
        var datos = new FormData();
        datos.append("usuario",usuario);
        datos.append("password",password);
        datos.append("cuartelID",cuartelID);
        datos.append("tipoVerificacion","ingreso");
    1
           $.ajax({
               url:"vistas/ajax/loguin.php",
                method:"POST",
                data:datos,
                cache:false,
                contentType:false,
                processData :false,
                success:function(respuesta){
                if(respuesta == 0) {
                    $("#divPass").fadeToggle(2000); 
                    $("#divPass").text('Nombre de Usuario con Contraseña Incorrecta') ;
                    $("#divPass").css("color", "red");  
                    } else {
                        window.location.href= respuesta;
                 }
               }         
        });
    }  
  });
});

$( document ).ready(function() {
    // DOM ready

    // Test data
    /*
     * To test the script you should discomment the function
     * testLocalStorageData and refresh the page. The function
     * will load some test data and the loadProfile
     * will do the changes in the UI
     */
    // testLocalStorageData();
    // Load profile if it exits
    loadProfile();
    llenar_combo_Cuarteles();
});
/**
 * Function that gets the data of the profile in case
 * thar it has already saved in localstorage. Only the
 * UI will be update in case that all data is available
 *
 * A not existing key in localstorage return null
 *
 */
function llenar_combo_Cuarteles(){
    var datos = new FormData();
    
    datos.append("ACTION","llenarComboCuarteles");
    $.ajax({
            url:"vistas/ajax/ajaxComboCuarteles.php",
                method:"POST",
                data:datos,
                cache:false,
                contentType:false,
                processData :false,
                success:function(respuesta){
                    var n = respuesta.length;
                    if(n>0) {
                        $('#comboCuarteles').html(respuesta);
                        
                    }    
                }         
        });
}
function getLocalProfile(callback){
    var profileImgSrc      = localStorage.getItem("PROFILE_IMG_SRC");
    var profileName        = localStorage.getItem("PROFILE_NAME");
    var profileReAuthEmail = localStorage.getItem("PROFILE_REAUTH_EMAIL");

    if(profileName !== null
            && profileReAuthEmail !== null
            && profileImgSrc !== null) {
        callback(profileImgSrc, profileName, profileReAuthEmail);
    }
}
/**
 * Main function that load the profile if exists
 * in localstorage
 */
function loadProfile() {
    if(!supportsHTML5Storage()) { return false; }
    // we have to provide to the callback the basic
    // information to set the profile
    getLocalProfile(function(profileImgSrc, profileName, profileReAuthEmail) {
        //changes in the UI
        $("#profile-img").attr("src",profileImgSrc);
        $("#profile-name").html(profileName);
        $("#reauth-email").html(profileReAuthEmail);
        $("#inputEmail").hide();
        $("#remember").hide();
    });
}
/**
 * function that checks if the browser supports HTML5
 * local storage
 *
 * @returns {boolean}
 */
function supportsHTML5Storage() {
    try {
        return 'localStorage' in window && window['localStorage'] !== null;
    } catch (e) {
        return false;
    }
}
/**
 * Test data. This data will be safe by the web app
 * in the first successful login of a auth user.
 * To Test the scripts, delete the localstorage data
 * and comment this call.
 * @returns {boolean}
 */
function testLocalStorageData() {
    if(!supportsHTML5Storage()) { return false; }
    localStorage.setItem("PROFILE_IMG_SRC", "" );
    localStorage.setItem("PROFILE_NAME", "");
    localStorage.setItem("PROFILE_REAUTH_EMAIL", "");
}
/* FIN*/
