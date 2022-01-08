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
		$fcompro = sanitize($_POST['fcompro']);
		$pavance = sanitize($_POST['pavance']);
		$objid   = sanitize($_POST['objid']);
		$nmat   = sanitize($_POST['nmat']);
		$tcomp   = sanitize($_POST['tcomp']);
		
				
		 $query = "INSERT INTO cnt_lic_convenios(id_licitacion, nombre, descripcion, fecha_compromiso, porcentaje, estatus,paquetes,tiempo) VALUES (
 		 '$objid',
		 '$fname',
		 '$fdesc',
		 '$fcompro',
		 '$pavance',
		 'EN PROCESO',
		 '$nmat',
		 '$tcomp'
		  )";
		
		
		
        mysqli_query($conn,$query);

         
		/*registro de log*/
		require "obj_reg_log.php";
		$reg_log = new obj_reg_log();
		$reg_log->setTipoLog("REGSOL");
		$reg_log->setUsuarioDestino($uid);
		$reg_log->setDescripcion("se registro nueva condicion para la licitacion #: .$objid");
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
								  se registro una condición  para la licitacion #: <?php echo $objid; ?>.
						  </div>

                            <div class="card-body">
                                 <button type="submit" class="btn btn-success btn-sm">Regresar</button>
                            </div>
						</div>
					</div>	
				</div>		
	</form>					  






