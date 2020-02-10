<?php
/* 
 MANEJO DEL MODELO DE MATPEL
 */

require_once "conexion.php";


class MatpelModelo {
       
            public function Modificar($data){
                
                $conexion = new Conexion();
                $dbConectado =  $conexion->DBConect() ;
                $strSql = "UPDATE matpel SET nProducto= :nProducto,
                                             ncas=:ncas,
                                             guiaGRE=:guiaGRE,
                                             clase=:clase,
                                             nombreProducto=:nombreProducto,
                                             salud=:salud,
                                             inflamabilidad=:inflamabilidad,
                                             reactividad=:reactividad ,
                                             riesgoEspecial= :riesgoEspecial,
                                             valorTotal= :valorTotal,
                                             ruta=:ruta,
                                             observaciones= :observaciones,
                                             colorLetra=:colorLetra,
                                             colorFondo=:colorFondo,
                                             usuarioid=:usuarioid                          
                            WHERE id=:id" ;
              
                $stmt = $dbConectado->prepare($strSql);
                $stmt->bindParam(':nProducto', $data['nProducto'], PDO::PARAM_STR);   
                $stmt->bindParam(':ncas',       $data['ncas'], PDO::PARAM_STR);   
                $stmt->bindParam(':guiaGRE',       $data['guiaGRE'], PDO::PARAM_STR);  
                $stmt->bindParam(':clase',         $data['clase'], PDO::PARAM_INT);   
                $stmt->bindParam(':nombreProducto', $data['nombre'], PDO::PARAM_STR);   
                $stmt->bindParam(':salud',          $data['salud'], PDO::PARAM_INT);   
                $stmt->bindParam(':inflamabilidad', $data['inflamabilidad'], PDO::PARAM_INT  );
                $stmt->bindParam(':reactividad',    $data['reactividad'], PDO::PARAM_INT );
                $stmt->bindParam(':riesgoEspecial', $data['riesgoEspecial'], PDO::PARAM_INT); 
                $stmt->bindParam(':valorTotal',     $data['valorTotal'], PDO::PARAM_INT); 
                $stmt->bindParam(':ruta',           $data['ruta'], PDO::PARAM_STR);
                $stmt->bindParam(':observaciones',  $data['observaciones'], PDO::PARAM_STR);
                $stmt->bindParam(':colorLetra',     $data['colorLetra'], PDO::PARAM_STR);
                $stmt->bindParam(':colorFondo',     $data['colorFondo'], PDO::PARAM_STR);
                $stmt->bindParam(':usuarioid',      $data['usuarioID'], PDO::PARAM_INT);
                $stmt->bindParam(':id',             $data['id'], PDO::PARAM_INT);   
                
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
                $strSql = "INSERT INTO  matpel (nProducto,ncas,guiaGRE,clase,nombreProducto,salud,inflamabilidad,reactividad,riesgoEspecial,valorTotal,ruta,observaciones,colorLetra,colorFondo,usuarioid)VALUES( 
                            :nProducto,
                            :ncas,
                            :guiaGRE,
                            :clase,
                            :nombreProducto,
                            :salud,
                            :inflamabilidad,
                            :reactividad,
                            :riesgoEspecial,
                            :valorTotal,
                            :ruta,
                            :observaciones,
                            :colorLetra,
                            :colorFondo,
                            :usuarioid
                        )" ;
            
                $stmt = $dbConectado->prepare($strSql);   
                
                
                $stmt->bindParam(':nProducto', $data['nProducto'], PDO::PARAM_STR);   
                $stmt->bindParam(':ncas', $data['ncas'], PDO::PARAM_STR);   
                $stmt->bindParam(':guiaGRE', $data['guiaGRE'], PDO::PARAM_STR);   
                $stmt->bindParam(':clase', $data['clase'], PDO::PARAM_INT);   
                $stmt->bindParam(':nombreProducto', $data['nombre'], PDO::PARAM_STR);   
                $stmt->bindParam(':salud', $data['salud'], PDO::PARAM_INT);   
                $stmt->bindParam(':inflamabilidad', $data['inflamabilidad'], PDO::PARAM_INT  );
                $stmt->bindParam(':reactividad',  $data['reactividad'], PDO::PARAM_INT );
                $stmt->bindParam(':riesgoEspecial', $data['riesgoEspecial'], PDO::PARAM_INT); 
                $stmt->bindParam(':valorTotal', $data['valorTotal'], PDO::PARAM_INT); 
                $stmt->bindParam(':ruta', $data['ruta'], PDO::PARAM_STR);
                $stmt->bindParam(':observaciones', $data['observaciones'], PDO::PARAM_STR);
                $stmt->bindParam(':colorLetra', $data['colorLetra'], PDO::PARAM_STR);
                $stmt->bindParam(':colorFondo', $data['colorFondo'], PDO::PARAM_STR);
                $stmt->bindParam(':usuarioid', $data['usuarioID'], PDO::PARAM_INT);
               
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
               
                
                $strSql = "UPDATE matpel set eliminado='SI', usuarioid=:usuarioID    WHERE id=:id ";
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

