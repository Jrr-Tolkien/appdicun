<?php
class EnlacesPaginas{
  public static function enlacesPaginasModel($enlacesModel){
    switch ($enlacesModel) {
      #------------------------------------------
      case "index":
      $module = "mvc/views/modules/index.php";
      break;
      case "intro":
      $module = "mvc/views/modules/intro.php";
      break;
      #------------------------------------------
      case "panel":
      $module = "mvc/views/modules/panel.php";
      break;

      case "anuncio-ok":
      $module = "mvc/views/modules/panel.php";
      break;

      case "anuncio-ok":
      $module = "mvc/views/modules/panel.php";
      break;

      case "anuncio-error":
      $module = "mvc/views/modules/panel.php";
      break;
      #------------------------------------------
      case "home":
      $module = "mvc/views/modules/home.php";
      break;
      #------------------------------------------
      #Login de usuario
      case "login":
      $module = "mvc/views/modules/login.php";
      break;
      case "ingreso-empresa-error":
      $module = "mvc/views/modules/login.php";
      break;

      #------------------------------------------
      #Ruta del Perfil del usuario
      case "editar-Perfil":
      $module = "mvc/views/modules/editar-perfil.php";
      break;
      case "Datos-Empresa-ok":
      $module = "mvc/views/modules/editar-perfil.php";
      break;

      #------------------------------------------
      #Registro de nuevo usuario
      case "registro":
      $module = "mvc/views/modules/registro.php";
      break;
      case "registro-empresa-ok":
      $module = "mvc/views/modules/gracias.php";
      break;
      case "registro-empresa-error-01":
      $module = "mvc/views/modules/registro.php";
      break;
      case "registro-empresa-error-02":
      $module = "mvc/views/modules/registro.php";
      break;

      #------------------------------------------
      #upload datos
      #Ruta para abrir el upload
      // case "upload":
      // $module = "ajax/upload.php";
      // break;

      #------------------------------------------
      #Salir de la sesion
      #Ruta para abri el archivo de salida
      case "Logout":
      $module = "mvc/views/modules/Logout.php";
      break;

      case "maps":
      $module = "mvc/views/modules/maps.html";
      break;

      case "api-appdicun":
      $module = "mvc/views/modules/api-appdicun.php";
      break;

      #En caso de ninguna de las anteriores
      default:
      $module = "mvc/views/modules/panel.php";
      break;


    }
    return $module;
  }
}
 ?>
