<?php
	// session_start();
	// error_reporting(0);

	if(!$_SESSION["Empresa"]){
		header("location:login");
		exit();
	} ?>
	<div id="page-wrapper">
	  <div class="container-fluid">
	    <div class="row">
	      <div class="col-lg-12">
	        <h1 class="page-header">Archivos</h1>
	      </div>
	    </div>
	      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Listado de Archivos</h3>
              <div class="card-tools">
                <td>
                  <a href='upload'>
                  <button type='button' class='btn btn-block btn-primary'>Subir imagenes</button>
                  </a>
                </td>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>NOMBRE</th>
                  <th>RUTA</th>
                  <th>USUARIO</th>
                </tr>
                <?php
                $vistaCLientes = new MvcController();
                $vistaCLientes -> vistaArchivosController();
                 ?>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div><!-- /.row -->
	      <!-- ... Your content goes here ... -->
	  </div>
	</div>
