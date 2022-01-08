						<div class="card">
                            <div class="card-body">
							<h5 class="card-title">Paquetes Pendientes</h5>
								<div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
											    <th>Detalles</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										   require 'phpqrcode/qrlib.php';
										   include ('inc_db_con.php');
										   
										    $uid = isset($_SESSION["k_userId"]) ? $_SESSION["k_userId"] : '0'; 
										   
											$dir = 'temp/';
											if(!file_exists($dir))
											mkdir($dir);
											$tamanio = 3;
											$level = 'H';
											$frameSize = 1;
										   
											if (isset($_GET['objact'])) 
											{
												$objact = $_GET['objact'];
											} 
											else 
											{
												$objact = 'index';
											}
										   
										   
										   $frmact = 'frmParticipar';
										   $verdet = 'frmlicDetalle';
										   //inclui solo las campañas a las que no esta asociado
										   $consulta = "select id_inv_paquete,no_slot,id_convenio from cnt_op_inv_paquetes where id_convenio = $objact and estatus = 'PENDIENTE'";
										   
										   $res = mysqli_query($conn,$consulta);
										   while($f = $res->fetch_object()){
									       echo '<tr>';
										   echo '<td>';
	 									   $filename = $dir.'test' .$f->id_inv_paquete .'.png';
										   //$contenido = 'localhost/contratos/sol_paq.php?iod=' . $f->id_inv_paquete; //para desarrollo
										   $contenido = 'http://contratos.devxfactory.com/sol_paq.php?iod=' . $f->id_inv_paquete .'&uacl=' .$uid ;
										   QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);
										   echo '<img src="'.$filename.'" />';
										   echo '</td>';
										   echo '<td>' .$f->id_convenio.' </td>';
										   echo '</tr>';
										}
										?>
                                        </tbody>
                                    </table>
                                </div>
 								
                            </div>
                        </div>
						
					
						