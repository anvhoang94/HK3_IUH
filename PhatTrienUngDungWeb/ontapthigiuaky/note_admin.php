<?php
session_start(); // 1. Mở phiên làm việc để đọc dữ liệu từ biến toàn cục $_SESSION

// 2. KIỂM TRA QUYỀN TRUY CẬP (BẢO VỆ TRANG)
if(isset($_SESSION['user']) && isset($_SESSION['pass']))
{
	// Nếu người dùng đã có thông tin phiên làm việc, nhúng file chứa class xử lý vào
	include 'classontap/clsontap.php';
	$p = new ontap(); // Khởi tạo đối tượng
	
	// Gọi hàm kiểm tra xem tài khoản và mật khẩu này có hợp lệ không.
	// Nếu sai, hàm này sẽ đóng vai trò bảo vệ và lập tức đẩy người dùng về lại trang đăng nhập.
	$p->confirmlogin($_SESSION['user'], $_SESSION['pass']);
}
else
{
	// Nếu người dùng chưa từng đăng nhập (không có session), chặn truy cập và chuyển về login.php	
	header('location:login.php');	
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
 <p>Upload File lên Server</p>

<!-- 3. GIAO DIỆN FORM UPLOAD -->
<!-- Bắt buộc phải có enctype="multipart/form-data" thì PHP mới nhận diện được dữ liệu tệp tin -->
<form method="post" enctype="multipart/form-data" name="form1" id="form1">
	<label for="fileField">Chọn File</label>
	<input type="file" name="myfile" id="myfile">
	<input type="submit" name="nut" id="nut" value="Tải lên">

<?php
// 4. XỬ LÝ DỮ LIỆU KHI NHẤN NÚT
// Kiểm tra giá trị của nút được submit (tên là 'nut')
error_reporting(0); // Tạm tắt cảnh báo undefined index (nếu chưa bấm nút)
switch($_POST['nut'])
{
	case 'Tải lên':
	{
		// Rút trích các thông số của tệp từ biến siêu toàn cục $_FILES
		$name = $_FILES['myfile']['name'];           // Tên file gốc trên máy tính
		$tmp_name = $_FILES['myfile']['tmp_name'];   // Đường dẫn file đang nằm tạm trên server
		$size = $_FILES['myfile']['size'];           // Kích thước của file
		
		// Chỉ tiếp tục nếu người dùng đã thực sự chọn file và file không bị rỗng
		if($name != '' && $size > 0)
		{
			// Đổi tên file để tránh trùng lặp bằng cách gắn thêm mốc thời gian (vd: 1693110000_anhtest.png)
			$name = time() . '_' . $name;
			
			// Gọi hàm uploadfile() để di chuyển file từ thư mục tạm sang thư mục đích ("dulieu")
			// Trả về 1 nếu hàm dùng lệnh move_uploaded_file thành công
			if($p->uploadfile($name, $tmp_name, "dulieu") == 1)
			{
				echo 'Upload File thành công !';
			}
			else
			{
				echo 'Upload file không thành công';	
			}
		}
		else
		{
		 	echo 'Vui lòng chọn file cần upload.';	
		}
		break;	
	}	
}
?>
</form>

</body>
</html>
