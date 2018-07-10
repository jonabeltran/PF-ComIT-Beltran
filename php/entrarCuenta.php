<?php

if(!empty($_POST["email2"])|| !empty($_POST["psw"])){

    require_once("funciones.php");
    require_once("coneccion.php");

    $direEmail=$_POST["email2"];

    $pass=$_POST["psw"];

    try{

        $modelo=new conexion();
        $base=$modelo->get_conection();
        $sql="select * from usuarios where email='".$direEmail."'";
        $resultado=$base->prepare($sql);
        $resultado->execute(array(":email2"=>$direEmail));
        $registro=$resultado->fetch(PDO::FETCH_ASSOC);
        $pass_descifrada=desencriptar($registro['password']);
        if($pass==$pass_descifrada){
            session_start();
            $_SESSION['nom_usuario']=$registro['nombres'];
            $_SESSION['id_usuario']=$registro['id'];
            header('Location:../index_usuario.php');
        //   echo '<script type="text/javascript">';
        //  echo 'location.href="../../paginaUsuario/index_usuario.php";';
        // echo '</script>';
        }else{
            echo "<script> alert('No Ingreso');</script>";
        }

    }catch(exception $e){
        die(" error: " . $e->getMessage());
    }

}

?>