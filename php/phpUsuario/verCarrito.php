<?php
session_start();  
?>

<link rel="stylesheet" href="css/cssUsuario/estilosPedidos.css">

<?php

if (isset($_SESSION['carrito'])){
     $array=$_SESSION['carrito'];

     echo "<div class='container_tabla'>";
     echo "<h3>Confirmar Pedido</h3>";
     echo "<div class='table-responsive-vertical'>";
        echo '<table class="table table-bordered table-striped table-hover table-mc-red">';
        echo "<thead>";
        echo "<tr>";
         echo "<th>Articulo</th>";
         echo "<th>Precio</th>";
         echo "<th>Cantidad</th>";
         echo "<th>Subtotal</th>";
         echo "<th>Eliminar</th>";
        echo "</tr>";
        echo "</thead>";
//----------------------------------------------
       echo "<tbody>";
       $total = 0;
      // for ($row = 0; $row < $datos.length(); $row++) {dd
        foreach ($array as $clave => $datos) {
           echo "<tr>";
             echo "<td data-title='Articulo'>".$datos['Nombre']."</td>";
             echo '<td data-title="Precio" style="padding-right:5px" align="right">$ '.$datos['Precio'].'</td>';
             echo "<td data-title='Cantidad'>".$datos['Cantidad']."</td>";
             echo "<td data-title='Subtotal' style='padding-right:5px' align='right'>$ ".number_format($datos['Cantidad']*$datos['Precio'],2)."</td>";
             echo '<td data-title="Eliminar"><button class="elimina" onclick="preguntar('.$datos['Id'].')">Remover</button></td> ';
             echo "</tr>";
        $total = $total + ($datos['Cantidad']*$datos['Precio']);
        }
//----------------------------------------------------------
        echo '<tr>';  
        echo '<td style="padding-right:5px; color:red;" colspan="3" align="right">TOTAL:</td>'  ;
        echo '<td style="padding-right:5px" align="right">$ '. number_format($total, 2). ' </td>';  
        echo '<td></td>'  ;
        echo '</tr>' ;
        echo "</tbody>"; 
        echo "</table>";  
       echo "</div>"; 
       echo "</div>";

     if (!empty($_SESSION['carrito'])) {
        echo "<button onclick='enviarPedido(".$total.")'>Confirmar Pedido</button>";
        
     }
   


}else{
    echo '<p>carrito vacio</p>';
}

?>

<script src="js/jsUsuario/jsCarrito.js"></script>


