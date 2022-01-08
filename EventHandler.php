<?php
//se actualiza la informacion de la organizacion 
//en caso contratrio se cancela la solicitud

  if(!isset($_SESSION["k_username"])){
        header("Location: index.php");
    }

		 $uid = isset($_SESSION["k_userId"]) ? $_SESSION["k_userId"] : '0'; 
		 $formMsg = isset($_SESSION['qform']['formMsg']) ? $_SESSION['qform']['formMsg'] : '';
		 $_SESSION['qform']['formMsg'] = NULL;

		 $query = "CALL validaTiempo()";

		if (!mysqli_query($conn,$query)) 
		{
			$Error = "Falló CALL: (" . $mysqli->errno . ") " . $mysqli->error;
		}



?>
  <form class="form-horizontal" name="" method="post" action="index.php">
				 <div class="row">
                    <div class="col-12">
                        <div class="card">
						  <div class="alert alert-success" role="alert">
								  Se ejecuto el motor correctamente <?PHP echo $Error; ?>
						  </div>
						</div>
					</div>	
				</div>		
	</form>					  




