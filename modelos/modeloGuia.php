<?php
/* 
 MANEJO DEL MODELO DE MATPEL
 */

require_once "conexion.php";


class ModeloGuia {
       
            public function Modificar($data){
                
                $conexion = new Conexion();
                $dbConectado =  $conexion->DBConect() ;
                $strSql = "UPDATE guias SET numeroGuia= :numeroGuia,
                                             DescripcionGuia=:DescripcionGuia,
                                             PeligrosPotencialesIncendioExplosion=:PeligrosPotencialesIncendioExplosion,
                                             PeligrosPotencialesALaSalud=:PeligrosPotencialesALaSalud,
                                             SeguridadPublica=:SeguridadPublica,
                                             RopaProtectora=:RopaProtectora,
                                             Evacuacion=:Evacuacion,
                                             RespuestaEmergenciaFuego=:RespuestaEmergenciaFuego ,
                                             RespuestaEmergenciaDerrameFuga= :RespuestaEmergenciaDerrameFuga,
                                             RespuestaEmergenciaPrimerosAuxilios= :RespuestaEmergenciaPrimerosAuxilios,
                                             Tabla1=:Tabla1,
                                             Tabla2= :Tabla2,
                                             Tabla3=:Tabla3,
                                             usuarioid=:usuarioid,
                                             
                                                           
                            WHERE id=:id" ;
              
                $stmt = $dbConectado->prepare($strSql);
                $stmt->bindParam(':numeroGuia', $data['numeroGuia'], PDO::PARAM_STR);   
                $stmt->bindParam(':DescripcionGuia',       $data['DescripcionGuia'], PDO::PARAM_STR);   
                $stmt->bindParam(':PeligrosPotencialesIncendioExplosion',       $data['PeligrosPotencialesIncendioExplosion'], PDO::PARAM_STR);  
                $stmt->bindParam(':PeligrosPotencialesALaSalud',         $data['PeligrosPotencialesALaSalud'], PDO::PARAM_INT);   
                $stmt->bindParam(':SeguridadPublica', $data['SeguridadPublica'], PDO::PARAM_STR);   
                $stmt->bindParam(':RopaProtectora',          $data['RopaProtectora'], PDO::PARAM_STR);   
                $stmt->bindParam(':Evacuacion', $data['Evacuacion'], PDO::PARAM_INT  );
                $stmt->bindParam(':RespuestaEmergenciaFuego',    $data['RespuestaEmergenciaFuego'], PDO::PARAM_STR);
                $stmt->bindParam(':RespuestaEmergenciaDerrameFuga', $data['RespuestaEmergenciaDerrameFuga'], PDO::PARAM_STR); 
                $stmt->bindParam(':RespuestaEmergenciaPrimerosAuxilios',     $data['RespuestaEmergenciaPrimerosAuxilios'], PDO::PARAM_STR); 
                $stmt->bindParam(':Tabla1',$data['Tabla1'], PDO::PARAM_STR);
                $stmt->bindParam(':Tabla2',$data['Tabla2'], PDO::PARAM_STR);
                $stmt->bindParam(':Tabla3',$data['Tabla3'], PDO::PARAM_STR);
                $stmt->bindParam(':usuarioid',$data['usuarioid'], PDO::PARAM_INT);   
                $stmt->bindParam(':id',$data['id'], PDO::PARAM_INT);   
                
                /*Comienzo la transaccion */
                $dbConectado->beginTransaction();
                try
                {
                    $stmt->execute(); 
                    $Ejecucion = '1';
                    $dbConectado->commit();    
                } catch (Exception $e) {
                    $Ejecucion = 'Error: ' . $e->getMessage();    
                    $dbConectado->rollBack();
                }
                
                $stmt = null;
                $dbConectado= null;
                return $Ejecucion ;            
                
            }
                
           
            public function Agregar($data){
                /* ACA INSERTAMOS LOS DATS!!!! */
                $conexion = new Conexion();
                $dbConectado =  $conexion->DBConect() ;
                $Ejecucion = '0';
                ////////////////ENCABEZADO
                $strSql = "INSERT INTO  guias (numeroGuia,
                                             DescripcionGuia,
                                             PeligrosPotencialesIncendioExplosion,
                                             PeligrosPotencialesALaSalud,
                                             SeguridadPublica,
                                             RopaProtectora,
                                             Evacuacion,
                                             RespuestaEmergenciaFuego ,
                                             RespuestaEmergenciaDerrameFuga,
                                             RespuestaEmergenciaPrimerosAuxilios,
                                             Tabla1,
                                             Tabla2,
                                             Tabla3,
                                             usuarioid)
                                             VALUES( 
                            :numeroGuia,
                            :DescripcionGuia,
                            :PeligrosPotencialesIncendioExplosion,
                            :PeligrosPotencialesALaSalud,
                            :SeguridadPublica,
                            :RopaProtectora,
                            :Evacuacion,
                            :RespuestaEmergenciaFuego,
                            :RespuestaEmergenciaDerrameFuga,
                            :RespuestaEmergenciaPrimerosAuxilios,
                            :Tabla1,
                            :Tabla2,
                            :Tabla3,
                            :usuarioid
                        )" ;
            
