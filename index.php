<?php

 date_default_timezone_set('America/Costa_Rica');
 ini_set("display_errors", true);
 ini_set("log_errors", 1);
 ini_set("error_log", "error_log_Ampliacion");

 session_start();

//  Requiere one de Api
  require_once "mvc/controller/api-controller.php";
  require_once "mvc/controller/api-controller.php";
  require_once "mvc/models/api-crud.php";
// Requiere one de La web
  require_once "mvc/controller/controller.php";
  require_once "mvc/models/crud.php";
  require_once "mvc/controller/panel-controller.php";
  require_once "mvc/controller/EmailController.php";
  require_once "mvc/models/enlaces.php";


  $mvc = new MvcController();
  $mvc -> page();
?>
