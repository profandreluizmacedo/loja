<?php 
  session_start();
  //session_destroy();
  unset($_SESSION["cliente"]);
  header("location: index.php");
?>