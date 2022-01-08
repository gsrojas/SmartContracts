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

       <form class="form-horizontal" method="post" action="index.php?pform=opactlic&objid=<?php echo $pobjid;?>">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nombre</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" name="fname"    placeholder="Inserte el Nombre"   value="<?php echo $nombre;?>"  >
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Descipción</label>
                                          <div class="col-sm-9">
                                              <textarea class="form-control" id="fdescripcion" name="fdescripcion">  <?php echo $descripcion;?> </textarea>
                                            </div>
                                     </div>
									 
									 
									   <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Tipo de Licitación</label>
                                          <div class="col-sm-9">
                                               <select class="select2 form-control custom-select" id="tlicitacion" name="tlicitacion" style="width: 100%; height:36px;">
                                            <option>Selecionar</option>
                                            <optgroup label="Interna">
											   <option value="departamento" <?php echo ($tipo_licitacion =='departamento' ) ? 'selected' : ''; ?>>Departamento</option> 
											   <option value="Zona" <?php echo ($tipo_licitacion =='Zona' ) ? 'selected' : ''; ?>>Zona</option> 
                                            </optgroup>
                                            <optgroup label="Externa">
											<option value="Servicios" <?php echo ($tipo_licitacion =='Servicios' ) ? 'selected' : ''; ?>>Servicios</option> 
											<option value="Conceciones" <?php echo ($tipo_licitacion =='Conceciones' ) ? 'selected' : ''; ?>>Conceciones</option> 
											<option value="Otros" <?php echo ($tipo_licitacion =='Otros' ) ? 'selected' : ''; ?>>Otros</option> 
                                            </optgroup>
                                        </select>
                                            </div>
                                     </div>
									 
									  <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Fecha Publicación</label>
                                          <div class="col-sm-9">
												<input type="text" class="form-control mydatepicker" name="fpublicacion" placeholder="mm/dd/yyyy" id="fpublicacion"   value="<?php echo $fecha_publicacion;?>" >
                                            </div>
                                     </div>
                                    
								  <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Lugar del Servicio</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="flugar" name="flugar" placeholder="Inserte el Lugar" value="<?php echo $lugar_servicio;?>">
                                        </div>
                                    </div>
								   <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Depto Solicitante</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="deptosol" name="deptosol" placeholder="Inserte el Departamento"    value="<?php echo $depto_solicitante;?>">
                                        </div>
                                    </div>
								 <div class="border-top">
										<div class="card-body">
											<?php
											if(isset($_SESSION["k_username"]))
											{
												if($arreglo[1] == "L")//usuario administrador de la aplicacion
											     {
												   echo '<button type="submit" class="btn btn-success">Guardar</button>';
												}
											}
											?>			
											
											<button type="button" class="btn btn-info" onclick="ReturnHome();">Regresar</button>
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
						<th>Porcentaje Cumplimiento</th>
						<th># Paquetes</th>
						<th>Estatus</th>
						<th>Tiempo </th>
						<th>Tiempo transcurrido</th>
						<th>Estatus por Tiempo</th>
						<th>Avance</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
				   
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
								FROM cnt_lic_convenios
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
				   echo '<td>' .$f->paquetes.' </td>';
				   echo '<td>' .$f->estatus.' </td>';
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

 </form>




