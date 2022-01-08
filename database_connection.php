<?php
	class Database
	{

	var $host     = "localhost"; //database server
	var $user     = "root"; //database login name
	var $pass     = ""; //database login password
	var $database = "contrato_i"; //database name


	public $link;

    
	public function Database()
	{
		
	}
   
	
	public function connect()
		{
			$this->link = new mysqli($this->host,$this->user,$this->pass,$this->database);
			if (mysqli_connect_error())
			{
				echo mysqli_connect_error();
				exit();
			}
			else
				return $this->link;

		}
	}
	?>