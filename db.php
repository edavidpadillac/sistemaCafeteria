<?php

session_start();

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'cafeteria';
$mysqli = new mysqli($host,$user,$pass,$db);

/*if($mysqli->connect_errno){
	echo "error";
}
else{
	echo "conectado a cafeteria";
}*/
?>