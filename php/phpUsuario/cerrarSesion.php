<?php

  session_start();
  
  session_destroy();

  unset($_SESSION['nom_usuario']);
  unset($_SESSION['id_usuario']);

  if(isset($_SESSION['carrito'])){
    unset($_SESSION['carrito']);
  }
  
  header("Location:../../index.php");
  

?>  