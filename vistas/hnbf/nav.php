  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="panel.php?controlador=panel"">PANEL MATPEL</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="panel.php?controlador=panel">
                          <i class="fa fa-fw fa-dashboard"></i>
                          <span class="nav-link-text">Panel</span>
                        </a>
                      </li>
                      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                          <i class="fa fa-fw fa-wrench"></i>
                          <span class="nav-link-text">Menu</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents">
                          <li>
                            <a href="panel.php?controlador=panel">Ingreso Matpel</a>
                          </li>
                          <li>
                            <a href="edituser.php">Editar mis Datos</a>
                          </li>
                          <?php if ($usuario["rol"]>1){?>
                                <li>
                                  <a href="panel.php?controlador=usuarios">Ingreso Usuario</a>
                                </li>
                          <?php }?>
                          <?php if ($usuario["rol"]>1){?>
                                <li>
                                    <a href="panel.php?controlador=cuarteles">Ingreso Cuartel</a>
                                </li>
                           <?php }?>     
                        </ul>
                      </li>
            </ul>
            <!-- FLECHA HACIA LA IZQUIERDA -->
            <ul class="navbar-nav sidenav-toggler">
              <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                  <i class="fa fa-fw fa-angle-left"></i>
                </a>
              </li>
            </ul>
            <!-- /////////////////////////////////////////////////-->

        <ul class="navbar-nav ml-center">
            
            <li class="nav-item">
                <a href="edituser.php"> <i class="fa fa-user" style="color:white;"> <?php echo $_session_NOMBRE ;?>  </i></a>
              <i class="fa fa-building" style="color:white;" > <?php echo $cuartel ;?>  </i>
            </li>
        </ul>
        <ul class="navbar-nav ml-right">
            <li class="nav-item">
              <a class="nav-link" href="logout.php?controlador=logout"><i class="fa fa-fw fa-sign-out"></i>Salir</a>
            </li>
        </ul>
    </div>
  </nav>
