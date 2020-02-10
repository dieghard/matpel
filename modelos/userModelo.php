<?php
/* 
 MANEJO DEL MODELO DE MATPEL
 */

require_once "conexion.php";


class UserModelo {
       
            public function Modificar($data){
                
                $conexion = new Conexion();
                $dbConectado =  $conexion->DBConect() ;
                $strSql = "UPDATE usuarios SET nombre= :nombre,
                                             mail=:mail,
                                             pass=:pass,
                                             activo=:activo,
                                             cuartelID=:cuartelID,
                                             rol=:rol                          
                            WHERE id=:id" ;
                
                $stmt = $dbConectado->prepare($strSql);
                $stmt->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);   
                $stmt->bindParam(':mail',       $data['mail'], PDO::PARAM_STR);   
                $stmt->bindParam(':pass',      $data['pass'], PDO::PARAM_STR);   
                $stmt->bindParam(':activo', $data['activo'], PDO::PARAM_STR);   
                $stmt->bindParam(':cuartelID',          $data['cuartelID'], PDO::PARAM_INT);   
                $stmt->bindParam(':rol', $data['rol'], PDO::PARAM_INT  );
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
                $strSql = "INSERT INTO  usuarios (nombre,mail,pass,activo,cuartelID,rol)VALUES( 
                            :nombre,
                            :mail,
                            :pass,
                            :activo,
                            :cuartelID,
                            :rol
                        )" ;
            
                $stmt = $dbConectado->prepare($strSql);   
                
                
                $stmt->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);   
                $stmt->bindParam(':mail', $data['mail'], PDO::PARAM_STR);   
                $stmt->bindParam(':pass', $data['pass'], PDO::PARAM_STR);   
                $stmt->bindParam(':activo', $data['activo'], PDO::PARAM_STR);   
                $stmt->bindParam(':cuartelID', $data['cuartelID'], PDO::PARAM_INT);   
                $stmt->bindParam(':rol', $data['rol'], PDO::PARAM_INT  );
              
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
            
                ini_set( 'display_errors', 1 );
                error_reporting( E_ALL );
                $from = "noresponder@bmp51.com";
                $to = $data['mail'];
                $subject = "SOFTWARE BMP 51/3 MATEPEL -EL USUARIO:" . $data['nombre'] . "  fue ingresado al sistema datos" ;
                $message = "NUEVO INGRESO DE DATOS PARA EL USER:" .  $nombre ;
                $message = $message . "";
                $headers = "Desde:" . $from;
                mail($to,$subject,$message, $headers);
                
                $from = "noresponder@bmp51.com";
                $to = 'dieghard@gmail.com';
                $subject = "SOFTWARE BMP 51/3 MATEPEL -EL USUARIO:" . $data['nombre'] . "  fue ingresado al sistema datos" ;
                $message = "NUEVO INGRESO DE DATOS PARA EL USER:" .  $nombre ;
                $message = $message . "";
                $headers = "Desde:" . $from;
                mail($to,$subject,$message, $headers);
                
                
                }
            
     
            
            public function Eliminar($data){
                $conexion = new Conexion();
                $dbConectado =  $conexion->DBConect() ;
               
                
                $strSql = "DELETE FROM usuarios  WHERE id=:id ";
                $stmt = $dbConectado->prepare($strSql);   
                
                $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
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
            
    public function LlenarComboCuarteles(){
       $Coneccion = new Conexion(); 
       $dbConectado =  $Coneccion->DBConect() ;        
       $strSql ="SELECT id, Nombre 
                FROM cuartel  
                ORDER BY Nombre ";         
            try{    
                 $stmt = $dbConectado->prepare($strSql);
                 $stmt -> execute();
                 $sunaCantidad = 0;
                 $sumUnidad = 0 ;
                 $sumaTotal = 0;
                 $registro = $stmt ->fetchAll();      
                 $tabla= '<div class="form-group">
                            <label for="cmbCuartel">Selecione Cuartel</label>
                                <select class="form-control" id="cmbCuartel" require>';
                                if ($registro) {
                                    /* obtener los valores */
                                    foreach( $registro  as $row ) {
                                        $tabla.='<option value='. $row['id']  . '>'. $row['Nombre'] . '</option>'; 
                                    }
                                
                                }        
                $tabla.='</select> </br><small>si no encuentra su cuartel, envie sus datos y los datos de su cuartel a info@bmp51.com y será ingresado.</small> 
                          </div>';      
                }
            catch(Throwable $e) {
                $trace = $e->getTrace();
                echo $e->getMessage().' en '.$e->getFile().' en la linea '.$e->getLine().' llamado desde '.$trace[0]['file'].' on line '.$trace[0]['line'];
            }
            $Coneccion =null;
            return $tabla;
        
    }

    public function LlenarGrilla($filtro){
       $strtabla='';
       $Coneccion = new Conexion(); 
       $dbConectado =  $Coneccion->DBConect() ;        
       
       $nombre = $filtro['nombre'];
       $cuartelID = $filtro['cuartelID'];
       
       $strSql ="SELECT U.id,U.nombre, U.mail, U.pass, U.activo,
                        U.cuartelID, C.Nombre as cuartel,U.rol
                FROM usuarios U
                inner join cuartel C on C.id =U.cuartelID
                WHERE U.cuartelID=". $cuartelID;
        if ($nombre <>''){
            $strSql .=" AND U.nombre like '%". $nombre  ."%' ";
        }    
          
        $strSql .=" ORDER by nombre";
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
                     <table class="table table-condensed table-hover table-dark table-striped  table-bordered" id="idTablaUser">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">NOMBRE</th> 
                            <th scope="col">MAIL</th>
                            <th scope="col">ACTIVO</th>
                            <th scope="col">ROL</th>
                            <th scope="col">CUARTEL</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>    
                <tbody>';
                 if ($registro) {
                        /* obtener los valores */
                    foreach( $registro  as $row ) {
                            
                            $encabezadoRow='<tr id="user-'.$row['id'].'"';
                                $encabezadoRow .='data-id="'.$row['id'] .'"';
                                $encabezadoRow .='data-nombre="'.$row['nombre'] .'"';
                                $encabezadoRow .= 'data-mail="'.$row['mail'].'"';
                                $encabezadoRow .= 'data-activo="'.$row['activo'].'"';
                                $encabezadoRow .= 'data-rol="'.$row['rol'].'"';
                                $encabezadoRow .= 'data-cuartel="'.$row['cuartel'].'"';
                                $encabezadoRow .= 'data-cuartelID="'.$row['cuartelID'].'"';
                            $encabezadoRow .= '">';
                            
                            $tabla .= $encabezadoRow .'<td>'.$row['nombre'] .'</td>';
                            $tabla .=  '<td>'.$row["mail"].'</td>'; 
                            $tabla .=  '<td>'.$row["activo"].'</td>'; 
                            $tabla .=  '<td>'.$row["rol"].'</td>';
                            $tabla .=  '<td>'.$row["cuartel"].'</td>';
                            $tabla .=  '<td><button type="button" title="Presione para modificar el usuario" class="btn btn-primary edit" value="'. $row['id'] .'"><i class="fa fa-edit "></i></button> </td>';
                            $tabla .=  '<td><button type="button" title="Presione para eliminar el usuario" class="btn btn-danger delete" value="'. $row['id'] .'"><i class="fa fa-eraser "></i></button></td>';
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
  
            /*======================================================================================================================*/
    /*VALIDAR PASSWORD!*/
    /*======================================================================================================================*/
    public function validarPasswordModelo($mailweb,$pass,$cuartelID){
            
        $UsuarioNombre = strtoupper($mailweb);
        $pass = base64_encode($pass);
        
        $Coneccion = new Conexion();
        
        $strSql  = "SELECT U.id, 
                            U.Nombre , 
                            U.mail, U.pass,
                            U.activo,U.rol,
                            C.Nombre as cuartel, 
                            U.cuartelID
                    FROM  usuarios U
                    Left join cuartel C on C.id = U.cuartelID
                    WHERE mail=:mail
                    AND   pass=:pass
                    AND   cuartelID=:cuartelID
                    AND activo ='SI'
                    LIMIT 1;                    
                    ";
        // Start the session
        session_start();
        $usuario = ["nombre" =>'', 
                    "id" =>0, 
                    "mail"=>'', 
                    "activo"=>'NO',
                    "rol"=>0,
                    "cuartel"=>'',
                    "cuartelId"=>0
                    ];
        $_SESSION["usuario"] = $usuario ;
        try{
            $stmt = $Coneccion->DBConect()->prepare($strSql);
            $stmt ->bindParam(":mail",$mailweb ,PDO::PARAM_STR);
            $stmt ->bindParam(":pass",$pass ,PDO::PARAM_STR);
            $stmt ->bindParam(":cuartelID",$cuartelID ,PDO::PARAM_INT);
            $elDato = '0';
            $stmt ->execute();       
        }
        catch(Throwable $e) {
            $trace = $e->getTrace();
            $elDato=  $e->getMessage().' en '.$e->getFile().' en la linea '.$e->getLine().' llamado desde '.$trace[0]['file'].' on line '.$trace[0]['line'];
        }
        $registro = $stmt ->fetchAll();      
        if ($registro) {
           /* obtener los valores */
            foreach( $registro  as $row ) {
                  $usuario = ["nombre" =>$row["Nombre"], 
                    "id" =>$row["id"], 
                    "mail"=>$row["mail"], 
                    "activo"=>$row["activo"],
                    "rol"=>$row["rol"],
                    "cuartel"=>$row["cuartel"],
                    "cuartelID"=>$row["cuartelID"]
                   ];
                
            } 
            $_SESSION["usuario"] = $usuario ;
            $elDato= 'vistas/panel.php?controlador=panel'; //COINCIDEN LAS CLAVES!    
        } 
        return $elDato   ;  
        $Coneccion= null ;
    }
     public function TraerPass($mail){
        
        $Coneccion = new Conexion();
        echo $mail;
        $strSql  = "SELECT U.id,U.pass, U.mail  FROM  usuarios U WHERE U.mail=:mail LIMIT 1;";
        $elDato = array();
        try{
            $stmt = $Coneccion->DBConect()->prepare($strSql);
            $stmt ->bindParam(":mail",$mail ,PDO::PARAM_STR);
            $elDato = '0';
            $stmt ->execute();       
        }
        catch(Throwable $e) {
            $trace = $e->getTrace();
            $registro =  $e->getMessage().' en '.$e->getFile().' en la linea '.$e->getLine().' llamado desde '.$trace[0]['file'].' on line '.$trace[0]['line'];
            return $elDato;  
            exit();
        }
        
        $registro = $stmt ->fetchAll();      
        $pass='';
        if ($registro) {
           /* obtener los valores */
            foreach( $registro  as $row ) {
                 $pass = base64_decode($row["pass"]);   
            }
        } 
        if($pass==''){return 'NO SE ENCONTRO EL PASSWORD O EL USUARIO, envie un mail con sus datos a info@bmp51.com';exit();}
        
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $from = "noresponder@bmp51.com";
        $to = $mail;
        $subject = "SOFTWARE BMP 51/3 MATEPEL - Su Pedido de Pass";
        $message = "UD. A pedido el reenvio de su password, el mismo es:" . $pass ."  ahora puede ingresar con su mail y password en www.bmp51.com ";
        $message = $message . "";
        $headers = "Desde:" . $from;
     
        mail($to,$subject,$message, $headers);
        $mensajeEnviado= "El mensaje fue enviado exitosamente, revise su casilla de correo";
        
        
        return $mensajeEnviado;  
        $Coneccion= null ;
    }
    
    public function UserEdit($nombre,$pass,$id){
        
        $Coneccion = new Conexion();
        $pass = base64_encode($pass);
        $strSql  = "Update  usuarios set nombre=:nombre,pass=:pass where id=:id;";
        $elDato = array();
        try{
            $stmt = $Coneccion->DBConect()->prepare($strSql);
            $stmt ->bindParam(":nombre",$nombre ,PDO::PARAM_STR);
            $stmt ->bindParam(":pass",$pass ,PDO::PARAM_STR);
            $stmt ->bindParam(":id",$id ,PDO::PARAM_INT);
            
            $elDato = '0';
            $stmt ->execute();       
        }
        catch(Throwable $e) {
            $trace = $e->getTrace();
            $registro =  $e->getMessage().' en '.$e->getFile().' en la linea '.$e->getLine().' llamado desde '.$trace[0]['file'].' on line '.$trace[0]['line'];
            return $elDato;  
            exit();
        }
        
       
        session_start();
        $usuario = ["nombre" =>$nombre];
        $_SESSION["usuario"] = $usuario ;
        
        
        ini_set( 'display_errors', 1 );
        error_reporting( E_ALL );
        $from = "noresponder@bmp51.com";
        $to = "dieghard@gmail.com";
        $subject = "SOFTWARE BMP 51/3 MATEPEL -EL USUARIO:" . $nombre . " a editado sus datos" ;
        $message = "CAMBIO DE DATOS PARA EL USER:" .  $nombre ;
        $message = $message . "";
        $headers = "Desde:" . $from;
        mail($to,$subject,$message, $headers);
 
        $elDato ="1";
        return $elDato ;  
        
        $Coneccion= null ;
    }
    
 }
