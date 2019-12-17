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
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
            <?php
            $vistaCLientes = new MvcController();
            $vistaCLientes -> vistaPublicacionesTodas();
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
