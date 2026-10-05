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
<p><strong>FROM ĐĂNG KÝ THÀNH VIÊN
</strong></p>
<form action="xuly.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
<p>Họ và tên
<input type="text" name="hoten" id="hoten">
</p>
<p>Email
<input type="text" name="email" id="email">
</p>
<p>Mật khẩu
<input type="text" name="matkhau" id="matkhau">
</p>
<p>Giới tính 
<input name="gioitinh" type="radio" required="required" id="radio" value="Nam">
<label for="gioitinh">Nam
<input type="radio" name="gioitinh" id="radio2" value="Nữ">
Nữ </label>
<input type="radio" name="gioitinh" id="radio3" value="khác"> 
khác</p>
<p>Sở thích 
<input name="sothich[]" type="checkbox" id="sothich[]" value="Du lịch">
<label for="sothich[]">Du lịch </label>
<label for="gioitinh"> </label>
<input name="sothich[]" type="checkbox" id="sothich[]" value="Nghe nhạc">
<label for="sothich[]">Nghe nhạc</label>
<input name="sothich[]" type="checkbox" id="sothich[]" value="Xem phim">
<label for="sothich[]">Xem phim </label>
</p>
<p>Ảnh đại
diện
<label for="anhdaidien">:</label>
<input type="file" name="anhdaidien" id="anhdaidien">
</p>
<p>
<input type="submit" name="dangky" id="dangky" value="Đăng ký">
<input type="reset" name="reset" id="reset" value="Nhập lại">
</p>
</form>

</body>
</html>