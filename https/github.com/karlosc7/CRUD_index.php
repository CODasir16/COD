<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>COD</title>
</head>
<body>
	<?php
		session_start();
		if(!isset($_SESSION['usuario'])){
			header('Location:login.php');
		}
	?>
	<h1>Bienvenido al crud de clientes de COD</h1>
	<ul>
		<li><a href="alta.php">Altas</a></li>
		<li><a href="baja.php">Bajas</a></li>
		<li><a href="modificar.php">Modificaciones</a></li>
		<li><a href="listado.php">Consultas</a></li>
	</ul>
	<a href="desconexion.php"><input type="button" value="Desconectarse"></a>
</body>
</html>