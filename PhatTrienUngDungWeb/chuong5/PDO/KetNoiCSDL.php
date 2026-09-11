<?php
$host="localhost";
$username="root";
$password="";
$database="myDB";
try
{
	$pdo = new PDO("mysql:host=$host;dbname=$database", $username,$password);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$pdo->setAttribute(PDO::ATTR_TIMEOUT, 5);
	echo 'Ket noi thanh cong';	
}
catch(PDOException $e)
{
	echo 'Ket noi that bai.'.$e->getMessage();	
}
?>