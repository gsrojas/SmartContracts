 <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
				
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form class="form-horizontal" method="post" action="index.php?pform=opregCond&objid=<?php echo $pobjid;?>">
							 <input name="objid" id="objid" type="hidden" value="<?php echo $pobjid;?>" />
							 
                                <div class="card-body">
                                    <h4 class="card-title">Registrar Nueva Condición </h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nombre</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" name="fname" placeholder="Inserte el Nombre">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Descripción</label>
                                          <div class="col-sm-9">
                                              <textarea class="form-control" name="fdesc" id="fdesc"></textarea>
                                            </div>
                                     </div>
									 
									 
									  <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Fecha compromiso </label>
                                          <div class="col-sm-9">
												<input type="text" class="form-control mydatepicker" name="fcompro" id="fcompro" placeholder="mm/dd/yyyy">
                                            </div>
                                     </div>
                                    
									 <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Tiempo Compromiso </label>
                                          <div class="col-sm-9">
												<input type="text" class="form-control" name="tcomp" id="tcomp" placeholder="Tiempo Compromiso en Minutos (prueba)">
                                            </div>
                                     </div>
						 
								    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Porcentaje de Avance Solicitado</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="pavance" name="pavance" placeholder="Inserte el Porcentaje">
                                        </div>
                                    </div>
									
									 <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label"># Materiales</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nmat" name="nmat" placeholder="Inserte el número de materiales">
                                        </div>
                                    </div>
									
								 <div class="border-top">
										<div class="card-body">
											<button type="submit" class="btn btn-success">Guardar</button>
											<button type="submit" class="btn btn-danger">Cancelar</button>
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