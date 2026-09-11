<?php
$host="localhost";
$username="root";
$password="";
$database="myDB";
//Tạo kết nối
$con = new mysqli($host, $username, $password, $database);
//Kiểm tra kết nối
if($con->connect_error)
{
	echo 'Ket noi that bai';
	exit();	
}
echo 'Ket noi thanh cong'.'<br>';	
$con->query("set names 'utf8'"); //set truy vấn tiếng việt
?>