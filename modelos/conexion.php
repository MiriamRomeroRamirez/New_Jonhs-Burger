<?php
class Conexion{
	static public function conectar(){
		
<<<<<<< HEAD
		$link = new PDO("mysql:host=localhost:3307;dbname=multiservicio","root","123",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
=======
		$link = new PDO("mysql:host=localhost:3307;dbname=multiservicio","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
>>>>>>> 8acfa803e86466e4017a4fcc7736b726dcfd1174
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		return $link;
	}
}
