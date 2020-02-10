<?php
    class Conexion {
          public function DBConect(){
       
            $SERVIDOR = "localhost";
            $BASE_DE_DATOS = "matpelbbvvlevalle";
            $USUARIO= "root";
            $PASSWORD= "";
            
           
            try {
                    $conexion = new PDO ("mysql:host=$SERVIDOR;dbname=$BASE_DE_DATOS", "$USUARIO", "$PASSWORD");
                    //$conexion = new PDO ("dblib:host=$SERVIDOR;dbname=$BASE_DE_DATOS", "$USUARIO", "$PASSWORD");
                    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    RETURN  $conexion;  
                    
            }
            catch(PDOException $e){
                    echo 'ERROR:' . $e->getMessage() .'-CODIGO: ' . $e->getCode();
                    exit();
            }
        }	
    }   
	
