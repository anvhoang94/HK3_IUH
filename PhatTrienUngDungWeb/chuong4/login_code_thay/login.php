<?php
include ("clslogin.php"); // Nhúng file lớp clslogin.php vào để sử dụng
$p= new login(); // Khởi tạo một đối tượng (object) $p từ class login
session_start(); // Khởi tạo Session
error_reporting(0); // Tắt hiển thị các cảnh báo/lỗi PHP trên giao diện
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post">
<p>Nhập username:
<input type="text" name="txtuser" id="txtuser">
</p>
<p>Nhập password:
<input type="text" name="txtpass" id="txtpass">
</p>
<p>
<input type="submit" name="nut" id="nut" value="Đăng nhập">
</p>
 <div align="center">
 <?php
 // Kiểm tra giá trị của nút Submit gửi lên
 	switch($_POST['nut'])
 	{
		case 'Đăng nhập': // Nếu người dùng nhấn nút "Đăng nhập"
		{
			$user=$_REQUEST['txtuser']; // Lấy giá trị từ ô txtuser
			$pass=$_REQUEST['txtpass']; // Lấy giá trị từ ô txtpass
			// Kiểm tra xem cả 2 ô user và pass có được điền hay chưa
			if($user!='' && $pass!='')
			{
				// Gọi hàm mylogin. Nếu trả về 0 (sai tài khoản/mật khẩu)
				if($p->mylogin($user,$pass)==0)
				{
					echo 'Đăng nhập không thành công ( sai username hoặc password). ';
				}
				// Nếu đúng, hàm mylogin() đã tự động chuyển hướng sang admin.php
			}
			else // Nếu một trong 2 ô bị trống
			{
				echo 'Vui lòng nhập đầy đủ thông tin. ';	
			}	
			break;	
		}	 
	}
 ?>
</form>
</body>
</html>