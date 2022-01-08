<?php

  	     include ('inc_db_con.php');
		 /*	
		 $iod =  sanitize($_POST['iod']);
		 $uacl = sanitize($_POST['uacl']);
	     */	
		 $iod= $_GET["iod"];
		 $uacl = sanitize($_POST['uacl']);
		 
				
		 $query = "update cnt_op_inv_paquetes set estatus = 'SOLICITADO' where id_inv_paquete = $iod and estatus = 'PENDIENTE'";
         mysqli_query($conn,$query);

          
		 
		require "obj_reg_log.php";
		$reg_log = new obj_reg_log();
		$reg_log->setTipoLog("SOLPAQ");
		$reg_log->setUsuarioDestino($uacl);
		$reg_log->setDescripcion("Se Solicito el paquete de materiales #=" .$iod);
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
						  <div >
								  Se registro la solicitud del material correctamente.
						  </div>
  </form>					  






