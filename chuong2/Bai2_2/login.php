<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>Thông tin đăng nhập
</p>
  <p>Email</p>
  <p>
    <label for="textfield"></label>
    <input type="text" name="textemail" id="textemail" />
  </p>
  <p>Password</p>
  <p>
    <label for="textfield2"></label>
    <input type="password" name="textpassword" id="textpassword" />
  </p>
  <p>
    <input type="submit" name="sbdangnhap" id="sbdangnhap" value="Đăng nhập" />
    <input type="reset" name="button2" id="button2" value="Làm lại" />
  </p>
</form>
<?php
	if (isset($_POST['sbdangnhap']))
	{
		$email = $_POST['textemail'];
		$password = $_POST['textpassword'];
		
		if ($email == 'abc@gmail.com' && $password == '123456')
		{
			echo 'Đăng nhập thành công!';
		}
		else
		{
			echo 'Đăng nhập thất bại';
		}
	}
	
	
?>
</body>
</html>