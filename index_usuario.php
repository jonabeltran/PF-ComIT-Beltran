<?php
session_start();
?>

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

    <?php
       if (isset($_COOKIE["cookie1"]) && isset($_COOKIE["cookie2"])){
            
          try{
            $bd=new PDO('mysql:host=localhost; dbname=ciclobahia','root','');
          //  require("php/coneccion.php");
          //  $modelo=new conexion();
          //  $bd=$modelo->get_conection();
            $sql="select COUNT(id) as cantidad FROM articulos 
                  WHERE subcategoria='".$_COOKIE["cookie1"]."' and fecha_alta>='".$_COOKIE["cookie2"]."'";
            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  
            $bd->exec("SET CHARACTER SET utf8");
            $resultado=$bd->prepare($sql);
            $resultado->execute(array());
            $data=$resultado->fetch(PDO::FETCH_ASSOC);
            if ($data["cantidad"]>0){
                echo "<script>alertify.alert('Visite Nuestro Catalogo de <b>".$_COOKIE["cookie1"]."</b>. Hay Nuevos Articulos!!!');</script>";
            }  

          }catch(exception $e){

          }
       }
    ?>   

    <div class="contenedor_principal">
        <?php
            include("php/phpUsuario/head.php");
            
            echo "<div id='caja'>";
            include("html/htmlUsuario/barra_lateral.html"); 
            echo "<aside class='mi_galeria'>";
                        include("php/phpUsuario/pedidos.php");  
            echo "</aside>";
            
            echo "</div>";
            include("html/pie.html");
        ?>
    </div>
    
</body>
</html>


