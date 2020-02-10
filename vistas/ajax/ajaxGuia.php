<?php


    class AjaxGuia{
      
        public function __construct(){
           require_once '../../controladores/controllerGuia.php'; 
           }    
         
        public function BuscarxGuiaGre($guiaGRE){
            $guia = new ControladorGuia();
            $respuesta='PASE X AJAX';
            $respuesta= $guia->BuscarXGuiaGRE($guiaGRE);    
            echo $respuesta;
        }
    }
    
    
    $ajaxGuia = new AjaxGuia();
    if (isset($_POST['guiaGRE'])){
        $guiaGRE=$_POST['guiaGRE'] ;
        $ajaxGuia->BuscarxGuiaGre($guiaGRE) ;
         //echo 'PASE X AJAX GUIA  Y EL NUMERO DE GUIA ES:'.$guiaGRE;
         
    } 
    
