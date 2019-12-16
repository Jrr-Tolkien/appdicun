<?php  ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Archivos</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home">Home</a></li>
            <li class="breadcrumb-item active">Archivos</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="container">
    <form class="form-horizontal" method="POST" action="ajax/ajax-upload.php" enctype="multipart/form-data">
      <div class="panel panel-info">
        <div class="panel-heading">
          <br><br><br>
          <h4><i class='glyphicon glyphicon-envelope'></i> Subir Arvicho</h4>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <div class="picture-container fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
              <div>
                <input type="file" id="file" name="file" accept="download/*" onchange="upload_image();">
                <input type="hidden" id="file2" name="file2" value=""></span>
                <a class="btns btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
