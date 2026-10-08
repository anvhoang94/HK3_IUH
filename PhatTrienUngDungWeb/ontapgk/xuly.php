<?php
session_start();
// xử lý đăng ký
if(isset($_POST['dangky']))
{
	// nhận thông tin
	$hoten=$_POST['hoten'];
	$email=$_POST['email'];
	$matkhau=$_POST['matkhau'];
	$gioitinh=$_POST['gioitinh'];
	
	if(isset($_POST['sothich']))
	{
		$sothich=$_POST['sothich'];	
	}
	else
	{
		$sothich=array();	
	}
	// lưu vào session
	$_SESSION['hoten']=$hoten;
	$_SESSION['email']=$email;
	$_SESSION['matkhau']=$matkhau;
	$_SESSION['gioitinh']=$gioitinh;
	$_SESSION['sothich']=$sothich;
	// upload ảnh
	$name=$_FILES['anhdaidien']['name'];
	$tmp_name=$_FILES['anhdaidien']['tmp_name'];
	$name=time().'_'.$name;
	$duongdan='upload/'.$name;
	if(move_uploaded_file($tmp_name,$duongdan))
	{
		$_SESSION['tenfile']=$name;	
	}
	header("location:xuly.php");
	exit();
}
// xóa ảnh
if(isset($_POST['xoa']))
{
	if(isset($_SESSION['tenfile']) && $_SESSION['tenfile'] != '')
	{
		$name=$_SESSION['tenfile'];
		$duongdan='upload/'.$name;
		if(file_exists($duongdan))
		{
			unlink($duongdan);
			$_SESSION['thongbao']='Xóa ảnh thành công';	
		}
		unset($_SESSION['tenfile']);	
	}
	header("location:xuly.php");
	exit();	
}
// xử lý đăng xuất
if(isset($_POST['dangxuat']))
{
	session_destroy();
	header("location:dangky.php");
	exit();	
}
// xử lý truy cập xuly.php về lại dangky.php
if(!isset($_SESSION['hoten']))
{
	header("location:dangky.php");
	exit();	
}
// lấy dữ liệu từ session
$hoten=$_SESSION['hoten'];
$email=$_SESSION['email'];
$matkhau=$_SESSION['matkhau'];
$gioitinh=$_SESSION['gioitinh'];

if(isset($_SESSION['sothich']))
{
	$sothich=$_SESSION['sothich'];	
}
else
{
	$sothich=array();	
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
// hiển thị thông tin
echo 'Họ và tên: '.$hoten.'<br>';
echo 'Email: '.$email.'<br>';
echo 'Mật khẩu: '.$matkhau.'<br>';
echo 'Giới tính: '.$gioitinh.'<br>';
echo 'Sở thích: ';
foreach($sothich as $st)
{
	echo $st . ' ';	
}
echo '<br>';
// hiển thị thông báo xóa ảnh
if(isset($_SESSION['thongbao']))
{
	echo $_SESSION['thongbao'];
	unset($_SESSION['thongbao']);	
}
// hiển thị ảnh
if(isset($_SESSION['tenfile']) && $_SESSION['tenfile'] != '')
{
	$name=$_SESSION['tenfile'];
	$duongdan='upload/'.$name;
	echo 'Ảnh đại diện: <br>';
	echo '<img src="'.$duongdan.'" width="300">';
	echo '<br><br>';
	echo '<a href="'.$duongdan.'"download>Tải ảnh</a>';
	echo '<br><br>';	
}
?>
<form method="post">
<?php
if(isset($_SESSION['tenfile']) && $_SESSION['tenfile'] != '')
{
	echo '<input type="submit" name="xoa" value="Xóa ảnh">';	
}
?>
<input type="submit" name="dangxuat" value="Đăng xuất">
</form>
</body>
</html>