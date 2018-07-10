<?php

session_start();

    $arreglo=$_SESSION['carrito'];
    $encontre=false;
    $indice=0;
    $idelimina=$_POST['id'];
    
    $indice = array_search($idelimina, array_column($arreglo, 'Id'));
    unset($arreglo[$indice]); 
    $arreglo = array_values($arreglo);
    $_SESSION['carrito']=$arreglo; 
    echo $result="Eliminado";  

?>