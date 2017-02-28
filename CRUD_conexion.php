<?php
	try{

		$conexion=new PDO('mysql:host=localhost;dbname=uem','root','');

	}catch(Exception $e){
		die( "Error en la conexión con la BBDD");
	}
?>