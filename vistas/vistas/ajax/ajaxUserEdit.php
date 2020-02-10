<?php


    class AjaxUserEdit{
      
        public function __construct(){
           require_once '../../controladores/userController.php'; 
           }    
         
        public function UserEdit($nombre,$pass,$id){
            $user = new UserControlador();
           
            $respuesta= $user->UserEdit($nombre,$pass,$id);    
            echo $respuesta;
        }
    }
    
    
    $ajaxUser = new AjaxUserEdit();
    if (isset($_POST['password'])){
        $pass=$_POST['password'] ;
    }
    else{
        echo 'FALTA EL PASS';
        exit();
    }
    if (isset($_POST['nombre'])){    
        $nombre=$_POST['nombre'] ;
    }    
   else{
        echo 'FALTA EL PASS';
        exit();
    } 
    if (isset($_POST['id'])){    
        $id=$_POST['id'] ;
    }    
   else{
        echo 'FALTAN DATOS';
        exit();
    } 

    $ajaxUser->UserEdit($nombre,$pass,$id) ;
