<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<table id="zero_config" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Razón Social</th>
						<th>Tipo Empresa</th>
						<th>RFC</th>
						<th>Email</th>
						<th>Fecha Creación</th>
						<th>Estatus</th>
						<th>Operaciones</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
				   
				   $frmact = 'frmupdemp';
				   $res = mysqli_query($conn,"SELECT id_usuario, estatus, razon_social, tipo_empresa, rfc, rep_legal, telefono, calle, colonia, entidad, cod_postal, calificacion,email,fecha_creacion FROM cnt_cat_usuarios where tipo_usuario is null");
				   while($f = $res->fetch_object()){
				   echo '<tr>';
				   echo '<td> <a href="#" onclick="alert(.$f->id_usuario);" class="link">' .$f->razon_social.' </a></td>';
				   echo '<td>' .$f->tipo_empresa.' </td>';
				   echo '<td>' .$f->rfc.' </td>';
				   echo '<td>' .$f->email.' </td>';
				   echo '<td>' .$f->fecha_creacion.' </td>';
				   echo '<td>' .$f->estatus.' </td>';
   			       echo '<td> <button type="button" class="btn btn-info btn-sm" onclick=frmload("'.$f->id_usuario.'","' .$frmact .'")>Autorizar</button> </td>';
				   echo '</tr>';
				}
				?>
				</tbody>
			</table>
		</div>

	</div>
</div>


