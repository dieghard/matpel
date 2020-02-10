<?php


    class AjaxUser{
      
        public function __construct(){
           require_once '../../controladores/userController.php'; 
           }    
         public function llenarGrilla($filtro ){
                       
            $user = new UserControlador();
            $respuesta = $user->llenarGrilla($filtro); 
            echo $respuesta;
            $user = null;
        }

           public function Modificar($data){
            $user = new UserControlador();
            $respuesta= $user->Modificar($data);    
            echo $respuesta;
            $user = null;
        }   
        
        public function Agregar($data){
            $user = new UserControlador();
            $respuesta= $user->Agregar($data);    
            echo $respuesta;
            $user = null;
        }
        public function Eliminar($data){
            $user = new UserControlador();
            $respuesta= $user->Eliminar($data);    
            echo $respuesta;
        }
        public function traerPass($id){
            $user = new UserControlador();
            $respuesta= $user->TraerPass($id);    
            echo $respuesta;
        }
    }
    
    
    $ajaxUser = new AjaxUser();
    
    session_start();
    $usuario = $_SESSION["usuario"];
    $usuarioID  = $usuario["id"]  ;
    $Cuartel_logueadoID  = $usuario["cuartelID"]  ;
    
    $data =[];
    if($_POST['ACTION']=='traerPass'){
        $id= $_POST['id'];
        $ajaxUser->traerPass($id)    ;
    } 
    if($_POST['ACTION']=='eliminar'){
        llenardata ($data,$Cuartel_logueadoID);
        $ajaxUser->Eliminar($data)    ;
    } 
   
    if($_POST['ACTION']=='modificar') {
        llenardata ($data,$Cuartel_logueadoID);
        
        $ajaxUser->Modificar($data,$Cuartel_logueadoID);
        
    }
    if($_POST['ACTION']=='nuevo') {
        llenardata ($data,$Cuartel_logueadoID);
        $ajaxUser->Agregar($data,$Cuartel_logueadoID);
    }
    
              
    if ($_POST['ACTION'] == 'llenarGrilla'){
        $filtro = ["nombre"=>  $_POST["nombre"],
                   "cuartelID"=>  $Cuartel_logueadoID 
                ] ;
        $ajaxUser->llenarGrilla($filtro);
        
    }

    
function llenardata(&$data,$cuartelID){
    
    $data['id']= $_POST['elId'];
    $data['nombre']= $_POST['nombre'];
    $data['mail']= filter_var( $_POST['mail'],FILTER_SANITIZE_EMAIL)  ;
    $data['pass']= base64_encode($_POST['password']);
    $data['activo']= $_POST['activo'];
    $data['rol']= filter_var( $_POST['rol'],FILTER_SANITIZE_NUMBER_INT);
    $data['cuartelID']= $cuartelID;

}

