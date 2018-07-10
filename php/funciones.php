<?php

function encriptar($cadena){
    $key='1234';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
    return $encrypted; //Devuelve el string encriptado
}
 
function desencriptar($cadena){
     $key='1234';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
     $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    return $decrypted;  //Devuelve el string desencriptado
}


function buscar($email,$base){

   try{

   	$encontre=false;

    $conexion=$base->query("SELECT email FROM usuarios where email='".$email."'");
      
    $registros=$conexion->fetch();

    if ($email==$registros[0]){
        
        $encontre=true;
    }


   }catch(Exception $e){

   }

   return $encontre;

}

?>