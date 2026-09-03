<?php
error_reporting(0);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Logout Session</title>
</head>
<h3>
<?php
if($_SESSION['ThongTin'])
{
	echo "Giá trị biến session là: ".$_SESSION['ThongTin'].". <a href='logout.php'>Đăng xuất </a>";	
}
else
{
	header("Location:session.php");	
}
?>
</h3>
<body>
</body>
</html>