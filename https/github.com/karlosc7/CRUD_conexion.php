<?php
try{
		$conexion=new PDO('mysql:host=localhost;dbname=cod','root','');
	}catch(Exception $e){
		die("Error en la conexión.");
	}
?>