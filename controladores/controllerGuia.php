<?php

class ControladorGuia{
/*=============================================
LLAMAMOS LA PLANTILLA
=============================================*/
    public function BuscarXGuiaGRE($guia){
            require_once "../../modelos/modeloGuia.php";
            $MP = new ModeloGuia(); 
           // $respuesta ='Pawe poe controlador guia';
            $respuesta = $MP->BuscarxNGuiaGRE($guia);    
            return $respuesta ;
            $MP =null;
    }
   
    
}
