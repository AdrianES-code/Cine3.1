<?php 
	
	require_once("conexion.php");

	class Persona extends Conexion{

		public function insertar($nombre,$password,$correo,$edad){
$this->sentencia="INSERT INTO usuarios VALUES (null,'$nombre','$password','$correo','$edad');";
$this->ejecutarSentencia();
		}

		public function consultar(){
			$this->sentencia="SELECT * FROM usuarios";
			return $this->obtenerSentencia();
		}

		public function eliminar($id){
	$this->sentencia="DELETE FROM usuarios WHERE id=$id";
	$this->ejecutarSentencia();
		}

	}

 ?>