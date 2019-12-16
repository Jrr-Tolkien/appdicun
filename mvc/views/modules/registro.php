<?php

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registro</title>
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

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/img-01.jpg');">
			<div class="container">
        <div class="row">
				<form method="post" role="from" class="login100-form validate-form">


					<span class="login100-form-title p-t-20 p-b-45">
						REGISTRO
					</span>

              <div class="col-sm-4">
                <span class="login100-form-title p-t-10 p-b-20">
                  Datos de la Empresa
                </span>

                <div class="wrap-input100 validate-input m-b-10" data-validate = "EL nombre es requerido">
                  <input class="input100" type="text" name="Nombre_Empresa" placeholder="Nombre de la Empresa"
                          title="Letras y números. Tamaño mínimo: 1. Tamaño máximo: 40" minlength="1" maxlength="40" id="nom_EmpRegistro" >
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                    <i class="fa fa-building"></i>
                  </span>
                </div>

                <div class="wrap-input100 validate-input m-b-10" data-validate = "Se requiere el email">
                  <input class="input100" type="email" name="Email_Empresa" placeholder="Email" id="email_EmpRegistro"
                  title="ingrese el email en minusculas y mantener el formato correcto" >
                  <span class="focus-input100"></span>
                  <span class="symbol-input100" class="input-group-addon">
                    <i class="fa fa-at"></i>
                  </span>
                </div>

                <div class="wrap-input100 validate-input m-b-10" data-validate = "Número de Teléfono Requerido">
                  <input class="input100" type="text" name="Numero_Empresa" placeholder="Número de Teléfono" equired pattern="[0-9]{8}"
                          title="Números, Digitos mínimo: 8. Digitos máximo: 11" minlength="8" maxlength="8" id="num_EmpRegistro" >
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                    <i class="fa fa-phone"></i>
                  </span>
                </div>

                <div class="wrap-input100 validate-input m-b-10" data-validate = "si no cuenta otro ingrese 8 '0' ceros">
                  <input class="input100" type="text" name="Numero2_Empresa" placeholder="Otro Número de Teléfono" equired pattern="[0-9]{1,8}" minlength="1" maxlength="8" id="num2_EmpRegistro"
                          title="Si no cuenta con otro numero ingrece un 0, Digitos mínimos: 1. Digitos máximo: 11"   >
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                    <i class="fa fa-phone"></i>
                  </span>
                </div>

                <div class="wrap-input100 validate-input m-b-10" data-validate = "Se requiere el Nombre del Representante ">
                  <input class="input100" type="text" name="Representante_Empresa" placeholder="Representante de la Empresa" equired pattern="[A-Z Ñ?ñ?Á?á?É?é?Í?í?Ó?ó?Ú?ú?Ü?ü?a-z]{1,40}"
                          title="Letras. Tamaño mínimo: 1. Tamaño máximo: 40" minlength="1" maxlength="40" id="repre_EmpRegistro" >
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                    <i class="fa fa-user"></i>
                  </span>
                </div>

              </div>

              <div class="col-sm-4">
                <span class="login100-form-title p-t-10 p-b-20">
                  Localización de la Empresa
                </span>
                <div class="wrap-input100 validate-input m-b-10" data-validate = "EL Pais es requerido">
                  <input class="input100" type="text" name="Pais_Empresa" placeholder="País"
                          title="Letras en Mayusculas. Tamaño mínimo: 2. Tamaño máximo: 40" minlength="2" maxlength="50" id="pais_EmpRegistro" >
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                    <i class="fa fa-location-arrow"></i>
                  </span>
                </div>

                <div class="wrap-input100 validate-input m-b-10" data-validate = "La Provincia es requerido">
                  <input class="input100" type="text" name="Provincia_Empresa" placeholder="Provincia"
                          title="Letras en Mayusculas. Tamaño mínimo: 2. Tamaño máximo: 40" minlength="2" maxlength="50" id="prov_EmpRegistro" >
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                    <i class="fa fa-location-arrow"></i>
                  </span>
                </div>

                <div class="wrap-input100 validate-input m-b-10" data-validate = "EL Canton es requerido">
                  <input class="input100" type="text" name="Canton_Empresa" placeholder="Canton"
                          title="Letras en Mayusculas. Tamaño mínimo: 2. Tamaño máximo: 40" minlength="2" maxlength="50" id="cant_EmpRegistro" >
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                    <i class="fa fa-location-arrow"></i>
                  </span>
                </div>

                <div class="wrap-input100 validate-input m-b-10" data-validate = "EL Distrito es requerido">
                  <input class="input100" type="text" name="Distrito_Empresa" placeholder="Distrito"
                          title="Letras en Mayusculas. Tamaño mínimo: 2. Tamaño máximo: 40" minlength="2" maxlength="50" id="dist_EmpRegistro" >
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                    <i class="fa fa-location-arrow"></i>
                  </span>
                </div>

                <div class="wrap-input100 validate-input m-b-10" data-validate = "La Dirección es requerido">
                  <input class="input100" type="text" name="Direccion_Empresa" placeholder="Dirección"
                          title="Letras en Mayusculas. Tamaño mínimo: 2. Tamaño máximo: 40" minlength="2" maxlength="50" id="dirc_EmpRegistro" >
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                    <i class="fa fa-map-marker"></i>
                  </span>
                </div>

                <div class="wrap-input100 validate-input m-b-10" data-validate = "EL Codigo Postal es requerido">
                  <input class="input100" type="text" name="Codigo_Postal_Empresa" placeholder="Coigo Postal" equired pattern="[0-9,]{5}"
                          title="Codigo Postal, Digitos mínimo: 4. Digitos máximo: 5" minlength="2" maxlength="5" id="codPos_EmpRegistro" >
                  <span class="focus-input100"></span>
                  <span class="symbol-input100">
                    <i class="fa fa-truck"></i>
                  </span>
                </div>
            </div>

            <div class="col-sm-4">
              <span class="login100-form-title p-t-10 p-b-20">
                Geolocalización
              </span>

              <br>
              <br>
              <div class="text-center w-full">
                <a type="button" class="btn btn-primary" href="maps"  target="_blank" class="button"> <h2> Geolocalización</h2> </a>
              </div>
              <br>
              <br>
              <br>
              <div class="wrap-input100 validate-input m-b-10" data-validate = "La Latitud es requerido">
                <input class="input100" type="text" name="Latitud_Empresa" placeholder="Latitud" minlength="2" maxlength="11" id="lat_EmpRegistro" value="9.326214856" >
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                  <i class="fa fa-map-marker"></i>
                </span>
              </div>
              <br>
              <br>
              <br>
              <div class="wrap-input100 validate-input m-b-10" data-validate = "La Longitud es requerido">
                <input class="input100" type="text" name="Longitud_Empresa" placeholder="Longitud" minlength="2" maxlength="11" id="long_EmpRegistro" value="-83.6679777" >
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                  <i class="fa fa-map-marker"></i>
                </span>
              </div>

              <?php $registro = new MvcController();
  						$registro -> registroEmpresaController(); ?>
          </div>


						<div class="container-login100-form-btn p-t-10">
							<input type="submit" class="login100-form-btn" value="Enviar Registro">
						</div>

						<?php
            // $registro1 = new EmailController();
            // $registro1 -> sendEmailSMTP();

            if(isset($_GET["action"])){
              if($_GET["action"]=="registro-empresa-ok"){
                $registro1 = new EmailController();
    						$registro1 -> sendEmailSMTP();
              }else {
                if ($_GET["action"]== "registro-empresa-error") {
                  $resultado = "Error al enviando el correo, por favor intente de nuevo. Error:". $correo->ErrorInfo;
                  echo '                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h5><i class="icon fa fa-ban"></i> ¡Error! </h5>
                                    '.$resultado.'
                                  </div>';
                }
              }
            }
							 ?>
               <div class="text-center w-full p-t-25 p-b-100">
   							<a href="#" class="txt1">

   							</a>
   						</div>

               <div class="text-center w-full">
                 <a class="txt1" href="intro">
                   <i class="fa fa-home"></i>
                   Volver a la Pagina Principal
                   <i class="fa fa-long-arrow-left"></i>
                 </a>
               </div>

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
  <!-- Ingreso de usuario Ajax -->
  <script src="ajax/ingreso-ajax.js"></script>


</body>
</html>
