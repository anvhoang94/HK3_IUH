<?php
session_start(); // Khởi tạo/Khôi phục Session đã lưu từ trước
error_reporting(); // Thiết lập báo lỗi PHP
// Kiểm tra xem đã tồn tại biến Session 'user' VÀ 'pass' hay chưa
if(isset($_SESSION['user']) && isset($_SESSION['pass']))
{
	include ("clslogin.php"); // Nhúng file lớp clslogin.php
	$p= new login(); // Khởi tạo đối tượng $p
	$p->confirmlogin($_SESSION['user'], $_SESSION['pass']); // Gọi hàm confirmlogin để kiểm tra lại giá trị trong Session có hợp lệ không
}
else // Nếu chưa có Session (chưa đăng nhập)
{
	header('location:login.php'); // Chuyển hướng bắt buộc về trang login.php
	exit(); // Dừng xử lý script
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
Chào mừng đến trang Admin
<body>
</body>
</html>