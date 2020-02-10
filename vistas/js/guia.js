/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 $(document).ready(function () {
        $('#print_btn').click(function () {
          $('#pagina').printThis();
        });
      });


$(window).on('load', function() {
    $( document ).ready(function() {
    $('#alaSalud').val('');
    $('#incendiooExplosion').html('');
    $('#seguridadPublica').html('');
    $('#ropaProtectora').html('');
    $('#evacuacion').html('');
    $('#fuego').html('');
    $('#derrame').html('');
    $('#primerosAuxilios').html('');
    
        var guiaGRE = $('#guiaGRE').val();
        var datos = new FormData();
        datos.append("guiaGRE",guiaGRE);
      //alert('NUMERO GUIA GRE:' + guiaGRE );        
       $('#cartel').html('<div class="loading"><h7>Aguarde Un momento, por favor...</h7><img src="images/save.gif"  width="50" height="50" alt="loading"/></div>'); 
        $.ajax({
            url:"ajax/ajaxGuia.php",
                method:"POST",
                datatype:"json",
                
                data:datos,
                cache:false,
                contentType:false,
                processData :false,
                success:function(respuesta){
                   // alert(respuesta);
                    console.log(respuesta);
                    if (respuesta.success){
                        //alert(respuesta.guia.DescripcionGuia);
                        $('#DescripcionGuia').html(respuesta.guia.DescripcionGuia);
                        $('#alaSalud').val(respuesta.guia.PeligrosPotencialesALaSalud);
                        $('#incendiooExplosion').html(respuesta.guia.PeligrosPotencialesIncendioExplosion);
                        $('#seguridadPublica').html(respuesta.guia.SeguridadPublica);
                        $('#ropaProtectora').html(respuesta.guia.RopaProtectora);
                        $('#evacuacion').html(respuesta.guia.SeguridadPublica);
                        $('#fuego').html(respuesta.guia.RespuestaEmergenciaFuego);
                        $('#derrame').html(respuesta.guia.RespuestaEmergenciaDerrameFuga);
                        $('#primerosAuxilios').html(respuesta.guia.RespuestaEmergenciaPrimerosAuxilios);
                        }         
                    }
                });
            $('#cartel').html('');    
    });
});
