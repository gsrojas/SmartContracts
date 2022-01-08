 <div class="col-md-6">
<div class="card">
                            <div class="card-body">
                           <h4 class="card-title m-b-0">Cambios Recientes</h4>
                            </div>
      
	                        <ul class="list-style-none">
									<?php
								    $frmact = 'frmlog';
									$consulta = "SELECT id_log, tipo, descripcion, 
									YEAR(fecha_creacion) AS 'year', 
									case MONTH(fecha_creacion) 
									when 1 then 'Enero'
									when 2 then 'Febrero'
									when 3 then 'Marzo'
									when 4 then 'Abril'
									when 5 then 'Mayo'
									when 6 then 'Junio'
									when 7 then 'Julio'
									when 8 then 'Agosto'
									when 9 then 'Septiembre'
									when 10 then 'Octubre'
									when 11 then 'Noviembre'
									when 12 then 'Diciembre'
									else 'sm'
									end AS month , 
									DAY(fecha_creacion) as day, 
									creado_por, id_usuario, estatus
									FROM  cnt_log_actividades
									order by 1 desc limit 8";
									
								   $res = mysqli_query($conn,$consulta);
								   while($f = $res->fetch_object())
								   {
									   if($f->tipo =="REGSOL")
									   {
									     $icon_v = 'fa-check-circle';
									   }
									   else if($f->tipo =="REGLIC")
									   {
									     $icon_v = 'fa-plus';
									   }
								      else
									  {
									     $icon_v = 'fa-gift';
									  }
									
									echo '<li class="d-flex no-block card-body">';
	                                echo '<i class="fa ' .$icon_v. ' w-30px m-t-5"></i>';
                                    echo '<div>';
                                    echo '<a href="#" class="m-b-0 font-medium p-0"> ' .$f->descripcion.'  </a>';
                                    echo '</div>';
                                    echo '<div class="ml-auto">';
                                    echo '<div class="tetx-right">';
                                    echo '<h5 class="text-muted m-b-0"> ' .$f->day.'  </h5>';
                                    echo '<span class="text-muted font-16"> ' .$f->month.'  </span>';
                                    echo '<hr/></div>';
                                    echo '</div>';
                                    echo '</li>';
								   }								 
								 ?>
								
								
								
                            </ul>
                        </div>
</div>						