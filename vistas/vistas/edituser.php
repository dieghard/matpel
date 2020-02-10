<?php
   if (!isset($_SESSION["usuario"])){ 
        session_start()  ;
        if (isset($_SESSION["usuario"]) ){          
            $usuario = $_SESSION["usuario"];
            $_session_NOMBRE  = $usuario["nombre"]  ;
            
            $cuartel = $usuario["cuartel"];
        }else {
             $newURL='../index.php'; 
                header('Location: '.$newURL);      
       
            }
        
    }else {
         $newURL='../index.php'; 
         header('Location: '.$newURL);
    } 
?>
<!DOCTYPE html>

<html lang="es">
    <head>
            <!-- ESTO ES JQUERY!!!!!! -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
      
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="XUA-Compatible" content="IE-edge">
        <meta name="title" content="MATPEL 51-03">
        <meta name="description" content="Edición User">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Condensed" rel="stylesheet">
        <link rel="stylesheet" href="css/edituser.css">
        
    </head>
    <body>
        
        <div class="container">
        <input type="hidden" id='txtId' name="txtId" value='<?php echo $usuario["id"] ?>' hidden>
        <div class="row">
            <div class="col-md-6 col-sx-12">
            <img src="\matpel\vistas\images\usuario.jpg" class="img-responsive" alt="imagen usuario" style="width: 40%; height: 70%">
            </div>
            <div class="col-md-6 col-sx-12">
                <h1 style="text-shadow: -5px -5px 5px #aaa;"><i class="fa fa-users">MODIFICAR DATOS DEL USUARIO </i></h1>
            </div>
        </div>
        <form id="frmModal">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre"  id="nombre" value='<?php echo $_session_NOMBRE ?>'  placeholder="Ingrese el nombre de usuario" title="Ingrese el nombre" tabindex="1" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password"  id="password" placeholder="Ingrese el nuevo password" title="Ingrese el nuevo password" tabindex="2" required>
                </div>
                
            </form>
        
          <div id="dialog"></div>
          
            <div id='mensajes'>
                
             </div>
            <div class="row">
                <button type="button"  id ='cmdGuardar' class="btn btn-success edit-modal" value="3" tabindex="3" ><i class="fa fa-edit">Guardar</i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id='Cerrar' tabindex="4"><i class="fa fa-ban"> Cancelar</i></button>
                <div id="mensajes"></div>
            </div>
       
                
        </div>
        <!-- FIN JQUERY!!!!!! -->
    <script type="text/javascript" src="js/editUser.js"></script>
     <!-- ESTO ES PARA LOS CUADROS DE ALERTA ---> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script> 
<!-- ESTO ES PARA LOS CUADROS DE ALERTA ---> 

    </body>
    
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

