<?php

requiere_once "mvc/controller/controller.php";
requiere_once "mvc/models/crud.php";

class Ajax{

  #Usuaris - email
  #--------------------------------------------------------------------------------------
    public static function validarEmailAjax($validarEmail){
      $datos = $validarEmail;
      $respuesta = MvcController::validarEmailController($datos);
      echo $respuesta;
    

    if(isset($_POST["validarEmail"])){
      $a = new Ajax();
      $a -> validarEmailAjax($_POST["validarEmail"]);
    }
  }
?>
