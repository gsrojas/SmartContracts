<li class="nav-item dropdown">
	   <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
	
	
<?php
		if(isset($_SESSION["k_username"]))
		{
?>	
		<div class="dropdown-menu dropdown-menu-right user-dd animated">
			<a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> Mi Perfil - <?php echo $arreglo[1];?></a>
			<a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Mensajes</a>
		<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> Config. de la cuenta</a>
		<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>

<?php
       }
	   else
	   {
?>
		<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="login.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Login</a>
		<div class="dropdown-divider"></div>	
<?php
    }
?>		
	</div>
</li>