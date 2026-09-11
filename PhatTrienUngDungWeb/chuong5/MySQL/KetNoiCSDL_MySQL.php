<?php
$host = "localhost";
$username = "root"; //bên wampserver là root
$password = ""; //wamr ko cài pass thì bỏ trống
$database = "myDB";
$con=mysql_connect($host,$username,$password);
if(!$con)
{
	echo "Khong ket noi duoc CSDL";
	exit();	
}
mysql_select_db($database);
mysql_query("SET NAMES UTF8");
return $con;
?>