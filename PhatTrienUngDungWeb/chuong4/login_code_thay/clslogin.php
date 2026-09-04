<?php
class login
{
	// Định nghĩa hàm mylogin nhận vào 2 tham số: $user và $pass
	public function mylogin($user,$pass)
	{
		// Kiểm tra xem username có đúng là 'abc@gmail.com' và password có đúng là '123456' hay không
		if($user=='abc@gmail.com' && $pass=='123456')
		{
			session_start(); // Khởi tạo phiên làm việc (Session) để lưu thông tin
			$_SESSION['user']=$user; // Lưu tài khoản vào biến Session 'user'
			$_SESSION['pass']=$pass; // Lưu mật khẩu vào biến Session 'pass'
			header('location:admin.php'); // Chuyển hướng người dùng sang trang admin.php
			exit();	// Dừng hoàn toàn luồng xử lý code bên dưới sau khi chuyển hướng
		}
		else // Nếu thông tin đăng nhập không đúng
		{
			return 0;	// Trả về giá trị 0 báo hiệu đăng nhập thất bại
		}	
	}
	// Định nghĩa hàm confirmlogin để kiểm tra quyền truy cập vào trang bảo mật
	public function confirmlogin($user,$pass)
	{
		// Nếu username KHÁC 'abc@gmail.com' HOẶC password KHÁC '123456'
		if($user!='abc@gmail.com' || $pass!='123456')
		{
			header('location:login.php'); // Đá người dùng quay lại trang login.php
			exit();// Dừng xử lý script
		}
	}
}
?>