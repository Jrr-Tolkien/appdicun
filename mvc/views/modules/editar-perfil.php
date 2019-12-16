<?php
  // session_start();

	if(!$_SESSION["Empresa"]){
		header("location:login");
		exit();
	}
 ?>

 <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
				<br>
				<br>
				<br>
				<br>
				<br>
				<h2>Editar Información del Perfil</h2>
        <p class="lead">Tome en cuenta, alguno datos no se pueden modificar, requieren permisos de los administradores del sitio, la información visualizada en los siguientes campos, se mostrará en el perfil de la empresa en la aplicación.</p>
      </div>
</div>

<div class="container">
  <div class="container-fluid">
		<form role="form" method="post">
      <!-- /.row -->
      <div class="row">
        <div class="col-12">

					<div class="container">
						<?php if ($_GET["action"]== "Datos-Empresa-ok") {

							$resultado = "Dato modificado y guardado con exito!";
							echo '   <br>
											<div class="col-md-12">
											 <div class="alert alert-success alert-dismissible">
												 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
													<h5><i class="icon fa fa-check"></i> ¡Aviso! </h5>'.$resultado.'
													</div>
											</div>';
						}
						$registro = new MvcController();
						$registro -> actualizarEmpresaController();
						?>
					</div>
									<?php
								 $vistaCLientes = new MvcController();
								 $vistaCLientes -> editarEmpresaController();
								 ?>
            <!-- /.card-body -->

        </div>
        </div>
			</form>
      </div><!-- /.row -->
      <!-- ... Your content goes here ... -->
</div>
