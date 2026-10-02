<?php
session_start();

// Xóa file.
if (isset($_POST['xoa']))
{
	$name=$_SESSION['tenfile'];
	if (file_exists("uploads/".$name))
	{
		unlink("uploads/".$name);
	}
	unset($_SESSION['tenfile']);
	header("Location: dangky.php");
	exit();
}

// Đăng xuất.
if (isset($_POST['dangxuat']))
{
	session_destroy();
	header("Location: dangky.php");
	exit();
}

// Nếu truy cập trực tiếp xuly.php.
if ($_SERVER["REQUEST_METHOD"] != "POST")
{
	header("Location: dangky.php");
	exit();
}

// Nhận dữ liệu.
$hoten=$_POST["hoten"];
$email=$_POST["email"];
$matkhau=$_POST["matkhau"];
$gioitinh=$_POST["gioitinh"];

if (isset($_POST["sothich"]))
{
	$sothich=$_POST["sothich"];
}
else
{
	$sothich=array();
}

// Tạo Cookie lưu họ tên và email.
setcookie("hoten",$hoten,time()+3600);
setcookie("email",$email,time()+3600);

// Upload ảnh.
$name=$_FILES['anhdaidien']['name'];
$tmp_name=$_FILES['anhdaidien']['tmp_name'];
if ($name != "")
{
	$name=time()."_".$name;
	$duongdan="uploads/".$name;
	if (move_uploaded_file($tmp_name,$duongdan))
	{
		$_SESSION["tenfile"]=$name;
	}
}

?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Thông tin đăng ký</title>
</head>
<body>
<h2>THÔNG TIN ĐĂNG KÝ</h2>
<?php

echo "Họ và tên: ".$hoten."<br>";
echo "Email: ".$email."<br>";
echo "Mật khẩu: ".$matkhau."<br>";
echo "Giới tính: ".$gioitinh."<br>";
echo "Sở thích: ";

foreach ($sothich as $st)
{
	echo $st." ";
}
echo "<br>";
if ($name != "")
{
	echo "Ảnh đại diện:<br>";
	echo "<img src='".$duongdan."' width='200'>";
	echo "<br><br>";
}

?>
<form method="post">
	<input type="submit" name="xoa" value="Xóa file">
</form>
<br>
<form method="post">
	<input type="submit" name="dangxuat" value="Đăng xuất">
</form>
</body>
</html>