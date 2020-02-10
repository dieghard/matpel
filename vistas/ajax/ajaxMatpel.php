<?php


    class AjaxMatpel{
      
        public function __construct(){
           require_once '../../controladores/matpelController.php';
           require_once '../../modelos/matpelModel.php';

            
           }    
         public function llenarGrilla($filtro ){
                       
            $MatpelModel = new MatpelModelo();
            $respuesta = $MatpelModel->llenarGrilla($filtro); 
            echo $respuesta;
            $MatpelModel = null;
        }

           public function Modificar($data){
            $MatpelModel = new MatpelModelo();
            $respuesta= $MatpelModel ->Modificar($data);    
            echo $respuesta;
            
        }   
        
        public function Agregar($data){
            $MatpelModel = new MatpelModelo(); 
            $respuesta= $MatpelModel->Agregar($data);    
            echo $respuesta;
        }
        public function Eliminar($data){
            $MatpelModel = new MatpelModelo(); 
            $respuesta= $MatpelModel->Eliminar($data);    
            echo $respuesta;
        }
    }
    
    
    $ajaxMatpel = new AjaxMatpel();
  
    
    
    $data =[];
    if($_POST['ACTION']=='eliminar'){
        llenardata ($data);
        $ajaxMatpel->Eliminar($data)    ;
    } 
   
    if($_POST['ACTION']=='modificar') {
        llenardata ($data);
        
        $ajaxMatpel->Modificar($data);
        
    }
    if($_POST['ACTION']=='nuevo') {
        llenardata ($data);
        $ajaxMatpel->Agregar($data);
    }
    
              
    if ($_POST['ACTION'] == 'llenarGrilla'){
        $filtro = ["nProducto"=>  $_POST["nProducto"] ,
                    "nCas"=>  $_POST["nCas"],
                    "nombre"=>  $_POST["nombre"],
                    "guiaGRE"=>  $_POST["guiaGRE"]    
              ] ;
        $ajaxMatpel->llenarGrilla($filtro);
        
    }

    
function llenardata(&$data){
     session_start();
    $usuario = $_SESSION["usuario"];
    $usuarioID  = $usuario["id"]  ;
    
    $data['id']= $_POST['elId'];
    $data['nProducto']= $_POST['nProducto'];
    $data['ncas']= $_POST['ncas'];
    $data['guiaGRE']= $_POST['guiaGRE'];
    $data['clase']= $_POST['clase'];
    $data['colorLetra']= $_POST['colorLetra'];
    $data['colorFondo']= $_POST['colorFondo'];
    $data['nombre']= $_POST['nombre'];
    $data['observaciones']= $_POST['observaciones'];
    $data['ruta']= $_POST['ruta'];
    $data['salud']= $_POST['salud'];
    $data['inflamabilidad']= $_POST['inflamabilidad'];
    $data['reactividad']= $_POST['reactividad'];
    $data['riesgoEspecial']= $_POST['riesgoEspecial'];
    $data['valorTotal']= $_POST['valorTotal'];
    $data['usuarioID']= $usuarioID;
   
}
