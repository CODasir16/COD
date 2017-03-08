<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
	<?php
		include("conexion.php");
 	?>
 	<h1>Login</h1>
 	<?php
 		$login=$_POST['login'];
 		$pass=$_POST['pass'];
 		$sql="select * from usuario where nombre=?";
 		$resultado=$conexion->prepare($sql);
 		$resultado->execute(array("$login"));
 		if(!$resultado){
 			echo "Error grave al consultar";
 		}else{
 			if($resultado->rowCount()==0){
 				header('location:login.php?errorlogin=si');
 			}else{
 				$datos=$resultado->fetch();
 				if(password_verify($pass ,$datos['contrasena'])){
	 				if($login=='admin'){
	 					session_start();
	 					$_SESSION['usuario']=$login;
	 					header('Location:index.php');
	 				}else{
	 					header('Location:http://cetme77.tk/');
	 				}
	 			}else{
	 				header('Location:login.php?errorlogin=si');
	 			}
 			}
 		}
 	?>
</body>
</html>


procesaLogin.php

Abrir con





