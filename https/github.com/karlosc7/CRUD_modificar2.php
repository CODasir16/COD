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

		include("conexion.php");
 	?>
 	<h1>Modificar</h1>
 	<?php
 		if(!isset($_POST['submit'])){
			$codigo=$_POST['id_usuario'];
			$sql="select * from usuario where id_usuario=?";
			$resultado=$conexion->prepare($sql);
			$resultado->execute(array($codigo));
			if(!$resultado){
				echo "Error grave al consultar.";
			}else{
				$datos=$resultado->fetch();
				if($datos['id_usuario']==''){
					echo "El cliente con código \"$id_usuario\" no existe";
				}else {
					echo "<form action='modificar2.php' method='post'>";
					echo "Código cliente: $codigo<br><br>";
					echo "<input type='hidden' name='id_usuario' value='$codigo'>";
					echo "Nombre: <input type='text' name='nombre' value='" . $datos['nombre'] . "'><br><br>";
					echo "Contraseña: <input type='text' name='contrasena' value='" . $datos['contrasena'] . "'><br><br>";
					echo "Código grupo: <input type='text' name='grupo_id' value='" . $datos['grupo_id'] . "'><br><br>";
					echo "<input type='submit' value='modificar' name='submit'>";
					echo "</form>";
				}
			}
		}else{
			$sql="update usuario set nombre=?, contrasena=?, grupo_id=? where id_usuario=?";
			$resultado=$conexion->prepare($sql);
			$resultado->execute(array($_POST['nombre'], $_POST['contrasena'], $_POST['grupo_id'],$_POST['id_usuario']));
			if(!$resultado){
				echo "Error grave en la consulta.";
			}else{
				echo "Usuario modificado satisfactoriamente.";
			}
		}
 	?>
 	<br><br>
 	<a href="modificar.php"><input type="button" value="Atrás"></a>
 	<a href="index.php"><input type="button" value="Menú principal"></a>
</body>
</html>