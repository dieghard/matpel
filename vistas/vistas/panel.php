
<?php 
    require_once '../controladores/controlador.php';
    $Controlador= new ControladorPlantilla(); 
    /// SI NO ESTA LOGUEADO ARAFUE
    if (!isset($_SESSION["usuario"])){ 
        session_start()  ;
      
        if (isset($_SESSION["usuario"]) ){ 
            
            $usuario = $_SESSION["usuario"];
            $_session_NOMBRE  = $usuario["nombre"]  ;
            $cuartel = $usuario["cuartel"];
            
        }else {
             $newURL='../index.php'; 
                header('Location: '.$newURL);      
       
            }
        
    }else {
         $newURL='../index.php'; 
         header('Location: '.$newURL);
    }
    /** Actual month last day **/
    function _data_last_month_day() { 
      $month = date('m');
      $year = date('Y');
      $day = date("d", mktime(0,0,0, $month+1, 0, $year));
 
      return date('Y-m-d', mktime(0,0,0, $month, $day, $year));
  };
    /** Actual month first day **/
    function _data_first_month_day() {
      $month = date('m');
      $year = date('Y');
      return date('Y-m-d', mktime(0,0,0, $month, 1, $year));
  }
  if (isset($_GET['controlador'])){
        $pagina = $_GET['controlador'];
    }else{
        $newURL='../index.php'; 
        header('Location: '.$newURL);
    }    
?>
<!DOCTYPE html>
<html lang="es">
    
    <!-- /.content-wrapper-->
    <?php include 'hnbf\head.php'; ?>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <?php 
                 
//<!-- Navigation-->
       include 'hnbf/nav.php';
     //LINK A LAS PAGINAS
    
    if ($pagina=='panel' ){
      include 'hnbf/panel.php';
    }
  
    if ($pagina=='usuarios' ){
        
      include 'hnbf/usuarios.php';
    }
    
    else{
       // header('Location: '.$newURL);
    }   
   ?>
  
</body>
<!-- FOOTER-->
    <?php include 'hnbf/footer.php'; ?>
</html>