                $stmt = $dbConectado->prepare($strSql);   
                
                
                $stmt->bindParam(':numeroGuia', $data['numeroGuia'], PDO::PARAM_STR);   
                $stmt->bindParam(':DescripcionGuia',       $data['DescripcionGuia'], PDO::PARAM_STR);   
                $stmt->bindParam(':PeligrosPotencialesIncendioExplosion',       $data['PeligrosPotencialesIncendioExplosion'], PDO::PARAM_STR);  
                $stmt->bindParam(':PeligrosPotencialesALaSalud',         $data['PeligrosPotencialesALaSalud'], PDO::PARAM_INT);   
                $stmt->bindParam(':SeguridadPublica', $data['SeguridadPublica'], PDO::PARAM_STR);   
                $stmt->bindParam(':RopaProtectora',          $data['RopaProtectora'], PDO::PARAM_STR);   
                $stmt->bindParam(':Evacuacion', $data['Evacuacion'], PDO::PARAM_INT  );
                $stmt->bindParam(':RespuestaEmergenciaFuego',    $data['RespuestaEmergenciaFuego'], PDO::PARAM_STR);
                $stmt->bindParam(':RespuestaEmergenciaDerrameFuga', $data['RespuestaEmergenciaDerrameFuga'], PDO::PARAM_STR); 
                $stmt->bindParam(':RespuestaEmergenciaPrimerosAuxilios',     $data['RespuestaEmergenciaPrimerosAuxilios'], PDO::PARAM_STR); 
                $stmt->bindParam(':Tabla1',           $data['Tabla1'], PDO::PARAM_STR);
                $stmt->bindParam(':Tabla2',  $data['Tabla2'], PDO::PARAM_STR);
                $stmt->bindParam(':Tabla3',     $data['Tabla3'], PDO::PARAM_STR);
                $stmt->bindParam(':usuarioid',     $data['usuarioid'], PDO::PARAM_int);
                //Comienzo la transaccion 
                $dbConectado->beginTransaction();
                try{
                    $stmt->execute(); 
                    $Ejecucion = '1';
                    $dbConectado->commit();    
                } catch (Exception $e) {
                    $Ejecucion = 'Error: ' . $e->getMessage();    
                    $dbConectado->rollBack();
                }
                    
