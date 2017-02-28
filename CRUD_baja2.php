<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>BAJA</title>
</head>
<body>
	<?php
		session_start();
		if(!isset($_SESSION['usuario'])){
			header('Location:login.php');
		}

		include("conexion.php");
 	?>
    <h1>Proceso de baja a cliente</h1>
	<?php
		if(!isset($_POST['borrar'])){
		$sql="SELECT * FROM clientes WHERE CodCliente=?";
		$resultado=$conexion->prepare($sql);
		$resultado->execute(array($_POST['cod']));
		if(!$resultado){
			echo "error con la consulta";
		}else{
			$registro=$resultado->fetch();
			if($registro['CodCliente']!=''){
			echo "<form action='baja2.php' method='post'>";
			echo "Codigo cliente: {$registro['CodCliente']}<br><br>";
			echo "<input type='hidden' name='cod' value='{$_POST['cod']}'>";
			echo "Nombre: {$registro['Nombre']}<br><br>";
			echo "Telefono: {$registro['Telefono']}<br><br>";
			echo "mail: {$registro['mail']}<br><br>";
			echo "<img src='./imagenes/" . $registro['foto'] . "'><br><br>";
			echo "<input type='hidden' name='foto' value={$registro['foto']}>";
			echo "<input type='submit' name='borrar' value='borrar'></form>";
			}else{
				echo "<h1>el cliente con codigo \"{$_POST['cod']}\" no existe gilipollas<h1><br>";
			}
		}
	}else{
		$sql="DELETE FROM CLIENTES WHERE CodCliente=?";
		$resultado=$conexion->prepare($sql);
		$resultado->execute(array($_POST['cod']));
		if(!$resultado){
			echo "error al dar de baja";
		}else{
			echo "Cliente dado de baja correctamente";
			unlink("./imagenes/{$_POST['foto']}");
		}
	}
		$conexion=null;
	?>
    <a href="baja.php"><input type="button" value="Atras"></a>
    <a href="index.php"><input type="button" value="Menu Principal"></a>
</body>
</html>