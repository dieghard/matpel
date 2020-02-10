<?php

class UserControlador{
/*=============================================
LLAMAMOS LA PLANTILLA
=============================================*/
    public function __construct(){
           require_once '../../modelos/userModelo.php'; 
           }
            public function TraerPass($Mail){
            $MP = new UserModelo();
            $respuesta = $MP->TraerPass($Mail);    
            return $respuesta;
            $MP =null;   
           }
           public function UserEdit($nombre,$pass,$id){
            $MP = new UserModelo();
            $respuesta = $MP->UserEdit($nombre,$pass,$id);    
            return $respuesta;
            $MP =null;   
           }
           public function LlenarComboCuarteles(){
            $MP = new UserModelo();
            $combo = $MP->LlenarComboCuarteles();    
            return $combo ;
            $MP =null;   
           }
    public function LLenarGrilla($filtro){
            $MP = new UserModelo();
            $grilla = $MP->LlenarGrilla($filtro);    
            return $grilla ;
            $MP =null;
    }
   
           public function Modificar($data){
            $user = new UserModelo();
            $respuesta= $user->Modificar($data);    
            echo $respuesta;
            $user = null;
        }   
        
        public function Agregar($data){
            $user = new UserModelo();
            $respuesta= $user->Agregar($data);    
            echo $respuesta;
            $user = null;
        }
        public function Eliminar($data){
            $user = new UserModelo();
            $respuesta= $user->Eliminar($data);    
            echo $respuesta;
        }
       
       /*=============================================
	VALIDAR PASSWORD
	=============================================*/

        public function ValidarPasswordController($usuario,$password,$cuartelID){
            require_once "../../modelos/userModelo.php";

            $MP = new UserModelo();
            $datosUsuario=$usuario;
            $datosPass=$password;
            $respuesta= $MP->validarPasswordModelo($datosUsuario,$datosPass,$cuartelID);
             return  $respuesta;
            $MP = null;            
        }            
}
