<?php
session_start();

if(!$_SESSION["Empresa"]){
  header("location:login");
  exit();
}
session_unset(); //remove all session variables
session_destroy(); // destroy the session

header("location:login");

 ?>
