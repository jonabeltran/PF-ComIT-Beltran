<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <!--  <meta http-equiv="X-UA-Compatible" content="ie=edge">  -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">

    <script type="text/javascript" src="js/jQuery/jquery.js"></script>
    <script src="js/font_awesome/fontawesome-all.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="js/jsAlertify/alertify.js"></script>
    <link rel="stylesheet" href="css/cssAlertify/alertify.css">
    <link rel="stylesheet" href="css/cssAlertify/themes/default.css">

    <link rel="stylesheet" href="css/estilosIndex.css">
    <title>CicloBahia</title>
</head>

<body>

<div class="contenedor_principal">
<?php
 include("html/head.html");
 echo "<div id='caja'>";
   include("html/barra_lateral.html"); 
   echo "<aside class='mi_galeria'>";
            include("html/sec_inicio.html");  
   echo "</aside>";
 echo "</div>";
 include("html/pie.html");
?>
</div>
  

  

  
</body>
</html>