<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Altas</title>
</head>
<body>
	<?php
		session_start();
		if(!isset($_SESSION['usuario'])){
			header('Location:login.php');
		}

		include("conexion.php");
 	?>
	<h1> Instertar nuevo Cliente</h1>
    <?php
	if(isset($_POST['cod'])){
		include("conexion.php");
		$sql="insert into clientes values(?,?,?,?,?)";
		$resultado=$conexion->prepare($sql);
		$resultado->execute(array($_POST['cod'],$_POST['nombre'],$_POST['tel'],$_POST['mail'],$_FILES['foto']['name']));
		if(!$resultado){
			echo "Error al insertar <br><br>";
		}else{
			echo "Cliente dado de alta <br><br>";
			copy ($_FILES['foto']['tmp_name'],"./imagenes/{$_FILES['foto']['name']}");
		}
		echo '<a href="index.php"><input type="button" value="Menu Principal">';
			$conexion=null;
	}else{
	?>
    <form action="altas.php" method="post" enctype="multipart/form-data">
    <fieldset style="width:300px">
    <legend>Datos cliente</legend>
    	Codigo Cliente <input type="text" name="cod" required><br><br>
        Nombre <input type="text" name="nombre" required><br><br>
        Telefono <input type="text" name="tel" required><br><br>
        Correo <input type="email" name="mail" required><br><br>
        Foto <input type="file" name="foto" required><br><br>

    </fieldset><br><br>
    <input type="submit" value="insertar">
    <input type="reset" value="limpiar">
    <a href="index.php"><input type="button" value="Menu Principal">
    </form><br><br>
    <?php
	}
	$conexion=null;
	?>
</body>
</html>