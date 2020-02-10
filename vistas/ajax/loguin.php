<?php
require_once "../../controladores/userController.php";
/*
=================================================================================================
 * VALIDAR USUARIO!
================================================================================================= 
*/
class Ajax_Validar_User {
        public $usuario;
        public $password;
        public $cuartelID;
        
        public function Ingreso($usuario,$pass,$cuartelID){
            $CP = new UserControlador();
            $respuesta = $CP->ValidarPasswordController ($usuario,$pass,$cuartelID); 
            return $respuesta;
            $CP = null;
        }
}
/*
=================================================================================================
 * LECTURA DE AJAX DEPENDIENDO EL TIPO DE CHEK LLAMO A UNA CLASE O A OTRA!
================================================================================================= 
*/

if(isset($_POST["tipoVerificacion"])){
    $Verificacion = $_POST["tipoVerificacion"];
    
}


if ($Verificacion=='ingreso'){  
    if(isset($_POST["usuario"])){
        $usuario = new Ajax_Validar_User();
        
        $usuariote= $_POST["usuario"];
        $password= $_POST["password"];
        $cuartelID= $_POST["cuartelID"];
         $respuesta = $usuario->Ingreso( $usuariote,$password,$cuartelID);
         echo $respuesta ;
    }
}          
   
