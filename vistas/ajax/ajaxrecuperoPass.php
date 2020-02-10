<?php


    class AjaxEnvioPass{
      
        public function __construct(){
           require_once '../../controladores/userController.php'; 
           }    
         
        public function EnvioPass($Mail){
            $user = new UserControlador();
            $respuesta ='Antes de pasasr por Mail';
            $respuesta= $user->TraerPass($Mail);    
            echo $respuesta;
        }
    }
    
    
    $ajaxUser = new AjaxEnvioPass();
    if (isset($_POST['mail'])){
        $mail=$_POST['mail'] ;
        $ajaxUser->EnvioPass($mail) ;
    } 
    
