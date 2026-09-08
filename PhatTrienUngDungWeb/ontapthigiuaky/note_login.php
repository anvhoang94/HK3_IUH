<?php
// 1. CHUẨN BỊ MÔI TRƯỜNG
// Nhúng file chứa định nghĩa lớp 'ontap' vào trang để có thể sử dụng các hàm bên trong
include 'classontap/clsontap.php';

// Khởi tạo đối tượng $p từ lớp 'ontap'. Nhờ đối tượng này, ta mới gọi được hàm mylogin() ở bên dưới.
$p = new ontap();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<!-- 2. GIAO DIỆN FORM ĐĂNG NHẬP -->
<!-- Form gửi dữ liệu ngầm lên máy chủ thông qua phương thức POST -->
<form id="form1" name="form1" method="post">
    <p>Nhập email
        <input type="text" name="txtemail" id="txtemail">
    </p>
    <p>Nhập password
        <!-- Ghi chú thực tế: Bạn nên dùng type="password" thay vì "text" để ký tự hiển thị dưới dạng dấu chấm ẩn -->
        <input type="text" name="txtpass" id="txtpass">
    </p>
    <p>
        <input type="submit" name="nut" id="nut" value="Đăng nhập">
    </p>

<?php
// 3. XỬ LÝ LÔ-GIC KHI NHẤN NÚT
// Tạm tắt cảnh báo lỗi "undefined index" của PHP khi trang vừa tải lên (lúc người dùng chưa bấm nút)
error_reporting(0); 

// Kiểm tra xem nút có tên 'nut' gửi lên có mang giá trị 'Đăng nhập' hay không
switch($_POST['nut'])
{
	case 'Đăng nhập':
	{
		// Rút trích dữ liệu người dùng vừa gõ vào form thông qua biến siêu toàn cục $_REQUEST
		$user = $_REQUEST['txtemail'];
		$pass = $_REQUEST['txtpass'];
        
		// Kiểm tra sơ bộ: Đảm bảo cả hai ô nhập liệu không bị bỏ trống
		if($user != '' && $pass != '')
		{
			// Gọi hàm mylogin() để đối chiếu cơ sở dữ liệu hoặc tài khoản tĩnh.
			// Dựa trên cấu trúc lớp ontap, nếu tài khoản/mật khẩu sai, hàm mylogin sẽ trả về 0.
			if($p->mylogin($user, $pass) == 0)
			{
				echo 'Đăng nhập không thành công ( sai username hoặc password)';
			}
            // Lưu ý: Nếu thông tin đúng, hàm mylogin bên trong thường sẽ tự động chạy session_start() và dùng lệnh header() để chuyển thẳng người dùng sang trang admin.php[cite: 1].
		}
		else
		{
            // Cảnh báo nếu người dùng chưa điền đủ thông tin
			echo 'Vui lòng nhập đầy đủ email và password.';	
		}
		break;
	}
}
?>
</form>
</body>
</html>
