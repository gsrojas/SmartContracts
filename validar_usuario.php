<?php
	session_start();
	session_regenerate_id(true); 
	include ('inc_db_con.php');
	
	//error_reporting(E_ALL);
	
	function quitar($mensaje)
	{
		$nopermitidos = array("'",'\\','<','>',"\"");
		$mensaje = str_replace($nopermitidos, "", $mensaje);
		return $mensaje;
	}
	
  function sanitize($mensaje)
	{
		$nopermitidos = array("'",'\\','<','>',"\"");
		$mensaje = str_replace($nopermitidos, "", $mensaje);
		if(strlen($mensaje) == 0)
			return null;
		else
			return $mensaje;
	}

  if(trim($_POST["usuario"]) != "" && trim($_POST["clave"]) != "")
	{
		$usuario = sanitize(strtolower(htmlentities($_POST["usuario"], ENT_QUOTES)));
		//$password = $_POST["clave"];
		$password= md5(sanitize($_POST["clave"]));
		
		$result = mysqli_query($conn,'SELECT  id_usuario, nombre, clave,tipo_usuario  from cnt_cat_usuarios WHERE nombre=\''.$usuario.'\'');

 		if($row = mysqli_fetch_array($result))
		  {
			if($row['clave'] == $password)
				{
				    //se alimentan los datos del usuario en la sesion
					$_SESSION["k_username"]    = $row['nombre'];
					$_SESSION["k_userId"]      = $row['id_usuario'];
					// Login exitoso
					$sessionVal   = session_id();
					$userId       = $row['id_usuario'];
					//$permiso      = $row['Permisos'];
					$name         = $row['Nombre'];
					$tipoUsuario  = $row['tipo_usuario'];

					//$insertSessionQuery = "insert into sesiones (sessionVal,usernameId) values ('".$sessionVal."',".$userId.")";	
					//mysql_query($insertSessionQuery);
					$smessageError = 'Bienvenid@, ' .$nombre;
				    $Validation  ='OK';
			   }
			    else
			   {
					//redirecciona al index pero con el mensaje del error de logueo
					$smessageError = 'Verifique que su usuario y clave sean correctos.' .$password .'---' .$row['clave'];
				    $Validation  ='FAIL';
			   }
		}
	else
		{
			// 'Usuario no existente en la base de datos';
				$smessageError ='Verifique que su usuario y clave sean correctos.';
				$Validation  ='FAIL';
		}
		//mysql_free_result($result);
	}
	else //if campos vacios principal
	{
			//'Debe especificar un usuario y password';
			$smessageError = 'Debe escribir su usuario(Correo Electr&oacute;nico) y clave.';
			$Validation  ='FAIL';
	}
	$_SESSION['svalidation']   = $Validation;	
	$_SESSION['loginMsg'] = $smessageError;	
	//mysql_close();
	
	if($Validation == 'OK'){
		header("Location: index.php");
	}else{
		header("Location: login.php");
	}

?>



