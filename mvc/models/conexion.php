<?php
class Conexion{
  static public function conectar(){
  $enlaces = new PDO("mysql:host=localhost;dbname=lmjr_22726513_bdappdicun","root","");
  return $enlaces;
  }
}
 ?>
