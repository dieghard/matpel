<?php
//namespace Controlador;
class ControladorPlantilla{

	/*=============================================
	LLAMAMOS LA PLANTILLA
	=============================================*/

	public function Login(){
                require_once "controladores/controlador.php";
                require_once "modelos/modelo.php";
		include "vistas/loguin.php";
                
	}
	/*=============================================
	Interaccion del Usuario
	=============================================*/
	public function enlacesPaginasController(){
		
                $MP = new ModeloPlantilla();
		
		if (isset ($_GET["action"])) {
			$enlaces = $_GET["action"];
		} else{
                        $enlaces ='panel';

		}
		$respuesta = $MP->enlacesPaginasModelo($enlaces);

		include  $respuesta;
		$respuesta =null;


	}
	
                
        public function LLENARCOMBO_Controlador($combo){
            require_once "../modelos/modelo.php";
            $Model = new ModeloPlantilla(); 
            $comboLleno ='';
            $comboLleno = $Model->LLENARCOMBO_Modelo($combo);    
            return $comboLleno ;
            $Model =null;      
   
        }
}

