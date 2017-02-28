<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
<body style="text-align=center">
<h1>Registro nuevo Usuario</h1>
<?php
	include("conexion.php");
	if(isset($_POST['registrar'])){
		//Alta Usuario
		$login=$_POST['login'];
		$pass=$_POST['pass'];
		$passCifrada=password_hash($pass,PASSWORD_DEFAULT);
		echo $pass . "<br>";
		echo $passCifrada . "<br>";
		$sql="insert into usuarios (login,contrasena) values (?,?)";
		$resultado=$conexion->prepare($sql);
		$resultado->execute(array($login,$passCifrada));
		if(!$resultado){
				echo "error muy grave al insertar usuario";
		}else{
			echo "usuario registrado";
		}
		echo "<br><br><a href='login.php'><input type='button' value='loguearse'></a>";
	}else{
?>
<div align="center">
		<form action="registroUsuarios.php" method="post">
			<fieldset style="width:30px">
			<legend>Datos usuario</legend>
				Login: <input type="text" name="login" required><br><br>
				Contraseña: <input type="password" name="pass" required><br><br>
				<input type="submit" name="registrar" value="Aceptar">
			</fieldset>
			</form>
		</div>
<?php
	}
?>
</body>
</html>