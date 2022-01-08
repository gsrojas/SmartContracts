<?php

	session_start();
	session_regenerate_id(true); 
	include ('inc_db_con.php');


	$username = sanitize($_POST['tusuario']);
	$razon = sanitize($_POST['trsocial']);
	$email = $_POST['temail'];
	$password = sanitize($_POST['tclave']);
	$password2 = sanitize($_POST['trclave']);
	
	$berror = 0;
	$messageError  = "";

	if(strlen($password) == 0 || $password !== $password2){
		 $berror = 1;
		 $messageError = $messageError . "<li>Las contraseñas no coinciden o se encuentran vacías.</li>";
	}
    /*
	$checkemail = mysqli_query($conn,"SELECT email FROM cnt_cat_usuarios WHERE email='$email'");

	$email_exist = mysqli_num_rows($checkemail);

	if ($email_exist > 0)
	{
		$berror = 1;
		$messageError = $messageError .'<li>El correo electrónico ya se encuentra en uso.</li>';
	}
    */

	if ($berror == 0)
	{ 
		$password = md5($password);
        $cdate = date("Y-m-d");
		$query = "INSERT INTO cnt_cat_usuarios(nombre, clave, creado_por, razon_social,email)
		VALUES (
		'$username',
		'$password',
		'0',
		'$razon',
		'$email'
		)";
				
		
		 mysqli_query($conn,$query);
         //$idreturnvalue = $mysqli->insert_id();
		
		//se registra en la tabla para el envio de correo
		//se obtiene la plantilla para el envio
		
		/*
		$splantilla = file_get_contents("plantillas_de_correo/plantillaRegistroUsuarioTabla.html");
		$splantilla = str_replace("&ID",$idreturnvalue ,$splantilla);
		$splantilla = str_replace("&NAME",$username." ".$apaterno." ".$amaterno ,$splantilla);
		$splantilla = str_replace("&EMAIL",$email ,$splantilla);
		
		$queryEmail = "INSERT INTO  op_envia_correo (titulo,para,cuerpo,estatus,tipo,adjunto,fecha_creacion)
		VALUES (
		'Bienvenido',
		'$email',
		 '$splantilla',
		'NEW',
		'REGISTRO',
		'',
		'$cdate'
		)";
				
		mysql_query($queryEmail) or die(mysql_error());
		*/
		echo $query;
		$_SESSION['form'] = NULL;
		$_SESSION['form']['formMsg'] = '<li>El registro se realizó con éxito. Ya puedes accesar al portal con tu correo y contraseña dando clic en menú Ingresar</li>';
		header("Location: Registrarse.php");
	}
	else
	{

		$_SESSION['form'] = $_POST;
		$_SESSION['form']['formMsg'] = $messageError;
		echo $query;
		header("Location: Registrarse.php");
	}

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