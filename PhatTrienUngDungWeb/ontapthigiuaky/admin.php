<?php
session_start();
if(isset($_SESSION['user']) && isset($_SESSION['pass']))
{
	include 'classontap/clsontap.php';
	$p= new ontap();
	$p->confirmlogin($_SESSION['user'], $_SESSION['pass']);
}
else
{
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
<form method="post" enctype="multipart/form-data" name="form1" id="form1">
<label for="fileField">Chọn File</label>
<input type="file" name="myfile" id="myfile">
<input type="submit" name="nut" id="nut" value="Tải lên">
<?php
switch($_POST['nut'])
{
	case 'Tải lên':
	{
		$name=$_FILES['myfile']['name'];
		$tmp_name=$_FILES['myfile']['tmp_name'];
		$size=$_FILES['myfile']['size'];
		if($name!= '' && $size > 0)
		{
			$name=time().'_'.$name;
			if($p->uploadfile($name, $tmp_name, "dulieu")==1)
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