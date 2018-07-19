<?php
session_start();
require_once("funciones.php");
require_once("coneccion.php");

$nombre=$_POST["nombres"];

$email=$_POST["email"];

$tel=$_POST["tel"];

$dire=$_POST["dire"];

$contrasenia_usuario=$_POST["pass"];

$pass_cifrado=encriptar($contrasenia_usuario);       

 try{

    $modelo=new conexion();

    $base=$modelo->get_conection();

  	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $base->exec("SET CHARACTER SET utf8");
    //----------------------------------------
    $seEncuentra=buscar($email,$base);
    if($seEncuentra==true){
       echo "<h1>El Email Ya Existe</h1>";
       echo "<script>location.href='../index.php'</script>";
    }else{
    
        //-------------------------------------------  

        $sql="INSERT INTO usuarios (nombres, email, tel, direccion, password) VALUES (:nombres, :email, :tel, :dire, :pass)";

        $resultado=$base->prepare($sql);

        $resultado->execute(array(":nombres" => $nombre, ":email" =>$email, ":tel" => $tel, ":dire" =>$dire,  ":pass" =>$pass_cifrado));
        //-----------------------------------------------
      
        $sql2="select * from usuarios where email='".$email."'";
        $resultado2=$base->prepare($sql2);
        $resultado2->execute(array(":email"=>$email));
        $registro=$resultado2->fetch(PDO::FETCH_ASSOC);
        
        $_SESSION['nom_usuario']=$registro['nombres'];
        $_SESSION['id_usuario']=$registro['id'];
        header('Location:../index_usuario.php');
      
    }

  }catch(Exception $e){

  	die(" error: " . $e->getMessage());

  }

  ?>



