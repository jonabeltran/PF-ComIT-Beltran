<?php
  session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="stylesheet" href="css/cssUsuario/estilosHead.css">
        <script src="js/jsUsuario/jsHead.js"></script>      

</head>
<body>
        <header>
                   <h1 class="logo">
                       <?php
                        
                       echo $_SESSION['nom_usuario'];
                       ?>
                   </h1>
          
                   <nav class="menu_principal">
                    <ul>
                      <li><a href="php/phpUsuario/pedidos.php"><i class="icono fab fa-first-order iconos"></i>Mis Pedidos</a></li>
                      <li><a href="#"><i class="icono fas fa-user"></i><i class="fas fa-angle-down"></i></a>
                         <ul>
                            <li><a href="php/phpUsuario/perfilUsuario.php">Mi Perfil</a></li>
                            <li><a href="php/phpUsuario/cerrarSesion.php">Cerrar Sesion</a></li>
                         </ul>
                      </li>  
                    </ul>
                   </nav>
                   
                   <div class="menu-toggle">
                     <div class="hamburger"></div>
                   </div> 
        </header>  

    
</body>
</html>
