<?php
//se inseta la condicion

  if(!isset($_SESSION["k_username"])){
        header("Location: index.php");
    }

		 $uid = isset($_SESSION["k_userId"]) ? $_SESSION["k_userId"] : '0'; 
		 $formMsg = isset($_SESSION['qform']['formMsg']) ? $_SESSION['qform']['formMsg'] : '';
		 $_SESSION['qform']['formMsg'] = NULL;

		 	
				
		//$objid     = sanitize($_POST['objid']);
		$tempresa  = sanitize($_POST['tempresa']);
		$rsocial   = sanitize($_POST['rsocial']);
		$rfc       = sanitize($_POST['rfc']);
		$replegal  = sanitize($_POST['replegal']);
		$ftel      = sanitize($_POST['ftel']);
		$email     = sanitize($_POST['email']);
		$calle     = sanitize($_POST['calle']);
		$colonia   = sanitize($_POST['colonia']);
		$entidad   = sanitize($_POST['entidad']);
		$cpostal   = sanitize($_POST['cpostal']);
		$cal       = sanitize($_POST['cal']);
		
		 $query = "UPDATE cnt_cat_usuarios SET 
			estatus='Nuevo',
			razon_social='$rsocial',
			tipo_empresa='$tempresa',
			rfc='$rfc',
			rep_legal='$replegal',
			telefono='$ftel',
			calle='$calle',
			colonia='$colonia',
			entidad='$entidad',
			cod_postal='$cpostal',
			calificacion='$cal',
			email='$email',
			tipo_usuario='O'
			WHERE id_usuario = $pobjid
    	    ";
		
		mysqli_query($conn,$query);

         
		/*registro de log*/
		require "obj_reg_log.php";
		$reg_log = new obj_reg_log();
		$reg_log->setTipoLog("REGEMP");
		$reg_log->setUsuarioDestino($uid);
		$reg_log->setDescripcion("Se Registro y Actualizo Empresa #: .$pobjid");
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
								  Se actualizo la información de la empresa #: <?php echo $pobjid; ?>
						  </div>

                            <div class="card-body">
                                 <button type="submit" class="btn btn-success btn-sm">Regresar</button>
                            </div>
						</div>
					</div>	
				</div>		
	</form>					  






