<div class="content-wrapper" id='panel_wrapper'>
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">
          <a href="#">Panel</a>
        </li>
       <!-- <li class="breadcrumb-item active">Mi Panel</li> -->
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
        </div>

      </div>
      
     <!-- Example DataTables Card-->
        <div class="card mb-12">
            <div class="card-header"> 
                <i class="fa fa-table"></i> HOLA!  <?php   echo '<b>'. $_session_NOMBRE.'</b>' ;?> Podes consultar los materiales peligrosos mediante los filtros.   
            </div> 
            <div class="card-header"> 
              <div class="form-group">
                    <i class="fa fa-table"> N° Producto:</i>  
                    <input type="text" id="nProducto" name="nProducto" title='Ingrese el número de producto a buscar' >         
         
                    <i class="fa fa-table"> Nº CAS:</i>  
                    <input type="text" id="nCas" name="nCas" title='Ingrese el número de cas a buscar' >
                    <i class="fa fa-table"> Nº Guia GRE:</i>  
                    <input type="text" id="guiaGRE" name="guiaGRE" title='Ingrese el número de guia GRE a buscar' >
                    <i class="fa fa-table"> Nombre:</i>  
                    <input type="text" id="nombre" name="nombre" title='Ingrese el nombre del matpel a buscar' >
              
              </div>      
              <div class ='row'>
                  <div class='col-4'></div>
                  <div class='col-4'>
                    <button type="button" title="Presione para buscar" class="btn btn-primary " id="Buscar"><i class="fa fa-search"> Buscar</i></button> 
                  </div>
                  <div class='col-4'></div>
               </div>
            </div>
           </div> 
            
            <div id="cartel"></div>  
            <div class='row'>
                <div class ='col-md-6'>
                <button type="button" title="Presione para ingresar uno matpel nuevo" class="btn btn-warning new" id="nuevoMatpel"><i class="fa fa-free-code-camp"> Nuevo</i></button> 
                </div>
            </div>
            <div class='Tablamatpel table-responsive' id='Tablamatpel'>
              
            </div>
        </div>
</div>
    <!-- Edit Modal-->
    <?php include 'modal/panelModal.php'; ?>
    <!-- FIN  Modal-->
    <div class="card-footer small text-muted"></div> >

    <!-- /.container-fluid-->
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- PANEL CON EL JS-->
     <script src="../vistas/js/panel.js"></script>
<!-- Latest compiled and minified CSS -->


<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.js"></script>
<!-- Latest compiled and minified Locales -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/locale/bootstrap-table-zh-CN.min.js"></script>
<!-- CSS DESDE PANEL CSS -->
<link rel="stylesheet" href="../vistas/css/panel.css">
   

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.0/b-1.5.2/b-html5-1.5.2/cr-1.5.0/r-2.2.2/rg-1.0.3/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.css"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.0/b-1.5.2/b-html5-1.5.2/cr-1.5.0/r-2.2.2/rg-1.0.3/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.js"></script>

<!-- ESTO ES PARA LOS CUADROS DE ALERTA ---> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script> 
    <!-- ESTO ES PARA LOS CUADROS DE ALERTA ---> 
