<?php 
class Conexion {

	public function __construct() {

	}

	public function conex() {
		$user = 'postgres';
		$password = '12345';
		$db = 'prueba';
		$host = 'localhost';
		$port = '5432';
		$string_conection = "host='$host' port='$port' dbname='$db' user='$user' password='$password'";
		$conection = pg_connect($string_conection) or die ('No se ha realizado la conexion');
		return $conection;
	}

}	

 ?>