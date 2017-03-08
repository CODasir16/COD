<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listado</title>
</head>
<body>
	<?php
		session_start();
		if(!isset($_SESSION['usuario'])){
			header('Location:login.php');
		}

		include("conexion.php");
 	?>
 	<h1>Listado de usuarios</h1>
 	<table border="1">
 		<tr>
 			<th>Código</th>
 			<th>Nombre</th>
 			<th>Contraseña</th>
 			<th>Código de grupo</th>
 		</tr>
	 	<?php
			$sql="SELECT * FROM usuario";
			$resultados=$conexion->prepare($sql);
			$resultados->execute();
			foreach($resultados as $registro){
				echo"<tr>";
					echo"<td>{$registro['id_usuario']}</td>";
					echo"<td>{$registro['nombre']}</td>";
					echo"<td>{$registro['contrasena']}</td>";
					echo"<td>{$registro['grupo_id']}</td>";
				echo"</tr>";
			}
			$conexion=null;
		?>
 	</table>
 	<br>
 	<a href="index.php"><input type="button" value="Menu Principal"></a>
</body>
</html>