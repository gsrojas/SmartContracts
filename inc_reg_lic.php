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
                            <form class="form-horizontal" name="form" action="index.php?pform=opreglic" method="post">
                                <div class="card-body">
                                   
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nombre</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Inserte el Nombre" name="fname">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Descipción</label>
                                          <div class="col-sm-9">
                                              <textarea class="form-control" name="fdesc"></textarea>
                                            </div>
                                     </div>
									 
									 
									   <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Tipo de Licitación</label>
                                          <div class="col-sm-9">
                                               <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="tipolic">
                                            <option>Selecionar</option>
                                            <optgroup label="Interna">
                                                <option value="departamento">Departamento</option>
                                                <option value="zona">Zona</option>
                                            </optgroup>
                                            <optgroup label="Externa">
                                                <option value="CA">Servicios</option>
                                                <option value="NV">Conceciones</option>
                                                <option value="OR">Otros</option>
                                            </optgroup>
                                        </select>
                                            </div>
                                     </div>
									 
									  <div class="form-group row">
                                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Fecha Publicación</label>
                                          <div class="col-sm-9">
												<input type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy" id="fpub" name="fpub">
                                            </div>
                                     </div>
                                    
								  <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Lugar del Servicio</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="flugar" placeholder="Inserte el Lugar" name="lugar">
                                        </div>
                                    </div>
								   <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Depto Solicitante</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="flugar" placeholder="Inserte el Departamento" name="fdepto">
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