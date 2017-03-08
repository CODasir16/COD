<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro nuevo usuario COD</title>
</head>
<body style="text-align:center">
	<h1>Registro nuevo usuario COD</h1>
	<?php
		include("conexion.php");
		if(isset($_POST['registrar'])){
			//Alta usuario.
			$login=$_POST['login'];
			$pass=$_POST['pass'];
			$grupo=$_POST['grupo_id'];
			$passCifrada=password_hash($pass,PASSWORD_DEFAULT);
			echo $pass . "<br>";
			echo $passCifrada . "<br>";

			$sql="insert into usuario values (null,?,?,?)";
			$resultado=$conexion->prepare($sql);
			$resultado->execute(array("$login","$passCifrada","$grupo"));
			if(!$resultado){
				echo "Error muy grave al insertar usuario";
			}else{
				echo "Usuario registrado";
			}

		}else{
	?>
	<div align="center">
		<form action="registroUsuarios.php" method="post">
			<fieldset style="width:30px">
			<legend>Datos usuario</legend>
				Login: <input type="text" name="login" required autofocus><br><br>
				Contraseña: <input type="password" name="pass" required><br><br>
                Grupo: <select name="grupo_id" required>
                		<option value="1">1</option>
                    	<option value="2">2</option>
                       </select><br><br>
				<input type="submit" name="registrar" value="Aceptar">
			</fieldset>
			</form>
		</div>
	<?php
		}
	?>
		<br><br>
		<a href="login.php"><input type="button" value="Logearse"></a>
</body>
</html>