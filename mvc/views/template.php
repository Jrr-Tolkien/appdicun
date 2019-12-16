<?php
  $enlaces= "intro"; if(isset( $_GET['action'])){
  $enlaces = $_GET['action'];
  }?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php
   if ($enlaces != "api-appdicun") {

     include "modules/nav-template/header.html";
     include "modules/nav-template/links.php";
     }
    ?> 
</head>
<body class="hold-transition sidebar-mini">
  <?php
  ob_start();
  ?>
  <div id="wrapper">
    <?php
      if ( $enlaces != "login" && $enlaces != "maps" && $enlaces != "api-appdicun" && $enlaces != "intro" && $enlaces != "ingreso-empresa-error" && $enlaces != "registro" && $enlaces != "registro-empresa-error-01" && $enlaces != "registro-empresa-error-02" && $enlaces != "registro-empresa-ok" ) {
      include "modules/nav-template/nav-horizontal.php";
      }
      if ( $enlaces != "anuncio-error" && $enlaces != "anuncio-ok" && $enlaces != "Datos-Empresa-ok" &&  $enlaces != "editar-Perfil" &&  $enlaces != "panel" && $enlaces != "login" && $enlaces != "maps" && $enlaces != "api-appdicun" && $enlaces != "intro" && $enlaces != "ingreso-empresa-error" && $enlaces != "registro" && $enlaces != "registro-empresa-error-01" && $enlaces != "registro-empresa-error-02" && $enlaces != "registro-empresa-ok" ) {
      include "modules/nav-template/nav-panel.php";
      }

    ?>
  <!-- Page Content -->
      <?php
        $mvc = new MvcController();
        $mvc -> enlacesPaginasController();
      ?>

    <?php
      if ( $enlaces != "login" && $enlaces != "maps" && $enlaces != "api-appdicun" && $enlaces != "registro" && $enlaces != "registro-empresa-error-01" && $enlaces != "registro-empresa-error-02" && $enlaces != "registro-empresa-ok" ) {
      include "modules/nav-template/footer.php";
      }


    ?>
  </div>

  <?php
  if ( $enlaces != "login" && $enlaces != "maps" && $enlaces != "api-appdicun" && $enlaces != "intro" && $enlaces != "ingreso-empresa-error" && $enlaces != "register" && $enlaces != "registro-empresa-error-01" && $enlaces != "registro-empresa-error-02" && $enlaces != "registro-empresa-ok" ) {
  include "modules/nav-template/script.php";
  }


  ob_end_flush();
  ?>


</body>
</html>
