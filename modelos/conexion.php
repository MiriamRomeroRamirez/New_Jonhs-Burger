<?php
class Conexion{
	static public function conectar(){
		

		$conexion = new PDO("mysql:host=localhost:3307;dbname=multiservicio","root","123",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		return $conexion;
	}
}
