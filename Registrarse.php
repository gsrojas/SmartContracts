<?php
   @session_start();
	$formMsg = isset($_SESSION['qform']['formMsg']) ? $_SESSION['qform']['formMsg'] : '';
	$_SESSION['qform']['formMsg'] = NULL;
	?>

<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Matrix Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style type="text/css">
<!--
.Estilo1 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: 20px;
}
-->
    </style>
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
					 <ul style="color:red; text-decoration:none;">
						<?php echo $formMsg; ?>
						 <br />
						<br />
					</ul>
			   
                  <span class="db"><img src="assets/images/logo-icon.png" alt="logo" width="43" height="40" /> <span class="Estilo1">Contratos Inteligentes</span></span>  </div>
                    <!-- Form -->
                        <form class="col-12" action="registrarusuario.php" method="post">
                        	<div class="row p-b-30">
                              <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>                                    </div>
                                    <input type="text" class="form-control form-control-lg" name="tusuario" placeholder="Nombre de Usuario" aria-label="Nombre de Usuario" aria-describedby="basic-addon1" required>
                                </div>
                                <!-- email -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>                                    </div>
                                    <input type="text" class="form-control form-control-lg"  name="temail" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>                                    </div>
                                    <input type="password" class="form-control form-control-lg" name="tclave" placeholder="Clave" aria-label="Clave" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text bg-info text-white" id="basic-addon2"><i class="ti-pencil"></i></span>                                    
								  	 </div>
                                    <input type="password" class="form-control form-control-lg" name="trclave" placeholder=" Confirmar Clave" aria-label="Confirmar Clave" aria-describedby="basic-addon1" required>
                                </div>

                                <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text bg-info text-white" id="basic-addon2"><i class="ti-hand"></i></span>                                    
								  	 </div>
                                    <input type="text" class="form-control form-control-lg" name="trsocial" placeholder="Razón Social" aria-label="Razón Social" aria-describedby="basic-addon1" required>
                                </div>

                            </div>
                        </div>
                            <div class="row m-t-20 p-t-20 border-top border-secondary">
                                <div class="col-12">
                                    <button class="btn btn-info float-right" type="sumbmit" name="action">Registrarse</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){
        
        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
    </script>
</body>
</html><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
</body>
</html>
