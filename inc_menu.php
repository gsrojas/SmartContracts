   <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">

					<?php
                         //menu generico no logueado
                      if($arreglo[1] == "L")//usuario administrador de la aplicacion
                       {
                    ?>

                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="index.php?pform=inicio" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Licitaciones</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="index.php?pform=licitaciones" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Listado </span></a></li>
                                <li class="sidebar-item"><a href="index.php?pform=registroli" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Registrar </span></a></li>
                            </ul>
                        </li>
					    
						 <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-move-resize-variant"></i><span class="hide-menu">Licitantes </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="index.php?pform=emppend" class="sidebar-link"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> Registro Pendiente </span></a></li>
								<li class="sidebar-item"><a href="index.php?pform=licsolpend" class="sidebar-link"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> Licitaciones Solicitadas </span></a></li>
                                <li class="sidebar-item"><a href="index.php?pform=regemp" class="sidebar-link"><i class="mdi mdi-multiplication-box"></i><span class="hide-menu"> Organizaciones </span></a></li>
                            </ul>
                        </li>

						 <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-move-resize-variant"></i><span class="hide-menu">Administracion </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="index.php?pform=HANDLER" class="sidebar-link"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> Motor eventos </span></a></li>
                            </ul>
                        </li>
						<?php
						  }
						?>

						<?php
                         //menu generico no logueado
                      if($arreglo[1] == "O")//usuario organizacion de la aplicacion
                       {
                         ?>

	                    <ul id="sidebarnav" class="p-t-30">
    	                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="index.php?pform=inicio" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Licitaciones</span></a>
        	                    <ul aria-expanded="false" class="collapse  first-level">
            	                    <li class="sidebar-item"><a href="index.php?pform=licitaciones" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Listado </span></a></li>
                    	        </ul>
                        	</li>
					    
						<?php
						  }
						?>
					
					  <?php
                         //menu generico no logueado
                      if($arreglo[1] == "")//usuario organizacion de la aplicacion
                       {
                         ?>

	                    <ul id="sidebarnav" class="p-t-30">
    	                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="index.php?pform=inicio" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Licitaciones</span></a>
        	                    <ul aria-expanded="false" class="collapse  first-level">
            	                    <li class="sidebar-item"><a href="index.php?pform=licitaciones" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Listado </span></a></li>
                    	        </ul>
                        	</li>
					    
						<?php
						  }
						?>



                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"><?php echo $p_titulo   ?></h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->