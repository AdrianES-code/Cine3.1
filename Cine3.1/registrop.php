<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro</title>
	<link rel="stylesheet" href="registrop.css">
</head>
<body>
	<header>
		<article id="izquierda">
			<img src="Cinedrilo Logo Rectangular.png">
		</article>
		<article id="centro">
			<a href="inicio.php"><button>Ver toda la cartelera</button></a>
		</article>
		<article id="derecha">
			<a href="salir.php"><button>Salir</button></a>
			<a href="registrop.php"><button>Nuevo Registro</button></a> 
		</article>
		<nav>
			<ul>
				<li><a href="inicio.php">Inicio</a></li>
				<li><a href="ubicaciones.php">Cines</a></li>
				<li><a href="promos.php">Promos</a></li>
				<li><a href="destacados.php">Destacados</a></li>
				<li><a href="ventasemp.php">Ventas Corporativas</a></li>
			</ul>
		</nav>
	</header>
	<section>
	<form action="" method="post">
		Nombre: <input type="text" name="nombre" required><br>
		Password: <input type="password" name="contrasena" required><br>
		Correo: <input type="email" name="correo"><br>
		Edad: <input type="number" name="edad" required><br>
		<input type="submit" value="Guardar" name="boton">
	</form>
	<form action="" id="fEliminar" method="post">
	<?php 
		require_once("persona.php");
		$obj = new Persona();
		if(isset($_POST["boton"])){
			$nombre = $_POST["nombre"];
			$password = $_POST["contrasena"];
			$correo = $_POST["correo"];
			$edad = $_POST["edad"];
			
			$obj->insertar($nombre,$password,$correo,$edad);
			echo "<h2>Persona Registrada</h2>";
		}

		if(isset($_POST["eliminar"])){
			if(!empty($_POST["radioEliminar"])){
				foreach ($_POST["radioEliminar"] as $id) {
					$obj->eliminar($id);
				}
				echo "<h2>Persona Eliminada</h2>";
			}
		}

		$resultado = $obj->consultar();
		echo "<table>";
		echo "<th>Nombre</th>";
		echo "<th>Correo</th>";
		echo "<th>Edad</th>";
		echo "<th>Eliminar</th>";
		while($fila = $resultado->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$fila["nombre"]."</td>";
			echo "<td>".$fila["correo"]."</td>";
			echo "<td>".$fila["edad"]."</td>";
			echo "<td>";
			?>
			<input type="checkbox" value="<?php echo $fila['id']; ?>" name="radioEliminar[]">
			<?php 
			echo "</td>";
			echo "</tr>";
		}
		echo "</table>";

	 ?>
	 <input type="submit" name="eliminar" value="Eliminar">
	 </form>
	</section>
</body>
</html>