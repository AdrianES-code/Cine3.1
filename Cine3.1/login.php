<!DOCTYPE html>
<html lang="es">
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="fonts/style.css">
	<link rel="stylesheet" type="text/css" href="login.css">
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
			<a href="salir.php"><button>Ingresar</button></a> 
		</article>
	</header>
	<section>
		<form action="" method="POST">
			<article id="mensaje">
				<h1>Inicia sesión con tu cuenta</h1>	
			</article>
			<br><input type="text" name="usuario" placeholder="NOMBRE DE USUARIO" autocomplete="off" required>
			<br><input type="password" name="password" placeholder="CONTRASEÑA" autocomplete="off" required>
				<p><input type="checkbox" name="">Mantener sesión iniciada</p>
			<article id="boton">
				<br><button type="submit" name="enviar"><span id="barralat"><i class="icon-arrow-long-right"></i></span></button>
				<?php 
					if (isset($_GET["error"])) {
						echo "<h2 id='error'>EL NOMBRE DE USUARIO Y/O PASSWORD SON INCORRECTOS</h2>";
					}
				 ?>
			</article>
			<br>
			<footer>
				<p id="cuenta">CREAR CUENTA</p>
				<p id="sesionerror">NO PUEDES INICIAR SESIÓN?</p>
			</footer>
		</form>
	</section>
	<?php  
		if (isset($_POST["enviar"])) {
			$u = $_POST["usuario"];
			$p = $_POST["password"];
			require_once("usuarios.php");
			$obj = new Usuario();
			$obj->comprobar($u,$p);
		}
	?>
</body>
</html>