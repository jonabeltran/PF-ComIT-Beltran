<?php

session_start();

$monto_total=$_POST["total"];
    include("../coneccion.php");
    try{
       $sql="select COALESCE(MAX(ID)+1, 0) as max from pedidos";
       $modelo=new conexion();
       $base=$modelo->get_conection();
       $resultado=$base->prepare($sql);
       $resultado->execute();
       $max=$resultado->fetch();
       $maxid=$max['max'];
  
        $date=new DateTime();
        $fecha=$date->format('Y-m-d');       
  
        $pedido="insert into pedidos (`ID`, `fecha`, `id_cliente`, `monto_total`, `estado`) values('".$maxid."','".$fecha."','".$_SESSION['id_usuario']."','".$monto_total."','En Proceso')";
        $base2=$modelo->get_conection();
        $inserta=$base2->prepare($pedido);
        $inserta->execute();
  
        $arreglo=$_SESSION['carrito'];
        
        foreach($arreglo as $indice => $datos){

            $articulos="insert into articulos_pedidos (`id_articulo`, `precio`, `cantidad`, `id_pedido`) values('".$datos['Id']."','".$datos['Precio']."','".$datos['Cantidad']."','".$maxid."');";
            $base3=$modelo->get_conection();
            $result=$base3->prepare($articulos);
            $result->execute();

        }
        
        unset($_SESSION['carrito']);

      //  echo '<p>Pedido Enviado</p>';
        echo $respuesta = 'Pedido Enviado';
        
    }catch(Exception $e){
         echo Console::log('error', $e);
    }


?>