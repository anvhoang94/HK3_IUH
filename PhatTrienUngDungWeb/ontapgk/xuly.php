<?php
session_start();
// truy cập trực tiếp xuly.php trở về trang dangky.php
if($_SERVER["REQUEST_METHOD"] != "POST")
{
	header("Location:dangky.php");
	exit();	
}
//Nhận dữ liệu
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
//Upload ảnh
$name=$_FILES['anhdaidien']['name'];
$tmp_name=$_FILES['anhdaidien']['tmp_name'];
if($name!='')
{
	$name=time().'_'.$name;
	$duongdan='uploads/'.$name;
	if(move_uploaded_file($tmp_name,$duongdan))
	{
		$_SESSION['tenfile']=$name;	
	}	
}
//Xóa ảnh
if(isset($_POST['xoa']))
{
	$name=$_SESSION['tenfile'];
	if(file_exists('uploads/'.$name))
	{
		unlink('uploads/'.$name);
		$_SESSION['thongbao']='Xóa ảnh thành công!';	
	}
	else
	{
		$_SESSION['thongbao']='Ảnh không tồn tại!';	
	}
	unset($_SESSION['tenfile']);
	header("location:xuly.php");
	exit();	
}
//Đăng xuất
if(isset($_POST['dangxuat']))
{
	session_destroy();
	header("location:dangky.php");
	exit();	
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<h2>Thông tin đăng ký</h2>
<?php
echo 'Họ và tên: '.$hoten.'<br>';
echo 'Email: '.$email.'<br>';
echo 'Mật khẩu: '.$matkhau.'<br>';
echo 'Giới tính: '.$gioitinh.'<br>';
echo 'Sở thích: ';

foreach ($sothich as $st)
{
	echo $st." ";	
}
echo '<br>';
if(isset($_SESSION['thongbao']))
{
	echo '<p style="color:green;">'.$_SESSION['thongbao'].'</p>';
	unset($_SESSION['thongbao']);
}
if(isset($_SESSION['tenfile']) && $_SESSION['tenfile']!='')
{
	$name=$_SESSION['tenfile'];
	$duongdan='uploads/'.$name;
	echo 'Ảnh đại diện:<br>';
	echo "<img src='".$duongdan."'width='200'>";
	echo '<br><br>';
	echo "<a href='".$duongdan."' download>Tải ảnh</a>";
	echo '<br><br>';	
}

?>
<form method="post">
	<input type="submit" name="xoa" value="Xóa file">
    <input type="submit" name="dangxuat" value="Đăng xuất">
</form>
</body>
</html>