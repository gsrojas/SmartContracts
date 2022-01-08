<?php
//se inseta la condicion

  if(!isset($_SESSION["k_username"])){
        header("Location: index.php");
    }

		 $uid = isset($_SESSION["k_userId"]) ? $_SESSION["k_userId"] : '0'; 
		 $formMsg = isset($_SESSION['qform']['formMsg']) ? $_SESSION['qform']['formMsg'] : '';
		 $_SESSION['qform']['formMsg'] = NULL;

		 	
		$fname = sanitize($_POST['fname']);
		$fdesc = sanitize($_POST['fdescripcion']);
		$tipolic = sanitize($_POST['tlicitacion']);
		$fpub = sanitize($_POST['fpublicacion']);
		$lugar   = sanitize($_POST['flugar']);
		$fdepto   = sanitize($_POST['deptosol']);
		
		
				
		 $query = "update cnt_licitaciones_h set 
 		 nombre= '$fname',
		 descripcion = '$fdesc',
		 creado_por = '$uid',
		 estatus = 'EN PROCESO',
		 tipo_licitacion = '$tipolic',
		 depto_solicitante = '$fdepto',
		 lugar_servicio = '$lugar'
		 where id_licitacion = $pobjid
		 ";
		
        mysqli_query($conn,$query);

         
		/*registro de log*/
		require "obj_reg_log.php";
		$reg_log = new obj_reg_log();
		$reg_log->setTipoLog("ACTLIC");
		$reg_log->setUsuarioDestino($uid);
		$reg_log->setDescripcion("Se actualizo la licitacion");
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
								  se actualizo la licitación correctamente.
						  </div>

                            <div class="card-body">
                                 <button type="submit" class="btn btn-success btn-sm">Regresar</button>
                            </div>
						</div>
					</div>	
				</div>		
	</form>					  






