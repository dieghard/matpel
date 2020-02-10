<?php

/**
 * Description of ajaxComboCuarteles
 *
 * @author Diego
 */
class ajaxComboCuarteles {
       public function __construct(){
           require_once '../../controladores/userController.php'; 
           }
       
          public function llenarComboCuarteles(){
            $ajaxUser = new UserControlador();
            $respuesta=  $ajaxUser ->LlenarComboCuarteles();
            echo $respuesta;       
                   
       }    
}
  
$ajaxUser = new ajaxComboCuarteles();

if ($_POST['ACTION'] == 'llenarComboCuarteles'){
    $ajaxUser->llenarComboCuarteles();
}
