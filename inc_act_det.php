<?php
    if(!isset($_SESSION["k_username"])){
        header("Location: index.php");
    }

 $uid = isset($_SESSION["k_userId"]) ? $_SESSION["k_userId"] : '0'; 
 $formMsg = isset($_SESSION['qform']['formMsg']) ? $_SESSION['qform']['formMsg'] : '';
$_SESSION['qform']['formMsg'] = NULL;


/*registro de log*/
require "obj_reg_log.php";
$reg_log = new obj_reg_log();
$reg_log->setTipoLog("TIPOLOG");
$reg_log->setUsuarioDestino($uid);
$reg_log->setDescripcion("DESCRIPCION QUE SE ASIGNA AL OBJETO");
//$reg_log->registerLog();

        //se obtiene la informacion del registro para mostrarla en los campos
         $idLinea = $pobjid;
        //actualiza una línea existente.
         $update = 1;
	     $query = "SELECT  nombre, descripcion, creado_por, fecha_creacion, estatus, tipo_licitacion, depto_solicitante, fecha_publicacion, lugar_servicio FROM cnt_licitaciones_h WHERE id_licitacion = ".$pobjid;
		 
		 
        $result = mysqli_query($conn,$query);
        if($row = mysqli_fetch_array($result))
		  {
			 $nombre         = isset($row['nombre']) ? $row['nombre'] : '';
			 $fecha_creacion = isset($row['fecha_creacion']) ? $row['fecha_creacion'] : '';
			 $estatus        = isset($row['estatus']) ? $row['estatus'] : '';
			 $descripcion        = isset($row['descripcion']) ? $row['descripcion'] : '';
			 $tipo_licitacion    = isset($row['tipo_licitacion']) ? $row['tipo_licitacion'] : '';
			 $depto_solicitante  = isset($row['depto_solicitante']) ? $row['depto_solicitante'] : '';
			 $fecha_publicacion  = isset($row['fecha_publicacion']) ? $row['fecha_publicacion'] : '';
			 $lugar_servicio     = isset($row['lugar_servicio']) ? $row['lugar_servicio'] : '';
		  }
		
?>



<script>

function ReturnHome()
{
    var url = "index.php?pform=licitaciones";
    window.location.href = url;
	return false;
}

function addNewConditions()
{
    var url = "index.php?pform=frmConditions&objid=<?php echo $pobjid;?>";
	window.location.href = url;
	return false;
}

function add_follow()
{
    var url = "index.php?pform=frmtastfollow&objid=<?php echo $pobjid;?>";
	window.location.href = url;
	return false;
}






</script>

       <form class="form-horizontal" method="post" action="">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nombre</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Inserte el Nombre"   value="<?php echo $nombre;?>"  >
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Descipción</label>
                                          <div class="col-sm-9">
                                              <textarea class="form-control" name="fdescripcion">  <?php echo $descripcion;?> </textarea>
                                            </div>
                                     </div>

								 
                        </div>
                  </div>
              </div>
                <!-- editor -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

<div class="card">
	<div class="card-body">
    	<h5 class="card-title">Condiciones de la Licitación</h5>
		<div class="table-responsive">
			<table id="zero_config" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th># Convenio</th>
						<th>Nombre </th>
						<th>Descripción</th>
						<th>Porcentaje Pactado</th>
						<th>Estatus</th>
						<th>#. Materiales Pendientes</th>
						<th>#. Materiales Usados</th>
						<th>Tiempo Pactado</th>
						<th>Tiempo transcurrido</th>
						<th>Estatus por Tiempo</th>
						<th>Avance</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
				    //aplicar las formulas de los porcentajes
					//hacer la pantalla para agregar materiales, si ya estan completos, quitar el boton
					//capturar los codigos de barras
					//hacer el job y el procedimiento de captura automatica
					
				   $frmact = 'frmAceptaSol';
				   $sqlQuery = "SELECT 
								id_convenio, 
								id_licitacion, 
								fecha_convenio, 
								nombre, 
								descripcion, 
								fecha_compromiso, 
								porcentaje, 
								estatus, 
								orden, 
								aceptado, 
								id_usuario_acep, 
								fecha_aceptacion,
								paquetes,
								tiempo,
								(select count(*) from cnt_op_inv_paquetes
								where 
								estatus = 'PENDIENTE'
								AND  id_convenio = cnt_lic_convenios.id_convenio) as paqpendientes,
								(select count(*) from cnt_op_inv_paquetes
								where 
								estatus = 'SOLICITADO'
								AND  id_convenio = cnt_lic_convenios.id_convenio) as paqsolicitados,
								(select tiempo_transcurrido from cnt_trg_timer_control where id_convenio =  cnt_lic_convenios.id_convenio) as tiempo_transcurrido,
								estatus_tiempo
								FROM  cnt_lic_convenios
								where id_licitacion = $pobjid";
								
								
					
				   $res = mysqli_query($conn,$sqlQuery);
				   while($f = $res->fetch_object()){
				   
				   /*Calculo del porcentaje de avance*/
				     $total = round(($f->paqsolicitados / $f->paquetes) * 100);
				   
				   echo '<tr>';
				   echo '<td>' .$f->id_convenio.' </a></td>';
				   echo '<td>' .$f->nombre.' </a></td>';
				   echo '<td>' .$f->descripcion.' </td>';
				   echo '<td>' .$f->porcentaje.' </td>';
				   echo '<td>' .$f->estatus.' </td>';
				   echo '<td><button type="button" class="btn btn-warning margin-5 text-white openBtn" data-toggle="modal" data-target="#Modal2" data-href="' .$f->id_convenio .'">'.$f->paqpendientes.'</button></td>';
   				   echo '<td><button type="button" class="btn btn-secondary btn-sm">'.$f->paqsolicitados.'</button></td>';
				   echo '<td>' .$f->tiempo.' </td>';
				   echo '<td>' .$f->tiempo_transcurrido.' </td>';
				   echo '<td>' .$f->estatus_tiempo.' </td>';
				   echo '<td> <div class="progress m-t-15"><div class="progress-bar bg-info" role="progressbar" style="width: '.$total.'%" aria-valuenow="'.$total.'" aria-valuemin="0" aria-valuemax="100"></div></div>'.$total.'%</td>';
						   
				   echo '</tr>';
				}
				?>
				</tbody>
			</table>
		</div>

	</div>
</div>
		<div class="border-top">
			<div class="card-body">
										 <?php
											if(isset($_SESSION["k_username"]))
											{
												if($arreglo[1] == "L")//usuario administrador de la aplicacion
											     {
												   echo '<button type="Button" class="btn btn-success" onclick="addNewConditions();">Nueva Condición</button>';
												 }
											}
											?>			



				<button type="button" class="btn btn-info" onclick="ReturnHome();">Regresar</button>
			</div>
		</div>

 						<!-- Modal -->
                                <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Solicitar Paquetes</h5>
		                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->


 </form>




