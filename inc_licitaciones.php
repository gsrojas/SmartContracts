						<div class="card">
                            <div class="card-body">
							<h5 class="card-title">Licitaciones</h5>
							<?php
							
							     $uid = isset($_SESSION["k_userId"]) ? $_SESSION["k_userId"] : '0'; 
							    if($arreglo[1] == "")
								{
							?>
							<div class="alert alert-danger" role="alert">
                                 Atención, para poder participar en la licitación, el administrador debe activar su organización.
                                </div>
							<?php
								}
							 ?>

								<div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
											    <th>Detalles</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Fecha Creación</th>
                                                <th>Estatus</th>
												<th>Operaciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										   $frmact = 'frmParticipar';
										   $verdet = 'frmlicDetalle';
										   //inclui solo las campañas a las que no esta asociado
										   $consulta = "SELECT * FROM cnt_licitaciones_h where id_licitacion not in (select id_licitacion from cnt_op_lic_organizacion where id_usuario = $uid)";
										   
										   $res = mysqli_query($conn,$consulta);
										   while($f = $res->fetch_object()){
									       echo '<tr>';
										   echo '<td> <button type="button" class="btn btn-success btn-sm" onclick=frmload("'.$f->id_licitacion.'","' .$verdet .'")>Ver</button> </td>';
										   echo '<td> <a href="#" onclick="alert();" class="link">' .$f->nombre.' </a></td>';
										   echo '<td>' .$f->descripcion.' </td>';
										   echo '<td>' .$f->fecha_creacion.' </td>';
										   echo '<td>' .$f->estatus.' </td>';
										   //si esta activo y es organizacion puede sumarse a la licitación
										   if($arreglo[1] == "O")//usuario administrador de la aplicacion
                     						 {
										       echo '<td> <button type="button" class="btn btn-info btn-sm" onclick=frmload("'.$f->id_licitacion.'","' .$frmact .'")>Participar</button> </td>';
											 }
                                            else
											 {
											   echo '<td>  </td>';
											 }
										   
										   echo '</tr>';
										}
										?>
                                        </tbody>
                                    </table>
                                </div>
 								
                            </div>
                        </div>
						
						<br />
						<br />
						<hr />
						
						<?php
						 if($arreglo[1] == "O")
						  {
						?>
						
						<div class="card">
                            <div class="card-body">
							<h5 class="card-title">Licitaciones Solicitadas / Asignadas </h5>
								<div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Fecha Creación</th>
                                                <th>Estatus Licitación</th>
												<th>Estatus Solicitud</th>
												<th>Operaciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										   $frmact = 'frmactividadDetalle';
										   //inclui solo las campañas a las que no esta asociado
										   $consulta = "SELECT  
														a.id_licitacion,
														a.nombre,
														a.descripcion,
														a.estatus,
														a.fecha_creacion,
														a.tipo_licitacion,
														b.estatus as estatus_sol
														FROM 
														cnt_licitaciones_h  a,
														cnt_op_lic_organizacion b
														where 
														a.id_licitacion = b.id_licitacion
														and b.id_usuario =  $uid";
										   
										   $res = mysqli_query($conn,$consulta);
										   while($fb = $res->fetch_object()){
									       echo '<tr>';
										   echo '<td> <a href="#" onclick="alert();" class="link">' .$fb->nombre.' </a></td>';
										   echo '<td>' .$fb->descripcion.' </td>';
										   echo '<td>' .$fb->fecha_creacion.' </td>';
										   echo '<td>' .$fb->estatus.' </td>';
										   echo '<td>' .$fb->estatus_sol.' </td>';
										   //si esta activo y es organizacion puede sumarse a la licitación
										   
										   if($arreglo[1] == "O" && $fb->estatus_sol  =="ACEPTADA")//usuario administrador de la aplicacion
                     						 {
												      echo '<td> <button type="button" class="btn btn-warning btn-sm" onclick=frmload("'.$fb->id_licitacion.'","' .$frmact .'")>Seguimiento</button> </td>';
											 }
                                            else
											 {
											   echo '<td>  </td>';
											 }
										  
										   echo '</tr>';
										   
										}
										 
										?>
                                        </tbody>
                                    </table>
                                </div>
 								
                            </div>
                        </div>
						
						<?php
						}
						?>
						
						