<?php 
 	
 	class Conexion{
 		public $conexion="";
 		public $host = "localhost";
 		public $usuario = "root";
 		public $password = "";
 		public $base = "cine";
 		public $sentencia = "";
 		public function conectar(){
 			//Clase objeto = new CLase o 
 			// objeto= new Clase();
 			$this->conexion = new mysqli($this->host,$this->usuario,$this->password,$this->base);
 		}
 		public function cerrar(){
 			$this->conexion->close();
 		}
 		//Altas bajas y modificaciones
 		public function ejecutarSentencia(){
 			$this->conectar();
 			$this->conexion->query($this->sentencia);
 			$this->cerrar();
 		}
 		//Consulta
 		public function obtenerSentencia(){
 			$this->conectar();
 			return $this->conexion->query($this->sentencia);
 		}
 	}
 ?>