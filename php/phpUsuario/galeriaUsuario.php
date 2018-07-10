
<link rel="stylesheet" href="css/cssUsuario/estilosGaleria.css">


<div id="carrito">
    <a href="php/phpUsuario/verCarrito.php">Ver Carrito<i class="fas fa-cart-arrow-down"></i></a>
</div>


<?php
session_start();

$categoria=$_POST['categoria']; 

require ("../../php/coneccion.php");

  try{

      $modelo=new conexion();

      $base=$modelo->get_conection();

      $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $base->exec("SET CHARACTER SET utf8");
//----------------------------------------------------------------------

      $sql1="select * from articulos where subcategoria='$categoria'";

      $resultado1=$base->prepare($sql1);

      $resultado1->execute(array());

      $num_filas=$resultado1->rowCount();

      $resultado1->closeCursor();

      if($num_filas>0){
        $tamagno_pagina=9;
        $pageNum = 1;
  
         if(isset($_POST['page'])) { //si existe la variable "page"
          sleep(1); //Retrasa la ejecución del programa durante el número de segundos dados por seconds      
          $pageNum = $_POST['page'];
         }
      
         $offset = ($pageNum - 1) * $tamagno_pagina;
         $total_paginas=ceil($num_filas/$tamagno_pagina);//el ceil Devuelve el siguiente valor entero mayor redondeando hacia arriba value si fuera necesario.
      
         $sql_limite="select * from articulos where subcategoria='$categoria' limit $offset,$tamagno_pagina";
         //el limit te trae un rango de filas del resultset

         $resultado1=$base->prepare($sql_limite);
  
         $resultado1->execute(array());
  
         echo '<section class="galeria">';
          echo '<div class="contenedor_galeria">';
         while ($data=$resultado1->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="foto" id="'.$data['id'].'">';
              echo '<h4>'.$data['nombre'].'</h4>';
              echo '<img src="img/imgGaleria/'.$data['foto'].'" width="200" height="200">';
              echo '<p>$ '.$data['precio'].'</p>';
              if($data['cantidad']==0){
                echo '<p>Sin Stock</p>';
              }else{
                echo "<p>Limite de Compra: ".$data['cantidad']."</p>";  
                echo '<input type="number" min="1" max="'.$data['cantidad'].'" placeholder="Ingrese la Cantidad"><br>';
                echo '<a class="agregar" data-id="'.$data['id'].'" data-nom="'.$data['nombre'].'" data-foto="'.$data['foto'].'" data-precio="'.$data['precio'].'" data-cant="'.$data['cantidad'].'" data-cat="'.$categoria.'" data-pag="'.$pageNum.'" href="#">Agregar Carrito</a>';
              }
            echo '</div>';
         }
          echo '</div>';
         echo '</section>';   

       /*-----la paginacion--------*/
            
          if ($total_paginas > 1) {
            echo '<div class="paginate">';
            echo '<ul>';
            if ($pageNum != 1)
              echo '<li><a data="'.($pageNum-1).'" class="pag" data-cat="'.$categoria.'">Anterior</a></li>';
              for ($i=1;$i<=$total_paginas;$i++) {
                if ($pageNum == $i)
                    //si muestro el índice de la página actual, no coloco enlace
                    echo '<li><a class="pag" data-cat="'.$categoria.'">'.$i.'</a></li>';
                else
                    //si el índice no corresponde con la página mostrada actualmente,
                    //coloco el enlace para ir a esa página
                    echo '<li><a data="'.$i.'" class="pag" data-cat="'.$categoria.'">'.$i.'</a></li>';
             }
             if ($pageNum != $total_paginas)
                 echo '<li><a data="'.($pageNum+1).'" class="pag" data-cat="'.$categoria.'">Siguiente</a></li>';
             echo '</ul>';
             echo '</div>';
            }  

        /*--------------fin de la paginacion--------*/
      }

  }catch(Exception $e){
    echo "error", $e->getMessage();

  }

?>

<script>

$(document).ready(function (e) {

    $(".pag").click(function () {
     $(".mi_galeria").html('<div id="loading"><img src="img/imgGaleria/loading.gif" width="70px" height="70px"/></div>');
        var page = $(this).attr("data");
        var categoria = $(this).attr("data-cat");
        $.ajax({
            type: "POST",
            url: "php/phpUsuario/galeriaUsuario.php",
            data: { "categoria": categoria, "page": page }
        }).done(function (data) {
            $(".mi_galeria").fadeIn(1000).html(data);
        });
    });

    $('.agregar').click(function () {
        var id = $(this).attr('data-id');  
        var nombre = $(this).attr('data-nom');
        var imagen = $(this).attr('data-foto');
        var precio = $(this).attr('data-precio');
        var stock = $(this).attr('data-cant');
        var cant = $("#"+id+" input").val();       
        var categoria = $(this).attr('data-cat');
        var pagina = $(this).attr('data-pag');
        if (cant == '') {
            alertify.error('No Agrego la Cantidad!!!');
        }else if(cant<=0 || cant>stock){
            alertify.error('Cantidad Incorrecta!!!');
        }else {
            $.ajax({
                type: 'POST',
                url: 'php/phpUsuario/aniadirCarrito.php',
                data: { "idart": id, "nombre": nombre, "imagen": imagen, "precio": precio, "cant": cant, "categoria": categoria, "pagina": pagina }
            }).done(function (resultado) {
                alertify.success(resultado);
            });
        }    

    });

    $('#carrito a').click(function () {
        var url=$(this).attr("href");
        $(".mi_galeria").load(url);
          return false;
    });

});

</script>


