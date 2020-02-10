<?php

require_once "conexion.php";

class ModeloPlantilla {

	public function enlacesPaginasModelo($enlaces){	

			if ( $enlaces=='panel' || 
				 $enlaces =='turnos' ||
				 $enlaces =='sectores' ||
				 $enlaces =='inhabilitacion'
                            )

                            {
			$module = $enlaces .".php";
                            }
                        else {
				$module = "panel.php";
                            }
                            
                        if ($enlaces=='logout'){
                            if (headers_sent()) {
                                 echo'<script>location.replace("logout.php");</script>';
                            }
                           
                            

                        }    
                        else {
                            return $module;
                        }
	}
        
         public function __construct(){
            require_once "conexion.php";  

            }    
        

        
    public function LLENARCOMBO_Modelo($combo){
            
            $Coneccion = new Conexion();
            $campoAs ='Descripcion';
            $name = $combo['NAME'];
            $class= $combo['class'];
            $style = $combo['style'];
            
            $campoIDModel = $combo['ID'];
            $campoDescripcionModel  = $combo['DESCRIPCION'];
            $tablaModel   = $combo['TABLA'];
            $orderModel = $combo['ORDER'];
            $descripcionCombo = $combo['DESCRIPCION_COMBO'];
            $Where = $combo['WHERE'];
            $strCombo = '';
            $consulta ="SELECT $campoIDModel,$campoDescripcionModel as $campoAs FROM $tablaModel  ORDER BY  $orderModel"  ;
            try{    
                $resultado = $Coneccion->DBConect()->query($consulta);
                $strCombo='<select id="'. $name .'" name="'.$name.'" class="'.$class.'" style="'.$style.' required ">';         
                $strCombo.= '<option value="0">'.$descripcionCombo.'</OPTION>';
                foreach ($resultado as $rows){
                        $id = $rows[$campoIDModel];
                        $descripcion = $rows[$campoAs];
                        $strCombo.=  '<option value="'.$id.'">'.$descripcion.'</OPTION>';         
                        }
                $strCombo.=  '</select></br><span>si no encuentra su cuartel, por favor envie sus datos y los datos de su cuartel a info@bmp51.com y será ingresado.</span> ';    
                $Coneccion =null;
            }    
            catch(Throwable $e) {
                $trace = $e->getTrace();
                echo $e->getMessage().' en '.$e->getFile().' en la linea '.$e->getLine().' llamado desde '.$trace[0]['file'].' on line '.$trace[0]['line'];
            }
            return $strCombo;
    }
}

