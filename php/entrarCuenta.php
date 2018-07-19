<?php
session_start();
    require_once("funciones.php");
    require_once("coneccion.php");

    $direEmail=$_POST["email2"];

    $pass=$_POST["pass2"];

    try{

        $modelo=new conexion();
        $base=$modelo->get_conection();
        $sql="select * from usuarios where email='".$direEmail."'";
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":email2"=>$direEmail));
        $registro=$resultado->fetch(PDO::FETCH_ASSOC);
        $pass_descifrada=desencriptar($registro['password']);
        if($pass==$pass_descifrada){     
            $_SESSION['nom_usuario']=$registro['nombres'];
            $_SESSION['id_usuario']=$registro['id'];
            header('Location:../index_usuario.php');
        }else{
           // echo "<script>alert('Datos Incorrectos');</script>";
            echo "<h1>No Ingresaste</h1>";
            echo "<script>location.href='../index.php'</script>";
        }

    }catch(exception $e){
        die(" error: " . $e->getMessage());
    }


?>

