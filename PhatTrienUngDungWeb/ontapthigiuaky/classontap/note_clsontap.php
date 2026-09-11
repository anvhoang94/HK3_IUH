<?php
// Khai báo lớp 'ontap' chứa các phương thức xử lý upload và đăng nhập
class ontap
{
	// 1. Hàm xử lý upload file
	// Nhận vào 3 tham số: tên file gốc ($name), đường dẫn file tạm ($tmp_name), và thư mục đích ($folder)
	public function uploadfile($name, $tmp_name, $folder)
	{
		// Nối chuỗi tạo đường dẫn lưu file hoàn chỉnh (VD: hinhanh/anhtest.png)
		$name = $folder . '/' . $name;
		
		// Hàm move_uploaded_file chuyển file từ thư mục tạm của XAMPP/WAMP sang thư mục đích
		if(move_uploaded_file($tmp_name, $name))
		{
			// Nếu di chuyển thành công, trả về 1 (True)
			return 1;	
		}
		else
		{
			// Nếu thất bại (thư mục không tồn tại, sai quyền...), trả về 0 (False)
			return 0;	
		}	
	}	

	// 2. Hàm xử lý đăng nhập
	// Nhận vào tài khoản ($user) và mật khẩu ($pass) do người dùng nhập từ form
	public function mylogin($user, $pass)
	{
		// Kiểm tra thông tin đăng nhập với tài khoản tĩnh được gán cứng (hardcode)
		if($user == 'abc@gmail.com' && $pass == '123456' )
		{
			// Nếu đúng tài khoản và mật khẩu, khởi tạo phiên làm việc (Session)
			session_start();
			
			// Lưu thông tin người dùng vào mảng toàn cục $_SESSION
			$_SESSION['user'] = $user;
			$_SESSION['pass'] = $pass;	
			
			// Điều hướng người dùng thẳng sang trang quản trị admin.php
			header('location:admin.php');
		}
		else
		{
			// Nếu sai tài khoản hoặc mật khẩu, trả về 0 để báo lỗi
			return 0;	
		}	
	}

	// 3. Hàm kiểm tra quyền truy cập (Bảo vệ trang Admin)
	// Dùng để chặn những người chưa đăng nhập mà cố tình gõ URL vào thẳng trang admin
	public function confirmlogin($user, $pass)
	{
		// Nếu tài khoản HOẶC mật khẩu không khớp với dữ liệu gốc
		if($user != 'abc@gmail.com' || $pass != '123456')
		{
			// Lập tức đá người dùng về lại trang đăng nhập
			header('location:login.php');	
		}
		else
		{
			// Nếu thông tin hợp lệ (đã đăng nhập chuẩn), trả về 0 (cho phép ở lại trang)
			return 0;
		}
	}
}
?>
