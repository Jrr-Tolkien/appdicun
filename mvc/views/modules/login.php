<?php


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	</head>
	<body>

		<div class="content">
			<div class="container-login100" style="background-image: url('images/img-01.jpg');">
				<div class="wrap-login100 p-t-190 p-b-30">
					<form method="post" class="login100-form validate-form">
						<div class="login100-form-avatar">

							<img href="intro" src="images/Login.png" alt="AVATAR">
						</div>

						<span class="login100-form-title p-t-20 p-b-45" href="intro">
							AppDicun
						</span>

						<div class="wrap-input100 validate-input m-b-10" data-validate = "Ingrese el email">
							<input class="input100" type="email" name="Email_Empresa" placeholder="Email de la Empresa">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input m-b-10" data-validate = "Password Requerido">
							<input class="input100" type="password" name="Password_Empresa" placeholder="Password">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock"></i>
							</span>
						</div>

						<div class="container-login100-form-btn p-t-10">
							<button class="login100-form-btn">
								Login
							</button>
						</div>
						<?php if(isset($_GET["action"])){
			  			 if($_GET["action"]=="ingreso-empresa-error"){
			  				 $resultado = "Usuario y/o contraseña son incorrectas!";

			  				 echo '
			  				 <div class="col-md-12">
			  					 <div class="card-body">
			  						 <div class="alert alert-danger alert-dismissible">
			  							 <button type="button"  class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  							 <h5><i class="icon fa fa-ban"></i> ¡Error Al Ingresar! </h5>
			  						 		'.$resultado.'
			  						 </div>
			  					 </div>
			  				 </div>';
			  			 }
			  		 } ?>

						<div class="text-center w-full p-t-25 p-b-100">
							<a href="#" class="txt1">
							</a>
						</div>

						<div class="text-center w-full">
							<a class="txt1" href="registro">
								<i class="fa fa-user-plus"></i>
								  Crear Cuenta Gratis
								<i class="fa fa-long-arrow-right"></i>
							</a>
						</div>
						<br>
						<br>
						<div class="text-center w-full">
							<a class="txt1" href="intro">
								<i class="fa fa-user-home"></i>
								  ir a Pagina Principal
								<i class="fa fa-arrow-circle-left"></i>
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>

		<?php
		  $registro = new MvcController();
			$registro -> ingresoEmpresaController();
		?>

		<!--===============================================================================================-->
			<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
		<!--===============================================================================================-->
			<script src="vendor/bootstrap/js/popper.js"></script>
			<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<!--===============================================================================================-->
			<script src="vendor/select2/select2.min.js"></script>
		<!--===============================================================================================-->
			<script src="js/main.js"></script>

	</body>
</html>
