<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Desconexión</title>
</head>
<body>
	<?php
		include("conexion.php");
 	?>
 	<h1>Desconexión</h1>
 	<?php
 		session_start();
 		session_destroy();
 		header('Location:login.php');
 	?>
</body>
</html>