                $stmt = null;
                $dbConectado= null;
                return $Ejecucion ; 
            }
     
            
            public function Eliminar($data){
                $conexion = new Conexion();
                $dbConectado =  $conexion->DBConect() ;
               
                
                $strSql = "UPDATE guias set eliminado='SI', usuarioid=:usuarioID    WHERE id=:id ";
                $stmt = $dbConectado->prepare($strSql);   
                
                $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
                $stmt->bindParam(':usuarioID', $data['usuarioID'], PDO::PARAM_INT);
                /*Comienzo la transaccion */
                $dbConectado->beginTransaction();
                try
                {
                    $stmt->execute(); 
                    $Ejecucion = '1';
                    $dbConectado->commit();    
                } catch (Exception $e) {
                     
                    $Ejecucion = 'Error: ' . $e->getMessage();    
                    $dbConectado->rollBack();
                    
                }
                $stmt = null;
                $dbConectado= null;
                return $Ejecucion ; 
            }

    public function BuscarxNGuiaGRE($filtro){
       
        
        $Coneccion = new Conexion(); 
        $guiaGRE = $filtro;
        $dbConectado =  $Coneccion->DBConect() ;        
        $strSql ="   SELECT id,
                            numeroGuia, 
                            DescripcionGuia, 
                            PeligrosPotencialesIncendioExplosion, 
                            PeligrosPotencialesALaSalud, 
                            SeguridadPublica,
                            RopaProtectora,	
                            Evacuacion,
                            RespuestaEmergenciaFuego,
                            RespuestaEmergenciaDerrameFuga,
                            RespuestaEmergenciaPrimerosAuxilios,	
                            Tabla1,Tabla2,Tabla3,Eliminado,usuarioid
            
                    FROM guias 
                    WHERE numeroGuia=:guiaGRE";
        
        $jsondata = array();
        
        try{    
            $stmt = $dbConectado->prepare($strSql);
            $stmt->bindParam(':guiaGRE', $guiaGRE, PDO::PARAM_STR);   
            $stmt -> execute();
            $registro = $stmt ->fetchAll();      
            
            $jsondata['success'] = false;
            
                 
               if ($registro) {
                        $jsondata['success'] = true;
                        $jsondata['message'] = 'Hola! El valor recibido es correcto.';
                    //obtener los valores 
                $jsondata['guia']=array();
                foreach( $registro  as $row ) {
                        //Si quiero devolver mas de uno tengo que agregar [] al lado de   $jsondata['guia'] querdarias   $jsondata['guia'][] 
                        $jsondata['guia']= array("id" => $row["id"],
                                                 "numeroGuia"=>$row["numeroGuia"]  ,
                                                 "DescripcionGuia"=>$row["DescripcionGuia"],
                                                  "Tabla1"=>$row['Tabla1'] ,
                                                  "Evacuacion"=>utf8_encode($row["Evacuacion"]),
                                                  "PeligrosPotencialesIncendioExplosion"=>utf8_encode($row['PeligrosPotencialesIncendioExplosion']), 
                                                  "PeligrosPotencialesALaSalud"=>utf8_encode($row['PeligrosPotencialesALaSalud']) ,
                                                  "SeguridadPublica"=>utf8_encode($row['SeguridadPublica']) ,
                                                  "RopaProtectora"=>utf8_encode($row['RopaProtectora']) ,
                                                  "Evacuacion"=>utf8_encode($row['Evacuacion']),
                                                  "RespuestaEmergenciaFuego"=>utf8_encode($row['RespuestaEmergenciaFuego']) ,
                                                  "RespuestaEmergenciaDerrameFuga"=>utf8_encode($row['RespuestaEmergenciaDerrameFuga']) ,
                                                  "RespuestaEmergenciaPrimerosAuxilios"=>utf8_encode($row['RespuestaEmergenciaPrimerosAuxilios']) ,
                                                  "Tabla1"=>utf8_encode($row['Tabla1']) ,
                                                  "Tabla2"=>utf8_encode($row['Tabla2']) ,
                                                  "Tabla3"=>utf8_encode($row['Tabla3']) ,
                                                  "Eliminado"=>utf8_encode($row['Eliminado']) 
                                                  );
                                                 
                        
                            
                    }
                }else{
                        $jsondata['success'] = false;
                        $jsondata['message'] = 'No se encontraron datos.';
                }
               
            }
            catch(Throwable $e) {
                $jsondata['trace'] = $e->getTrace();
                $jsondata['error'] =' en '.$e->getFile().' en la linea '.$e->getLine().' llamado desde '.$trace[0]['file'].' on line '.$trace[0]['line'];
            }
        
            $Coneccion =null;
         
            //Aunque el content-type no sea un problema en la mayoría de casos, es recomendable especificarlo
            header("Content-type: application/json; charset=utf-8");
            return json_encode($jsondata);
            

            }
       
  }
