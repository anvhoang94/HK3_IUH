<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<p>THÔNG TIN ĐĂNG KÝ</p>
<form method="post" action="xuly.php" enctype="multipart/form-data" name="form1" id="form1">
<p>
<label for="hoten">Họ và tên</label>
<input name="hoten" type="text" required="required" id="hoten">
</p>
<p>Email 
<input name="email" type="text" required="required" id="email">
</p>
<p>
<label for="matkhau">Mật khẩu </label><input name="matkhau" type="text" required="required" id="matkhau">
</p>
<p>Giới tính 
<input name="gioitinh" type="radio" required="required" id="radio" value="Nam">
<label for="gioitinh">Nam </label>
<input type="radio" name="gioitinh" id="radio2" value="Nữ">
<label for="gioitinh">Nữ </label>
<input type="radio" name="gioitinh" id="radio3" value="Khác">
<label for="gioitinh">Khác</label>
</p>
<p>Sở thích 
<input name="sothich[]" type="checkbox" id="sothich[]" value="Du lịch">
<label for="sothich[]">Du lịch </label>
<input name="sothich[]" type="checkbox" id="sothich[]" value="Nghe nhạc">
<label for="sothich[]">Nghe nhạc </label>
<input name="sothich[]" type="checkbox" id="sothich[]" value="Xem phim">
<label for="sothich[]">Xem phim </label>
</p>
<p>
<label for="anhdaidien">Ảnh đại diện :</label>
<input name="anhdaidien" type="file" required="required" id="anhdaidien">
</p>
<p>
<input type="submit" name="dangky" id="dangky" value="Đăng ký">
<input type="reset" name="reset" id="reset" value="Nhập lại">
</p>
</form>
</body>
</html>