<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modificar usuario</title>
</head>
<body>
	<?php
		session_start();
		if(!isset($_SESSION['usuario'])){
			header('Location:login.php');
		}
	?>
	<h1>Modificar datos de un usuario</h1>
	<form action="modificar2.php" method="post">
		<fieldset style="width:350px">
		<legend>Datos usuario</legend>
			Código usuario: <input type="text" name="id_usuario" required> <input type="submit" value="Buscar">
		</fieldset>
		</form>
		<br><br>
		<a href="index.php"><input type="button" value="Menú principal"></a>
</body>
</html>