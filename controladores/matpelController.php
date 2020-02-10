<?php

class ControladorPanel{
/*=============================================
LLAMAMOS LA PLANTILLA
=============================================*/
    public function LLenarGrilla($filtro){
            require_once "../../modelos/modelo.Panel.php";
            $MP = new ModeloPanel(); 
            $comboLleno ='';
            $comboLleno = $MP->LlenarGrilla($filtro);    
            return $comboLleno ;
            $MP =null;
    }
   
    
}
