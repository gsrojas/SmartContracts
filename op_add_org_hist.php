<?php
//se inseta la condicion

  if(!isset($_SESSION["k_username"])){
        header("Location: index.php");
    }

		 $uid = isset($_SESSION["k_userId"]) ? $_SESSION["k_userId"] : '0'; 
		 $formMsg = isset($_SESSION['qform']['formMsg']) ? $_SESSION['qform']['formMsg'] : '';
		 $_SESSION['qform']['formMsg'] = NULL;

		 	
				
		$mproy           = sanitize($_POST['mproy']);
		$mestatusproy    = sanitize($_POST['mestatusproy']);
		$mobservaciones  = sanitize($_POST['mobservaciones']);
		 
		
		 $query = "insert into  cnt_cat_org_histo (id_organizacion,nombre_proy,estauts,observaciones,creado_por) values( 
			 $pobjid,
			 '$mproy',
			 '$mestatusproy',
			 '$mobservaciones',
			 $uid)
    	    ";
		
		mysqli_query($conn,$query);



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
  <form class="form-horizontal" name="" method="post" action="index.php?pform=frmupdemp&objid=<?php echo  $pobjid; ?>">
				 <div class="row">
                    <div class="col-12">
                        <div class="card">
						  <div class="alert alert-success" role="alert">
								  Se actualizo la información de la empresa #: <?php echo  $pobjid; ?>
						  </div>

                            <div class="card-body">
                                 <button type="submit" class="btn btn-success btn-sm">Regresar</button>
                            </div>
						</div>
					</div>	
				</div>		
	</form>					  






