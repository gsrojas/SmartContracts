<?php
//se inseta la condicion

  if(!isset($_SESSION["k_username"])){
        header("Location: index.php");
    }

		 $uid = isset($_SESSION["k_userId"]) ? $_SESSION["k_userId"] : '0'; 
		 $formMsg = isset($_SESSION['qform']['formMsg']) ? $_SESSION['qform']['formMsg'] : '';
		 $_SESSION['qform']['formMsg'] = NULL;

		 	
		$fname = sanitize($_POST['fname']);
		$fdesc = sanitize($_POST['fdesc']);
		$tipolic = sanitize($_POST['tipolic']);
		$fpub = sanitize($_POST['fpub']);
		$lugar   = sanitize($_POST['lugar']);
		$fdepto   = sanitize($_POST['fdepto']);
		
		
				
		 $query = "INSERT INTO cnt_licitaciones_h (nombre, descripcion, creado_por, estatus, tipo_licitacion, depto_solicitante, fecha_publicacion, lugar_servicio) VALUES (
 		 '$fname',
		 '$fdesc',
		 '$uid',
		 'EN PROCESO',
		 '$tipolic',
		 '$fdepto',
		 '$fpub',
		 '$lugar'
		  )";
		
		
		
        mysqli_query($conn,$query);

         
		/*registro de log*/
		require "obj_reg_log.php";
		$reg_log = new obj_reg_log();
		$reg_log->setTipoLog("REGLIC");
		$reg_log->setUsuarioDestino($uid);
		$reg_log->setDescripcion("se registro una nueva licitacion");
		$reg_log->registerLog();



    function sanitize($mensaje)
	{
		$nopermitidos = array("'",'\\','<','>',"\"");
		$mensaje_s = str_replace($nopermitidos, "", $mensaje);
		if(!is_array($mensaje))
 	{
			if(strlen($mensaje) == 0)
				return $mensaje;
			else
				return $mensaje_s;
		}else{
			return $mensaje;
		}
	}


?>
  <form class="form-horizontal" name="" method="post" action="index.php">
				 <div class="row">
                    <div class="col-12">
                        <div class="card">
						  <div class="alert alert-success" role="alert">
								  se registro una nueva licitación correctamente.
						  </div>

                            <div class="card-body">
                                 <button type="submit" class="btn btn-success btn-sm">Regresar</button>
                            </div>
						</div>
					</div>	
				</div>		
	</form>					  






