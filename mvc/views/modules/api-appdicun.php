<?php

  // include_once 'mvc/views/modules/api-appdicun.php';

  if (isset($_GET['n_switch'])) {
    $opcion =$_GET['n_switch'];

    if ($opcion !="" ) {

      switch ($opcion) {
        case 1:
          $sdfe = new MvcApiController();
          $sdfe -> getEmpresasController();
          break;

        case 2:
          if (isset($_GET['para_funcion'])) {
            $sdfe = new MvcApiController();
            $sdfe -> getAnunciosEmpresaController();
          }else {
            $mensaje ="No se han enviado paramentros a la funcion para la consulta";
            echo json_encode($mensaje);
          }
          break;

        default:

          break;
      }
    }else {
      $mensaje ="No se han enviado paramentros";
      echo json_encode($mensaje);
    }
  }



 ?>
