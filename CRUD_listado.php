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
    <h1>Listado de Clientes</h1>
    <table border="1">
    	<tr>
        	<th>Codigo</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Foto</th>
        </tr>

   	<?php
   		$sql="SELECT * FROM CLIENTES";
		$resultados=$conexion->prepare($sql);
		$resultados->execute();
		foreach($resultados as $registro) {
			echo "<tr>";
			echo "<td>{$registro['CodCliente']}</td>";
			echo "<td>{$registro['Nombre']}</td>";
			echo "<td>{$registro['Telefono']}</td>";
			echo "<td>{$registro['mail']}</td>";
			echo "<td><img src='./imagenes/{$registro['foto']}' width='90px'</td>";
			echo "</tr>";
		}
		$conexion=null;
   	?>
    </table>
    <br></br>
    <a href="index.php">Menú Principal</a>
</body>
</html>