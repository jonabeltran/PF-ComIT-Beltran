<?php
if(session_status()==PHP_SESSION_NONE){
   session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/cssUsuario/estilosPedidos.css">
</head>
<body>

   <?php
     include("../coneccion.php");
     $modelo=new conexion();
     try{
         $sql="select * from pedidos
               where pedidos.id_cliente='".$_SESSION['id_usuario']."';";
         $base1=$modelo->get_conection();
         $resultado=$base1->prepare($sql);
         $resultado->execute();

         $num_filas=$resultado->rowCount();
         if($num_filas>0){

         while ( $data=$resultado->fetch() ) {
            echo "<div class='container_tabla'>";
            $condicion=$data['estado'];
            echo "<h3>Pedido num: ".$data['ID']." fecha: ".$data['fecha']." Monto Total: $".$data['monto_total']." Estado: ".$condicion."</h3>";
  
            $sql2="select articulos_pedidos.precio,articulos_pedidos.cantidad,articulos.nombre,articulos.foto        FROM articulos_pedidos
                   INNER JOIN articulos
                   ON articulos_pedidos.id_articulo=articulos.id
                   WHERE articulos_pedidos.id_pedido=".$data['ID'];
            $base2=$modelo->get_conection();
            $resultado2=$base2->prepare($sql2);
            $resultado2->execute();
            echo '<div class="table-responsive-vertical">';
            echo '<table class="table table-bordered table-striped table-hover table-mc-red">';
              echo "<thead>";
                echo "<tr>";
                  echo "<th>Articulo</th>";
                  echo "<th>Precio</th>";
                  echo "<th>Cantidad</th>";
                  echo "<th>Foto</th>";
                echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
            while ($data2=$resultado2->fetch()) {
              echo "<tr>";
                 echo "<td data-title='Articulo'>".$data2['nombre']."</td>";
                 echo "<td data-title='Precio'>$ ".$data2['precio']."</td>";
                 echo "<td data-title='Cantidad'>".$data2['cantidad']."</td>";
                 echo "<td data-title='Foto'>".$data2['foto']."</td>";
              echo "</tr>";
         
            }
              echo "</tbody>";     
            echo "</table>"; 
            echo "</div>";
            echo "</div>";

        }

        }else{
          echo "<h3>No Tiene Ningun Pedido</h3";
        }
     }catch(exception $e){

     }


   ?>

    
</body>
</html>