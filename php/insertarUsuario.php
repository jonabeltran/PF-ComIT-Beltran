<?php

if(empty($_POST["name"])||empty($_POST["email"])||empty($_POST["phone"])||empty($_POST["adress"])||empty    ($_POST["pass"])){
  echo $respuesta="Campos Vacios";
}else{

require_once("funciones.php");
require_once("coneccion.php");

$nombre=$_POST["name"];

$email=$_POST["email"];

$tel=$_POST["phone"];

$dire=$_POST["adress"];

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
      echo $respuesta="Email Repetido";
    }else{
    
    //-------------------------------------------  

  	$sql="INSERT INTO usuarios (nombres, email, tel, direccion, password) VALUES (:name, :email, :phone, :adress, :pass)";

  	$resultado=$base->prepare($sql);

  	$resultado->execute(array(":name" => $nombre, ":email" =>$email, ":phone" => $tel, ":adress" =>$dire,  ":pass" =>$pass_cifrado));

    $resultado->closeCursor();

    echo $respuesta="Registro Insertado";
      
    }

  }catch(Exception $e){

  	die(" error: " . $e->getMessage());

  }

}
  ?>

