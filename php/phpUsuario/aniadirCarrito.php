<?php   

 session_start();  
 
 if (isset($_SESSION['carrito'])) {
    //    echo 'entre a insertar';
        $arreglo=$_SESSION['carrito'];

        $idart=$_POST["idart"];
        $nombre=$_POST["nombre"];
        $imagen=$_POST["imagen"];
        $precio=$_POST["precio"];
        $cant=$_POST["cant"];
        $categoria=$_POST["categoria"];
        $pagina=$_POST["pagina"];

        if( array_search($idart, array_column($arreglo, 'Id')) !== false) {
          // fila ya esta en el array
          $top = sizeof($arreglo) - 1;
          $bottom = 0;
          while($bottom <= $top){
              if($arreglo[$bottom]['Id'] == $idart){
                  $arreglo[$bottom]['Cantidad']=$cant;
                  break;
              }else{
                $bottom++;
              }
          }          
          $_SESSION['carrito']=$arreglo;
          echo $result="Cantidad Modificada";
        }  else {
             //   fila nueva para agregar en el array
               $datosNuevos = array('Id' => $idart, 'Nombre' => $nombre, 'Precio' => $precio, 'Imagen' => $imagen, 'Cantidad' => $cant);
               array_push($arreglo, $datosNuevos);   
               $_SESSION['carrito']=$arreglo;
               echo $result="Articulo Nuevo Agregado";
        }
 
 }else {
  
        $idart=$_POST["idart"];
        $nombre=$_POST["nombre"];
        $imagen=$_POST["imagen"];
        $precio=$_POST["precio"];
        $cant=$_POST["cant"];
        $categoria=$_POST["categoria"];
        $pagina=$_POST["pagina"];
        
        $primero = array('Id' => $idart, 'Nombre' => $nombre, 'Precio' => $precio, 'Imagen' => $imagen, 'Cantidad' => $cant);
        
        $arreglo = array(
              $primero); 

        $_SESSION['carrito']=$arreglo;

        echo $result="Array creado";
 }

 ?>