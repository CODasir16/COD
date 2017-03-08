<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Baja COD</title>
</head>
<body>
	<?php
		session_start();
		if(!isset($_SESSION['usuario'])){
			header('Location:login.php');
		}

		include("conexion.php");
 	?>
 	<h1>Proceso de baja de usuarios</h1>
 	<?php
 		if(!isset($_POST['borrar'])){
	 		$sql="select * from usuario where id_usuario=?";
	 		$resultado=$conexion->prepare($sql);
	 		$resultado->execute(array($_POST['id_usuario']));
	 		if(!$resultado){
	 			echo "Error en la consulta.";
	 		}else{
	 			$registro=$resultado->fetch();

	 			if($registro['id_usuario']!=''){
	 				echo "<form action='baja2.php' method='post'";
		 			echo "Código usuario: {$registro['id_usuario']}<br><br>";
		 			echo "<input type='hidden' name='id_usuario' value='{$_POST['id_usuario']}'>";
		 			echo "Nombre: {$registro['nombre']}<br><br>";
		 			echo "Contraseña: {$registro['contrasena']}<br><br>";
		 			echo "Código de grupo: {$registro['grupo_id']}<br><br>";
		 			echo "<input type='submit' name='borrar' value='Borrar'></form>";
	 			}else{
	 				echo "El usuario con código {$_POST['id_usuario']} no existe";
	 			}
	 		}
	 	}else{
	 		$sql="delete from usuario where id_usuario=?";
	 		$resultado=$conexion->prepare($sql);
	 		$resultado->execute(array($_POST['id_usuario']));
	 		if(!$resultado){
	 			echo "Error al dar de baja.";
	 		}else{
	 			echo "Usuario dado de baja correctamente.";
	 		}
	 	}
 		$conexion=null;
 	?>
 	<br><br>
 	<a href="baja.php"><input type="button" value="Atrás"></a>
 	<a href="index.php"><input type="button" value="Menú principal"></a>
</body>
</html>