<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Documento sin título</title>
	</head>

	<body>
    	<?php
			include("conexion.php");
			if(!isset($_POST['submit'])){
			$codigo=$_POST['cod'];
			$sql="SELECT * FROM CLIENTES WHERE CodCliente=?";
			$resultado=$conexion->prepare($sql);
			$resultado->execute(array($codigo));
			if(!$resultado){
				echo "error grave al consultar";
				}else{
					$datos=$resultado->fetch();
					if($datos['CodCliente']==''){
							echo "El cliente con código \"$codigo\" no existe";
							}else {
								echo "<form action='modificar2.php' method='post'>";
								echo "Código cliente: $codigo<br><br>";
								echo "<input type='hidden' name='cod' value='$codigo'>";
								echo "Nombre: <input type='text' name='nombre' value='" . $datos['Nombre'] . "'><br><br>";
								echo "Teléfono: <input type='text' name='tel' value='" . $datos['Telefono'] . "'><br><br>";
								echo "Correo: <input type='text' name='mail' value='" . $datos['mail'] . "'><br><br>";
								echo "<input type='submit' value='modificar' name='submit'>";
								echo "</form>";
								}
					}
				}else{
					$sql="update clientes set Nombre=?, Telefono=?, mail=? where CodCliente=?";
					$resultado=$conexion->prepare($sql);
					$resultado->execute(array($_POST['nombre'], $_POST['tel'], $_POST['mail'], $_POST['cod']));
					if(!$resultado){
						echo "Error grave en la consulta";
						}else{
							echo "Cliente modificado satisfactoriamente";
							}
					}

		?>
        <a href="index.php"><input type="button" value="MENÚ PRINCIPAL"></a>
        <a href="modificar.html"><input type="button" value="MENÚ DE MODIFICACIONES"></a>
    </body>
</html>C