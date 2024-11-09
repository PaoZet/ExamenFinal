<?php
ob_start();

	/**
	* POO Conectar

	*/

	class basedatos
	{


		///datos Productivo
		private $host = "localhost"; // servidor
		private $dbname = "proyecto"; // nombre de la base de datos
		private $user = "root"; // usuario
		private $pass = ""; // contraseña

		//funcion de conexion publica
		public function conectarBD(){

		$conect = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
		
		if (!$conect) {
			die('Error Conexion base de datos: ' . mysqli_connect_error());
		}

		//retornar funcion de conexion
		return $conect;

		}


	}

ob_end_flush();

?>