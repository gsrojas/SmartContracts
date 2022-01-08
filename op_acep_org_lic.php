<?php
//se cambia el estatus de la solicitud
//se actualiza el estatus de la licitación


  if(!isset($_SESSION["k_username"])){
        header("Location: index.php");
    }

		 $uid = isset($_SESSION["k_userId"]) ? $_SESSION["k_userId"] : '0'; 
		 $formMsg = isset($_SESSION['qform']['formMsg']) ? $_SESSION['qform']['formMsg'] : '';
		$_SESSION['qform']['formMsg'] = NULL;

		 		
		 $query = "UPDATE cnt_op_lic_organizacion SET  
 		 estatus ='ACEPTADA',
		 id_us_acepta = '$uid'
		 where id_lic_org = $pobjid";
		
		
        mysqli_query($conn,$query);


		/*registro de log*/
		require "obj_reg_log.php";
		$reg_log = new obj_reg_log();
		$reg_log->setTipoLog("ACEPTSOL");
		$reg_log->setUsuarioDestino($uid);
		$reg_log->setDescripcion("Se ha aceptado la solicitud de participación en la licitación #: .$pobjid");
		$reg_log->registerLog();


?>
  <form class="form-horizontal" name="" method="post" action="index.php">
				 <div class="row">
                    <div class="col-12">
                        <div class="card">
						  <div class="alert alert-success" role="alert">
								  la solicitud #: <?php echo $pobjid; ?> ha sido aceptada.
						  </div>

                            <div class="card-body">
                                 <button type="submit" class="btn btn-success btn-sm">Regresar</button>
                            </div>
						</div>
					</div>	
				</div>		
	</form>					  






