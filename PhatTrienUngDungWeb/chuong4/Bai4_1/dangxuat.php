<?php /*?><?php
session_start();
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
</html> <?php */?>
<?php
session_start();
// Thực hiện hủy session khi người dùng bấm Đăng xuất
unset($_SESSION['ThongTin']);
session_destroy();

// Điều hướng về trang session.php
header("Location: session.php");
exit();
?>