<?php

if (isset($_GET['pform'])) 
{
    $pform = $_GET['pform'];
} 
  else 
{
   $pform = 'index';
}

if  ($pform =='licitaciones')
{
    $p_titulo = 'Licitaciones';
    $include ='inc_licitaciones.php';
}
elseif  ($pform =='registroli')
{
     $p_titulo = 'Registrar Nueva Licitación';
     $include ='inc_reg_lic.php';
}

elseif  ($pform =='emppend')
{
     $p_titulo = 'Actualizar Nueva Empresa';
     $include ='emp_list_pen.php';
}

elseif  ($pform =='licsolpend')
{
     $p_titulo = 'Licitaciones Solicitadas';
     $include ='lic_list_sol.php';
}

elseif  ($pform =='frmupdemp') //autorizar empresa
{

     if(isset($_GET['objid']))
	 {
	   $pobjid = $_GET['objid'];
	 } 
     $p_titulo = 'Autorizar Nueva Empresa';
     $include ='inc_reg_empresa.php';
}

elseif  ($pform =='regemp')
{
     $p_titulo = 'Revisar Empresa';
     //$include ='inc_reg_empresa.php';
	 $include ='inc_emp_list_org.php';
}

elseif  ($pform =='frmParticipar') //participar en licitacion
{

     if(isset($_GET['objid']))
	 {
	    $pobjid = $_GET['objid'];
	 } 
     $p_titulo = 'Solicitar Participación en Licitación';
     $include ='op_sol_org_lic.php';
}

elseif  ($pform =='frmAceptaSol') //aceptar la solicitud de la licitacion
{

     if(isset($_GET['objid']))
	 {
	    $pobjid = $_GET['objid'];
	 } 
     $p_titulo = 'Solicitudes de Aceptación de Licitaciones';
     $include ='op_acep_org_lic.php';
}

elseif  ($pform =='frmlicDetalle') //ver el detalle de la licitacion (condiciones
{

     if(isset($_GET['objid']))
	 {
	    $pobjid = $_GET['objid'];
	 } 
     $p_titulo = 'Detalle Licitación #:' .$pobjid;
     $include ='inc_lic_det.php';
}

elseif  ($pform =='frmConditions') //Registrar Nueva Condicion
{

     if(isset($_GET['objid']))
	 {
	    $pobjid = $_GET['objid'];
	 } 
     $p_titulo = 'Agregar Condicion a la Licitación #:' .$pobjid;
     $include ='inc_reg_condiciones.php';
}


elseif  ($pform =='opregCond') //Guardar Nueva Condicion
{

     if(isset($_GET['objid']))
	 {
	    $pobjid = $_GET['objid'];
	 } 
     $p_titulo = 'Guardar Condicion a la Licitación #:' .$pobjid;
     $include ='registraCondicion.php';
}


elseif  ($pform =='opactlic') //Actualizar Licitacion
{

     if(isset($_GET['objid']))
	 {
	    $pobjid = $_GET['objid'];
	 } 
     $p_titulo = 'Actualizar Licitación #:' .$pobjid;
     $include ='actualizalic.php';
}


elseif  ($pform =='opreglic') //Guardar licitacion nueva
{

     $p_titulo = 'Guardar Nueva Licitación' ;
     $include ='guardarlicitacion.php';
}


elseif  ($pform =='updorg') //Guardar Nueva Condicion
{

     if(isset($_GET['objid']))
	 {
	    $pobjid = $_GET['objid'];
	 } 
     $p_titulo = 'Autorizar Organización #:' .$pobjid;
     $include ='op_act_org.php';
}



elseif  ($pform =='frmactividadDetalle') //Guardar Nueva Condicion
{

     if(isset($_GET['objid']))
	 {
	    $pobjid = $_GET['objid'];
	 } 
     $p_titulo = 'Actividades de la licitación #:' .$pobjid;
     $include ='inc_act_det.php';
}
elseif  ($pform =='HANDLER') //Motor eventos
{
     $p_titulo = 'HANDLER';
     $include ='EventHandler.php';
}

elseif  ($pform =='frmaddhistor') //Agregar Historial
{

     if(isset($_GET['objid']))
	 {
	   $pobjid = $_GET['objid'];
	 } 
     $p_titulo = 'Agregar Historial';
     $include ='op_add_org_hist.php';
}

else
{
   $p_titulo = 'Licitaciones';
   $include = 'inc_logoper.php';
}


include 'inc_header.php';
include 'inc_menu.php';
include $include;

include 'inc_footer.php';
?>