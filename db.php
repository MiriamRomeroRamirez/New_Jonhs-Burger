<?php
$servername="localhost:3307";
$username="root";
$password="";
$dbname="bdmapas";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
	die("Connection Failed".$conn->connect_error);
}else{
	
}

?>