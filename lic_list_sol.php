<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<table id="zero_config" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th># Licitación</th>
						<th>Nombre Licitación</th>
						<th>Descripción Licitación</th>
						<th>Fecha Solicitud</th>
						<th>Organización</th>
						<th>Calificación organización</th>
						<th>Estatus Solicitud</th>
						<th>Operaciones</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
				   
				   $frmact = 'frmAceptaSol';
					
				   $sqlQuery = "SELECT  
					a.id_lic_org,
					a.id_licitacion,
					a.estatus,
					a.fecha_creacion,
					b.nombre,
					b.descripcion,
					c.razon_social,
					c.calificacion
					FROM 
					cnt_op_lic_organizacion a,
					cnt_licitaciones_h      b,
					cnt_cat_usuarios            c
					where 
					a.id_licitacion = b.id_licitacion
					and a.id_usuario  = c.id_usuario
					and a.estatus = 'SOLICITUD'";
					
				   $res = mysqli_query($conn,$sqlQuery);
				   while($f = $res->fetch_object()){
				   echo '<tr>';
				   echo '<td>' .$f->id_licitacion.' </a></td>';
				   echo '<td>' .$f->nombre.' </a></td>';
				   echo '<td>' .$f->descripcion.' </td>';
				   echo '<td>' .$f->fecha_creacion.' </td>';
				   echo '<td>' .$f->razon_social.' </td>';
				   echo '<td>' .$f->calificacion.' </td>';
				   echo '<td>' .$f->estatus.' </td>';
   			       echo '<td> <button type="button" class="btn btn-info btn-sm" onclick=frmload("'.$f->id_lic_org.'","' .$frmact .'")>Autorizar</button> </td>';
				   echo '</tr>';
				}
				?>
				</tbody>
			</table>
		</div>

	</div>
</div>