              public function LlenarGrilla($filtro){
       $strtabla='';
       $Coneccion = new Conexion(); 
       
       $nProducto = $filtro['nProducto'];
       $ncas = $filtro['nCas'];
       $nombre = $filtro['nombre'];
       $guiaGRE = $filtro['guiaGRE'];
       $dbConectado =  $Coneccion->DBConect() ;        
       $strSql ="SELECT id,nProducto, ncas, guiaGRE, clase, nombreProducto,
                        observaciones,salud,inflamabilidad,reactividad,
                        riesgoEspecial, valorTotal,ruta,colorLetra,colorFondo
                FROM matpel 
                WHERE IFNULL(eliminado,'NO')='NO'";
        if ($nProducto <>''){
            $strSql .=" AND nProducto like '%". $nProducto  ."%' ";
            }    
        if ($ncas <>''){
            $strSql .=" AND ncas like '%". $ncas   ."%' ";
            
            } 
        if ($guiaGRE <>''){
            $strSql .=" AND guiaGRE like '%". $guiaGRE   ."%' ";
            
            }     
        if ($nombre <>''){
                $strSql .=" AND nombreProducto like '%". $nombre ."%' ";
            }  
        $strSql .=" ORDER by nombreProducto";
            // echo $strSql ;
            $tabla ='';
            try{    
                 $stmt = $dbConectado->prepare($strSql);
                 $stmt -> execute();
                 $sunaCantidad = 0;
                 $sumUnidad = 0 ;
                 $sumaTotal = 0;
                 $registro = $stmt ->fetchAll();      
                 $tabla= '<div class="table-responsive">
                     <table class="table table-condensed table-hover table-dark table-striped  table-bordered" id="idtablaMatpel">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nº DEL PRODUCTO</th> 
                            <th scope="col">NºCAS</th>
                            <th scope="col">NºGUIA GRE</th>
                            <th scope="col">CLASE</th>
                            <th scope="col">NOMBRE DEL PRODUCTO</th>
                            <th scope="col" style="background-color:blue;color:white;align=center;text-align: center;">SALUD</th>
                            <th scope="col" style="background-color:red;color:white;align=center;text-align: center;">INFLAMABILIDAD</th>
                            <th scope="col" style="background-color:yellow;color:black;align=center;text-align: center;">REACTIVIDAD</th>
                            <th scope="col" style="background-color:white;color:black;align=center;text-align: center;">RIESGO ESPECIAL</th>
                            <th scope="col">VALOR TOTAL</th>
                            <th scope="col">RUTA</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>    
                <tbody>';
                 if ($registro) {
                        /* obtener los valores */
                    foreach( $registro  as $row ) {
                            
                            $encabezadoRow='<tr id="matpel-'.$row['id'].'"';
                            $encabezadoRow .='data-id="'.$row['id'] .'"';
                            $encabezadoRow .='data-nProducto="'.$row['nProducto'] .'"';
                            $encabezadoRow .= 'data-ncas="'.$row['ncas'].'"';
                            $encabezadoRow .= 'data-guiaGRE="'.$row['guiaGRE'].'"';
                            $encabezadoRow .= 'data-clase="'.$row['clase'].'"'; 
                            $encabezadoRow .= 'data-nombreProducto="'.$row['nombreProducto'].'"';
                            $encabezadoRow .= 'data-observaciones="'.$row['observaciones'].'"';
                            $encabezadoRow .= 'data-salud="'.$row['salud'].'"';
                            $encabezadoRow .= 'data-inflamabilidad="'.$row['inflamabilidad'].'"';
                            $encabezadoRow .= 'data-reactividad="'.$row['reactividad'].'"';
                            $encabezadoRow .= 'data-riesgoEspecial="'.$row['riesgoEspecial'].'"';
                            $encabezadoRow .= 'data-valorTotal="'.$row['valorTotal'].'"';
                            $encabezadoRow .= 'data-ruta="'.$row['ruta'].'"';
                            $encabezadoRow .= 'data-colorLetra="'.$row['colorLetra'].'"';
                            $encabezadoRow .= 'data-colorFondo="'.$row['colorFondo'].'"';
                            $encabezadoRow .= '">';
                            
                                $tabla .= $encabezadoRow .'<td  style="background-color:'.$row['colorFondo'] .'; color: '.$row['colorLetra'] .';">'.$row['nProducto'] .'</td>';
                                $tabla .=  '<td>'.$row["ncas"].'</td>'; 
                                $tabla .=  '<td><a href="guia.php?guiaGRE='.$row["guiaGRE"].'" class="btn btn-info" role="button"><i class="fa fa-search">'.$row["guiaGRE"]. '</i></a></td>';
                                $tabla .=  '<td>'.$row["clase"].'</td>'; 
                                $tabla .=  '<td>'.$row["nombreProducto"].'</td>';
                                $tabla .=  '<td style="background-color:blue;color:white;align=center;text-align: center;" >'.$row["salud"].'</td>';
                                $tabla .=  '<td style="background-color:red;color:white;align=center;text-align: center;">'.$row["inflamabilidad"].'</td>';
                                $tabla .=  '<td style="background-color:yellow;color:black;align=center;text-align: center;">'.$row["reactividad"].'</td>';
                                $tabla .=  '<td style="background-color:white;color:black;align=center;text-align: center;">'.$row["riesgoEspecial"].'</td>';
                                $tabla .=  '<td>'.$row["valorTotal"].'</td>';
                                $tabla .=  '<td>'.$row["ruta"].'</td>';
                                $tabla .=  '<td><button type="button" title="Presione para modificar el producto" class="btn btn-primary edit" value="'. $row['id'] .'"><i class="fa fa-edit "></i></button> </td>';
                                $tabla .=  '<td><button type="button" title="Presione para eliminar el producto" class="btn btn-danger delete" value="'. $row['id'] .'"><i class="fa fa-eraser "></i></button></td>';
                            $tabla .= '</tr>'; //nueva fila  
                            $sumaTotal += 1 ; 
                            
                    }
                }
                $tabla .= '</tbody>
                 
                        </table>
                        </div>';
            }
            catch(Throwable $e) {
                $trace = $e->getTrace();
                echo $e->getMessage().' en '.$e->getFile().' en la linea '.$e->getLine().' llamado desde '.$trace[0]['file'].' on line '.$trace[0]['line'];
            }
            $Coneccion =null;
            return $tabla;
        }
  }
