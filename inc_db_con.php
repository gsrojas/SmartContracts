<?php


	$dbhost="localhost";   	     
	$dbusuario="root"; 
	$dbpassword="";  
	$db="contrato_i";     
	
	$servername = "localhost";
	$database = "contrato_i";
	$username = "root";
	$password = "";
  
  
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $database);
  $conn->set_charset("utf8");
  // Check connection

	if (!$conn) {
		  die("Connection failed: " . mysqli_connect_error());
	}

?>