<?php

  require "database_connection.php";
 
// se declara el objeto
class obj_reg_log 
{

   public $stipo;
   public $descripcion;
   public $fecha_creacion;
   public $creado_por;
   public $id_usuario;
   
// constructor de la clase
    function __construct() 
	{
        $this->stipo = 'tipo';
        $this->descripcion = "No definida";
    }

  public function setTipoLog($stipoLog) 
    {
        $this->stipo = $stipoLog;
    }

  public function setDescripcion($desc) 
    {
        $this->descripcion = $desc;
    }

  public function setUsuarioDestino($idUsDestino) 
    {
        $this->id_usuario = $idUsDestino;
    }


  public function setDbCon($dbcon) 
    {
        $this->ocon = $dbcon;
    }


  public function registerLog() 
    {
    	//se arma el query para guardarlo en la base de datos
		$conn = new Database();	
		$link = $conn->connect();	
			
		$query = "INSERT INTO cnt_log_actividades(tipo, descripcion, creado_por,id_usuario) 
		VALUES (
		'$this->stipo',
		'$this->descripcion',
		'0',
		'$this->id_usuario'
		)";
		
   	    mysqli_query($link,$query);	
			
	    return "El registro se guardo correctametne >" . $this->stipo . "< Descripcion: " . $this->descripcion;
    }	

 // destructor de la clase
    function __destruct() {
        echo "cierre de la clase >";
    }

}