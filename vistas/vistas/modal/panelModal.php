<?php
?>
   <!-- ESTO ES JQUERY!!!!!! -->
        <script src="js/jquery-3.3.1.min.js"></script>
          <!-- FIN JQUERY!!!!!! -->
 <!-- ESTO ES PARA LOS CUADROS DE ALERTA ---> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script> 
<!-- ESTO ES PARA LOS CUADROS DE ALERTA ---> 

<div id='flotante' style='display: none'>
    <div class='container-fluid'>
        
        <input type="hidden" id='txtId' name="txtId" value='0' hidden>
        <div class="row">
            <div class="col-md-6 col-sx-12">
            <img src="\matpel\vistas\images\matpel2.jpg" class="img-responsive" alt="imagen matpel" style="width: 75%; height: 75%">
            </div>
            <div class="col-md-6 col-sx-12">
               
               <h1 style="text-shadow: -5px -5px 5px #aaa;"><i class="fa fa-free-code-camp">MATERIAL PELIGROSO</i></h1>
            </div>
        </div>
        <form id="frmModal">
            <div class="form-group">
                <label for="nProducto">Nº Producto</label>
                <input type="text" class="form-control" name="nProducto"  id="txtProducto"  placeholder="Ingrese el Nº del Producto" title="Ingrese el Nº del Producto" tabindex="1" required>
            </div>
            <div class="form-group">
                <label for="ncas">Nº CAS</label>
                <input type="text" class="form-control" name="ncas"  id="ncas"  placeholder="Ingrese el Nº de CAS" title="Ingrese el Nº CAS" tabindex="2" required>
            </div>
            <div class="form-group">
                <label for="clase">Clase</label>
                <input type="number" class="form-control" name="clase"  id="clase" min="1" max="4" value="1" placeholder="Ingrese el Nº de clase" title="Ingrese el Nº clase" tabindex="3" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre"  id="txtNombre" placeholder="Ingrese el Nombre del producto" title="Ingrese el nombre del producto" tabindex="4" required>
            </div>

            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <input type="text" class="form-control" name="observaciones"  id="observaciones" placeholder="Ingrese observaciones" title="Ingrese observaciones" tabindex="5" >
            </div>
        
            <div class="form-group">
                <label for="ruta">Ruta</label>
                <input type="text" class="form-control" name="ruta"  id="ruta" placeholder="Ingrese la ruta" title="Ingrese la ruta" tabindex="6" >
            </div>
        </form>
        <div class='row'>
            <div class='col-lg-3 col-md-6 col-sm-12'  style="background: blue;color:white">
                <label for="salud">Salud</label>
                <input type="number" class="form-control"min="1" max="4" value="1"  name="salud"  id="salud" placeholder="Ingrese numero de salud" title="Ingrese el numero de salud" tabindex="5" required>
            </div>
            <div class='col-lg-3 col-md-6 col-sm-12'  style="background: red;color:white">
                    <label for="inflamabilidad">Inflamabilidad</label>
                    <input type="number" class="form-control"min="1" max="4" value="1"  name="inflamabilidad"  id="inflamabilidad" placeholder="Ingrese numero de inflamabilidad" title="Ingrese el numero de inflamabilidad" tabindex="6" required>            
            </div>
             <div class='col-lg-3 col-md-6 col-sm-12' style="background: yellow;color:black">
                    <label for="reactividad">Reactividad</label>
                    <input type="number" class="form-control"min="1" max="4" value="1"  name="reactividad"  id="reactividad" placeholder="Ingrese numero de reactividad" title="Ingrese el numero de reactividad" tabindex="7" required>            
            </div>
            <div class='col-lg-3 col-md-6 col-sm-12'>
                    <label for="riesgoEspecial">Riesgo Especial</label>
                    <input type="number" class="form-control"min="1" max="4" value="1"  name="riesgoEspecial"  id="riesgoEspecial" placeholder="Ingrese numero de riesgo especial" title="Ingrese el numero de riesgo especial" tabindex="8" required>            
            </div>
        </div>                
        <div class='row'>
            <div class='col-lg-3 col-md-6 col-sm-12'>
                <label for="bgcolorLetra">Color Letra</label>
                <input type="color" title="Seleccione el color de la letra"  id="bgcolorLetra" name="bgcolorLetra" value="#000000" tabindex="4" required>
            </div>            
             <div class='col-lg-3 col-md-6 col-sm-12'>
                <label for="bgcolorFondo">Color Fondo</label>
                    <input type="color" title="Seleccione el color de fondo" id="bgcolorFondo" name="bgcolorFondo" value="#FFFFFF" tabindex="5"  required>
                <div class='col-lg-3 col-md-6 col-sm-12'>
                    <span id="muestra" class="muestra">MUESTRA</span>
                </div>
            </div>
        </div>
       
          <div id="dialog"></div>
          
            <div id='mensajes'>
                
             </div>
            <div class="row">
                <button type="button"  id ='cmdGuardar' class="btn btn-success edit-modal" value="3" tabindex="10" ><i class="fa fa-edit">Guardar</i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id='Cerrar' tabindex="11"><i class="fa fa-ban"> Cancelar</i></button>
            </div>
       
        
    </div>
</div>
  
