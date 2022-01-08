<?php
//se inserta el registro para la solicitud
//se pinta el mensaje indicando que se mando la solicitud y se guarda en el log la información

  if(!isset($_SESSION["k_username"])){
        header("Location: index.php");
    }

 $uid = isset($_SESSION["k_userId"]) ? $_SESSION["k_userId"] : '0'; 
 $formMsg = isset($_SESSION['qform']['formMsg']) ? $_SESSION['qform']['formMsg'] : '';
$_SESSION['qform']['formMsg'] = NULL;


        //se obtiene la informacion del registro para mostrarla en los campos
       
    	//se arma el query para guardarlo en la base de datos
 		
		$query = "INSERT INTO cnt_op_lic_organizacion(id_licitacion, id_usuario, estatus)
		VALUES (
		'$pobjid',
		'$uid',
		'SOLICITUD'
		)";
		
        mysqli_query($conn,$query);


		/*registro de log*/
		require "obj_reg_log.php";
		$reg_log = new obj_reg_log();
		$reg_log->setTipoLog("SOLASIG");
		$reg_log->setUsuarioDestino($uid);
		$reg_log->setDescripcion("Solicitud de asignación de la licitación numero .$pobjid");
		$reg_log->registerLog();


?>
  <form class="form-horizontal" name="" method="post" action="index.php">
				 <div class="row">
                    <div class="col-12">
                        <div class="card">
						  <div class="alert alert-success" role="alert">
								  Su solicitud para la licitación #: <?php echo $pobjid; ?> se ha registrado, en breve el administrador evaluará su solicitud.
						  </div>

                            <div class="card-body">
                                 <button type="submit" class="btn btn-success btn-sm">Regresar</button>
                            </div>
						</div>
					</div>	
				</div>		
	</form>					  






