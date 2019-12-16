<?php  ?>
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
	<?php $mensaje = "Registro agregado con exito! Click en ir a login";
	echo '
									<div class="alert alert-success alert-dismissible">
										<button type="button" href="registro-usuario-ok" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<h5><i class="icon fa fa-check"></i> ¡Aviso!</h5>
										'.$mensaje.'

								</div>'; ?>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/img-01.jpg');">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form">
					<div class="login100-form-avatar">
						<img src="images/gorilla2.png" alt="AVATAR">
					</div>



					<span class="login100-form-title p-t-20 p-b-45">
						<h3>Se envío un correo electronico a la dirección proporcionada en el registro</h3>
						<br>
						 <h4>Encontrara el nombre de usuario, email asociado y el PASSWORD temporal el cual ingresando al link deverá
						modificar el nuevo password</h4>
					</span>



					<div class="text-center w-full">
						<a class="txt1" href="login">
							Ir al Login
							<i class="fa fa-long-arrow-right"></i>
						</a>

				</form>
			</div>
		</div>

	</div>



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
