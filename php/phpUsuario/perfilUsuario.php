<?php
session_start();

require("../coneccion.php");
require("../funciones.php");
$modelo=new conexion();
try{
    $sql="select * from usuarios
        where id='".$_SESSION['id_usuario']."';";
    $base1=$modelo->get_conection();
    $resultado=$base1->prepare($sql);
    $resultado->execute();
    $data=$resultado->fetch();
    $nombre=$data['nombres'];
    $email=$data['email'];
    $tel=$data['tel'];
    $dire=$data['direccion'];
    $pass_descifrada=desencriptar($data['password']);
}catch(exception $e){

}

?>

<!DOCTYPE html>
<html lang="en">
<head>

 <link rel="stylesheet" href="css/cssUsuario/estilosPerfil.css">

 <script>
  $(document).ready(function(){

     $("#enviar").click(function(){
         var nombre=$("#nom").val();
         var email=$("#email").val();
         var tel=$("#tel").val();
         var dire=$("#dire").val();
         var pass=$("#pass").val();
         if( nombre=="" || email=="" || tel=="" || dire=="" || pass==""){
             alertify.error("hay campos vacios");
         } 
     })

  });
 </script>
   
</head>
<body>
    
        <form class="form-horizontal">
            <fieldset>
                <legend class="text-center header">Tus Datos</legend>

                <div class="form-group">
                    <span class="col-md-1 col-md-offset-2 text-center"><i class="mi_icono fas fa-user"></i></span>
                    <div class="col-md-8">
                        <label for="nom">Usuario</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $nombre ?>">
                    </div>
                </div>

                <div class="form-group">
                    <span class="col-md-1 col-md-offset-2 text-center"><i class="mi_icono fas fa-at"></i></span>
                    <div class="col-md-8">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="<?php echo $email ?>">
                    </div>
                </div>

                <div class="form-group">
                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-phone"></i></span>
                    <div class="col-md-8">
                        <label for="tel">Telefono</label>
                        <input id="tel" type="tel" class="form-control" name="tel" value="<?php echo $tel ?>">
                    </div>
                </div>

                <div class="form-group">
                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-address-card"></i></span>
                    <div class="col-md-8">
                        <label for="dire">Direccion</label>
                        <input id="dire" type="text" class="form-control" name="dire" value="<?php echo $dire ?>">
                    </div>
                </div>

                <div class="form-group">
                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-unlock-alt"></i></span>
                    <div class="col-md-8">
                        <label for="pass">Contraseña</label>
                        <input id="pass" type="password" class="form-control" name="pass" value="<?php echo $pass_descifrada ?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button type="button" id="enviar" class="mi_boton btn btn-primary btn-lg">Modificar</button>
                    </div>
                </div>
            </fieldset>
        </form>
</body>
</html>


