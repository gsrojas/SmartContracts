<?php

 
    if(!isset($_SESSION["k_username"])){
        header("Location: index.php");
    }

 $uid = isset($_SESSION["k_userId"]) ? $_SESSION["k_userId"] : '0'; 
 $formMsg = isset($_SESSION['qform']['formMsg']) ? $_SESSION['qform']['formMsg'] : '';
$_SESSION['qform']['formMsg'] = NULL;

/*registro de log*/
require "obj_reg_log.php";
/*
$reg_log = new obj_reg_log();
$reg_log->setTipoLog("TIPOLOG");
$reg_log->setUsuarioDestino($uid);
$reg_log->setDescripcion("DESCRIPCION QUE SE ASIGNA AL OBJETO");
*/
//$reg_log->registerLog();

        //se obtiene la informacion del registro para mostrarla en los campos
         $idLinea = $pobjid;
        //actualiza una línea existente.
         $update = 1;
	     $query = "select * from cnt_cat_usuarios where id_usuario = ".$idLinea;
		 
		 
        $result = mysqli_query($conn,$query);
        if($row = mysqli_fetch_array($result))
		  {
		     $razon_social  = isset($row['razon_social']) ? $row['razon_social'] : '';
			
			 $nombre         = isset($row['nombre']) ? $row['nombre'] : '';
			 $clave          = isset($row['clave']) ? $row['clave'] : '';
			 $fecha_creacion = isset($row['fecha_creacion']) ? $row['fecha_creacion'] : '';
			 $creado_por     = isset($row['creado_por']) ? $row['creado_por'] : '';
			 $estatus        = isset($row['estatus']) ? $row['estatus'] : '';
			 $tipo_usuario   = isset($row['tipo_usuario']) ? $row['tipo_usuario'] : '';

			 $tipo_empresa   = isset($row['tipo_empresa']) ? $row['tipo_empresa'] : '';
			 $rfc            = isset($row['rfc']) ? $row['rfc'] : '';
			 $rep_legal      = isset($row['rep_legal']) ? $row['rep_legal'] : '';
			 $telefono       = isset($row['telefono']) ? $row['telefono'] : '';
			 $calle          = isset($row['calle']) ? $row['calle'] : '';
			 $colonia        = isset($row['colonia']) ? $row['colonia'] : '';
			 $entidad        = isset($row['entidad']) ? $row['entidad'] : '';
			 $cod_postal     = isset($row['cod_postal']) ? $row['cod_postal'] : '';
			 $calificacion   = isset($row['calificacion']) ? $row['calificacion'] : '';
			 $email          = isset($row['email']) ? $row['email'] : '';
		  }
		
?>

<script>

function ReturnHome()
{
    var url = "/index.php?pform=emppend";
    window.location(url);
}

</script>


