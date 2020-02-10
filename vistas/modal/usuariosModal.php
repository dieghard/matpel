<?php

?>
   <!-- ESTO ES JQUERY!!!!!! -->
        <script src="js/jquery-3.3.1.min.js"></script>
          <!-- FIN JQUERY!!!!!! -->
 <!-- ESTO ES PARA LOS CUADROS DE ALERTA ---> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script> 
<!-- ESTO ES PARA LOS CUADROS DE ALERTA ---> 

<div id='flotante' style='display: none;'>
    <div class='container'>  
        <input type="hidden" id='txtId' name="txtId" value='0' hidden>
        <div class="row">
            <div class="col-md-6 col-sx-12">
            <img src="\matpel\vistas\images\usuario.jpg" class="img-responsive" alt="imagen usuario" style="width: 40%; height: 70%">
            </div>
            <div class="col-md-6 col-sx-12">
                <h1 style="text-shadow: -5px -5px 5px #aaa;"><i class="fa fa-users">USUARIO </i></h1>
            </div>
        </div>
        <form id="frmModal">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre"  id="nombre"  placeholder="Ingrese el nombre de usuario" title="Ingrese el nombre" tabindex="1" required>
                </div>
                <div class="form-group">
                    <label for="mail">Mail</label>
                    <input type="email" class="form-control" name="mail"  id="mail"  placeholder="Ingrese mail" title="Ingrese el mail" tabindex="2" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password"  id="password" placeholder="Ingrese el password" title="Ingrese el password" tabindex="3" required>
                </div>
                <div class="form-group">
                    <label for="rol">rol</label>
                    <select class="form-control" id="rol" tabindex="4" required>
                        <option value='0'>Usuario</option>
                        <option value='1'>Administador</option>
                    </select>    
                </div>
                <div class="form-group">
                    <label for="Activo">Activo</label>
                    <select class="form-control" id="activo" tabindex="5" required>
                        <option value='SI'>SI</option>
                        <option value='NO'>NO</option>
                    </select>    
                </div>

            </form>
        
          <div id="dialog"></div>
          
            <div id='mensajes'>
                
             </div>
            <div class="row">
                <button type="button"  id ='cmdGuardar' class="btn btn-success edit-modal" value="3" tabindex="10" ><i class="fa fa-edit">Guardar</i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id='Cerrar' tabindex="11"><i class="fa fa-ban"> Cancelar</i></button>
            </div>
       
        
    </div>
</div>
  
