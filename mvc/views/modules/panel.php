<?php

//session_start();

if(!$_SESSION["Empresa"]){
  header("location:login");
  exit();
}
?>

    <!-- <header>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
          </a>
        </div>
      </div>
    </header> -->

      <div class="container">
          <div class="jumbotron text-center" class="container" style="background-image: url('images/image_empresas/defauld-imagen.jpg');">
          </div>
            <div class="jumbotron text-center" class="container" style="background-image: url('images/image_empresas/defauld-imagen.jpg');">
                <div class="login100-form-avatar">
                <img href="" src="images/logo_empresas/logo_default.png" style="max-width:10%;width:auto;height:auto;" alt="AVATAR">
                </div>
                <h1 class="jumbotron-heading">  <?php echo $_SESSION["Empresa"]; ?></h3></h1>
                <p>
                  <a href="#" type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#modalEmpresaPublic">Agregar Anuncio Publicitario</a>
                </p>
            </div>
        </div>

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="card-header">
            <h3 class="card-title">Lista de Anuncions Publicados </h3>
            <div class="card-tools">
              <td><p>_________________________________________________________</p>
              </td>
            </div>
          </div>

          <?php
                  if ($_GET["action"] == "anuncio-ok") {
                      $mensaje = "Archivo cargado y guardado con exito!!";
                       echo ' <div class="alert alert-success alert-dismissible">
                               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                               <h5><i class="icon fa fa-check"></i> Alert!</h5>
                               '.$mensaje.'
                              </div>';
                  }else if (($_GET["action"] == "anuncio-error")) {
                      $mensaje = "Error al guardar los datos en la Base de datos";
                        echo ' <div class="alert alert-danger alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h5><i class="icon fa fa-ban"></i> ¡Error! </h5>
                                  '.$mensaje.'
                                </div>';
                  }
                 ?>
          <div class="row">
            <?php
             $crearAnuncio = new MvcController();
             $crearAnuncio -> vistaPublicacionesEmpresaController();
            ?>
          </div>
        </div>
      </div>

      <!-- Modal para agregar imagenes
      ================================================== -->
      <!-- Aquí va el modal -->
      <div id="modalEmpresaPublic" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="POST" action="ajax/ajax-upload.php" enctype="multipart/form-data">

              <div class="modal-header" style="background: #0e2f44; color:white" align="center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar Usuarios</h4>
              </div>

              <div class="modal-body">
                <div class="box-body">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-control input-lg" id="nombre_Public" name="Nombre_Publicacion" placeholder="Nombre o Título del Anuncio" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i>¢</i></span>
                      <input type="text" class="form-control input-lg" id="precio_Public" name="Precio_Publicacion" placeholder="Precio del Articulo o Servicio"  required>
                      <span class="input-group-addon">.00</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-font"></i></span>
                      <input type="text" class="form-control input-lg" id="descri_Public" name="Descripcion_Publicacion" placeholder="Descripción del Anuncio" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="panel">SUBIR FOTO</div>
                    <!-- <input type="file" class="nuevaFoto" name="nuevaFoto"> -->
                    <input type="file" id="file" name="file" accept="download/*" onchange="upload_image();">
                    <input type="hidden" id="file2" name="file2" value=""></span>
                    <p class="help-block">Peso máximo de la foto 2 MB</p>
                    <img src="images/Login.png" class="img-thumbnail previsualizar" width="100px">
                  </div>
                </div>
              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Agregar Anuncio</button>
              </div>

            </form>
          </div>
        </div>
      </div>


      <!-- Modal para Editar Las publicaciones
      ================================================== -->
      <!-- Aquí va el modal -->
      <div id="modalEditarPublicaciones" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <form role="form" method="POST" enctype="multipart/form-data">

              <div class="modal-header" style="background: #0e2f44; color:white" align="center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Información del Anuncio</h4>
              </div>

              <div class="modal-body">
                <div class="box-body">

                      <input type="text" hidden="" id="  id_publi" name="Editar_id_Publi" required value="<?php $_POST["id_publi"]?>">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-cont rol input-lg" name="Editar_Nombre_Publicacion" placeholder="Nombre o Título del Anuncio" required value="<?php $respuesta["nomb_publi"]?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i>¢</i></span>  
                      <input type="text" class="form-control input-lg" name="Editar_Precio_Publicacion" placeholder="Precio del Articulo o Servicio" id="precio_Publicacion" required value="<?php $respuesta["precio_publi"] ?>">
                      <span class="input-group-addon">.00</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-font"></i></span>
                      <input type="text" class="form-control input-lg" name="Editar_Descripcion_Publicacion" placeholder="Descripción del Anuncio" required value=" <?php $respuesta["descri_publi"] ?> ">
                    </div>
                  </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="actualizardatos">Guardar Datos</button>
              </div>

              <?php
                $editarAnuncio = new MvcController();
                $editarAnuncio -> editarPublicacionesEmpresaController();
              ?>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