<div class="container-fluid">
<div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form class="form-horizontal" name="" method="post" action="index.php?pform=updorg&objid=<?php echo $pobjid;?>">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Identificador del Registro </label>
                                        <div class="col-sm-9">  
  										     <input type="text" id="empid" name="empid" class="form-control" placeholder="Registro" disabled="disabled"  value="<?php echo $pobjid;?>"  />
                                        </div>
                                    </div>
									
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tipo de Empresa</label>
                                        <div class="col-sm-9">
                                          <select id="tempresa" name="tempresa" title="Modelo"   class="form-control" placeholder="Tipo">
                                            <option value="-1" <?php echo ($tipo_empresa =='-1' ) ? 'selected' : ''; ?>>- Seleccione el tipo de Empresa -</option>
                                            <option value="Persona Fisica" <?php echo ($tipo_empresa =='Persona Fisica' ) ? 'selected' : ''; ?>>Persona Física</option>
                                            <option value="Persona Moral" <?php echo ($tipo_empresa =='Persona Moral' ) ? 'selected' : ''; ?>>Persona Moral</option>
                                          </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Razón Social</label>
                                        <div class="col-sm-9">   
										   <input type="text" class="form-control" id="rsocial" name="rsocial" placeholder="Inserte la Razón Social" value="<?php echo $razon_social; ?>" />
                                        </div>
                                    </div>
									
									
									 <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">RFC</label>
                                        <div class="col-sm-9">   
										   <input type="text" class="form-control" id="rfc" name="rfc" placeholder="Inserte el RFC" value="<?php echo $rfc; ?>" />
                                        </div>
                                    </div>

								   		<div class="form-group row">
											<label for="fname" class="col-sm-3 text-right control-label col-form-label">Representante legal</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="replegal" name="replegal" placeholder="Representante Legal"  value="<?php echo $rep_legal; ?>"/>
											</div>
										</div>
																																																															   
										<div class="form-group row">																																																																																																																							                                             <label for="ftel" class="col-sm-3 text-right control-label col-form-label">Número de teléfono <small class="text-muted">(999) 999-9999</small></label>
											<div class="col-sm-9">
												<input type="text" class="form-control phone-inputmask" id="ftel" name="ftel" placeholder="Número de Teléfono"    value="<?php echo $telefono; ?>"/>
											</div>
				         				</div>

										<div class="form-group row">
											<label for="fname" class="col-sm-3 text-right control-label col-form-label">Correo Electrónico</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="email" name="email" placeholder="Correo Electrónico"  value="<?php echo $email; ?>"/>
											</div>
										</div>
						
						 
										<!------Direccion------>																																																					   
										 <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Calle</label>
                                        <div class="col-sm-9">   
										   <input type="text" class="form-control" id="calle" name="calle" placeholder="Inserte la Calle" value="<?php echo $calle; ?>" />
                                        </div>
                                    </div>
									
									 <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Colonia</label>
                                        <div class="col-sm-9">   
										   <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Inserte la Colonia" value="<?php echo $colonia; ?>" />
                                        </div>
                                    </div>
									
									 <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Entidad</label>
                                        <div class="col-sm-9">   
													<select id="entidad" name="entidad" class="form-control" placeholder="Inserte la entidad">
													<option value='0' <?php echo ($entidad=='0' ) ? 'selected' : ''; ?>>Ninguno</option>
													<option value='1' <?php echo ($entidad=='1' ) ? 'selected' : ''; ?>>Aguascalientes</option>
													<option value='2' <?php echo ($entidad=='2' ) ? 'selected' : ''; ?>>Baja California</option>
													<option value='3' <?php echo ($entidad=='3' ) ? 'selected' : ''; ?>>Baja California Sur</option>
													<option value='4' <?php echo ($entidad=='4' ) ? 'selected' : ''; ?>>Campeche</option>
													<option value='5' <?php echo ($entidad=='5' ) ? 'selected' : ''; ?>>Coahuila</option>
													<option value='6' <?php echo ($entidad=='6' ) ? 'selected' : ''; ?>>Colima</option>
													<option value='7' <?php echo ($entidad=='7' ) ? 'selected' : ''; ?>>Chiapas</option>
													<option value='8' <?php echo ($entidad=='8' ) ? 'selected' : ''; ?>>Chihuahua</option>
													<option value='9' <?php echo ($entidad=='9' ) ? 'selected' : ''; ?>>Distrito Federal</option>
													<option value='10' <?php echo ($entidad=='10' ) ? 'selected' : ''; ?>>Durango</option>
													<option value='11' <?php echo ($entidad=='11' ) ? 'selected' : ''; ?>>Estado de M&eacute;xico</option>
													<option value='12' <?php echo ($entidad=='12' ) ? 'selected' : ''; ?>>Guanajuato</option>
													<option value='13' <?php echo ($entidad=='13' ) ? 'selected' : ''; ?>>Guerrero</option>
													<option value='14' <?php echo ($entidad=='14' ) ? 'selected' : ''; ?>>Hidalgo</option>
													<option value='15' <?php echo ($entidad=='15' ) ? 'selected' : ''; ?>>Jalisco</option>
													<option value='16' <?php echo ($entidad=='16' ) ? 'selected' : ''; ?>>Michoac&aacute;n</option>
													<option value='17' <?php echo ($entidad=='17' ) ? 'selected' : ''; ?>>Morelos</option>
													<option value='18' <?php echo ($entidad=='18' ) ? 'selected' : ''; ?>>Nayarit</option>
													<option value='19' <?php echo ($entidad=='19' ) ? 'selected' : ''; ?>>Nuevo León</option>
													<option value='20' <?php echo ($entidad=='20' ) ? 'selected' : ''; ?>>Oaxaca</option>
													<option value='21' <?php echo ($entidad=='21' ) ? 'selected' : ''; ?>>Puebla</option>
													<option value='22' <?php echo ($entidad=='22' ) ? 'selected' : ''; ?>>Quer&eacute;taro</option>
													<option value='23' <?php echo ($entidad=='23' ) ? 'selected' : ''; ?>>Quintana Roo</option>
													<option value='24' <?php echo ($entidad=='24' ) ? 'selected' : ''; ?>>San Luis Potos&iacute;</option>
													<option value='25' <?php echo ($entidad=='25' ) ? 'selected' : ''; ?>>Sinaloa</option>
													<option value='26' <?php echo ($entidad=='26' ) ? 'selected' : ''; ?>>Sonora</option>
													<option value='27' <?php echo ($entidad=='27' ) ? 'selected' : ''; ?>>Tabasco</option>
													<option value='28' <?php echo ($entidad=='28' ) ? 'selected' : ''; ?>>Tamaulipas</option>
													<option value='29' <?php echo ($entidad=='29' ) ? 'selected' : ''; ?>>Tlaxcala</option>
													<option value='30' <?php echo ($entidad=='30' ) ? 'selected' : ''; ?>>Veracruz</option>
													<option value='31' <?php echo ($entidad=='31' ) ? 'selected' : ''; ?>>Yucat&aacute;n</option>
													<option value='32' <?php echo ($entidad=='32' ) ? 'selected' : ''; ?>>Zacatecas</option>
												 </select>	
                                        </div>
                                    </div>

									 <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">C. Postal</label>
                                        <div class="col-sm-9">   
										   <input type="text" class="form-control" id="cpostal" name="cpostal" placeholder="Inserte el Código Postal" value="<?php echo $cod_postal; ?>" />
                                        </div>
                                    </div>
							
										<div class="form-group row">
										   <label for="cal" class="col-sm-3 text-right control-label col-form-label">Calificación</label>
											<div class="col-sm-9">
												<input type="text" id="cal" name="cal" class="form-control" placeholder="Calificación"  value="<?php echo $calificacion; ?>" />
		                                        </div>
                                    </div>
								 <div class="border-top">
										<div class="card-body">
											<button type="submit" class="btn btn-success">Activar Empresa</button>
											 
											 <button type="button" class="btn btn-warning margin-5 text-white openBtnhist" data-toggle="modal" data-target="#ModalHist" data-href="<?php echo $pobjid;?>">Agregar Historial</button>
											 
											<a href="index.php?pform=emppend">
											<button type="button" class="btn btn-info">regresar</button>
											</a>
										</div>
                          		 </div>
								
                            </form>
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
			
			
			
			<h4 class="page-title">Historial de Proyectos</h4>
			<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<table id="zero_config" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Proyecto</th>
						<th>Estatus del Proyecto</th>
						<th>Fecha Registro</th>
						<th>Observaciones</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
				   
				   $frmact = 'frmupdemp';
				   $res = mysqli_query($conn,"SELECT id_historial, id_organizacion, estauts, observaciones, fecha_creacion, creado_por, nombre_proy FROM cnt_cat_org_histo WHERE id_organizacion=$pobjid");
				   while($f = $res->fetch_object()){
				   echo '<tr>';
				   echo '<td>' .$f->nombre_proy.' </td>';
				   echo '<td>' .$f->estauts.' </td>';
				   echo '<td>' .$f->fecha_creacion.' </td>';
				   echo '<td>' .$f->observaciones.' </td>';
				   echo '</tr>';
				}
				?>
				</tbody>
			</table>
		</div>

	</div>
</div>
			
			
				<!-- Modal -->
                              <form class="form-horizontal" name="historial" method="post" action="index.php?pform=frmaddhistor&objid=<?php echo $pobjid;?>">
							    <div class="modal fade" id="ModalHist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Agregar Historial</h5>
		                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
	                                                 <div class="form-group">
                                        			    <label>Razón Social</label>
														   <input name="mproy" type="text" class="form-control" id="mproy" maxlength="50" placeholder="Inserte el nombre del proyecto" />
                                   			        </div>
												  
													<div class="form-group">
														<label>Estado del Proyecto </label>
														<input name="mestatusproy" type="text" class="form-control" id="mestatusproy" maxlength="20"  placeholder="Inserte el estatus del proyecto">
													</div>

													<div class="form-group">
														<label>Observaciones Generales</label>
														<textarea name="mobservaciones" cols="30" rows="3" class="form-control" id="mobservaciones" placeholder="Observaciones"></textarea>
													</div>

												  
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Agregar</button>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								</form>
                                <!-- Modal -->