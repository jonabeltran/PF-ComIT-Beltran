<?php 

  /**
  * 
  */
  class conexion{
  	
  	public function get_conection(){
  		$conexion=new PDO('mysql:host=localhost; dbname=ciclobahia','root','');

   //$conexion=new PDO('mysql:host=localhost:3306; dbname=juan05_mayorista','juan05_mayorista','pixAx53lK6y');

  		return $conexion;
  	}
  }

 ?>