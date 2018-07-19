<?php

  session_start();

  $date=new DateTime();
  $fecha=$date->format('Y-m-d');  

  setcookie("cookie2",$fecha,time()+86400,"/ciclobahia2/"); 
  
  session_destroy();

  unset($_SESSION['nom_usuario']);
  unset($_SESSION['id_usuario']);

  if(isset($_SESSION['carrito'])){
    unset($_SESSION['carrito']);
  }
  
  header("Location:../../index.php");
  

?>  