<?php
include ("myclass/clslogin.php");
$p = new login();
session_start();
error_reporting(0);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post">
  <p>Nhập email:
    <input type="text" name="txtuser" id="txtuser">
  </p>
  <p>Nhập password:
    <input type="text" name="txtpass" id="txtpass">
  </p>
  <p>
    <input type="submit" name="nut" id="nut" value="Đăng nhập">
  </p>
  <div align="center">
  <?php
  	switch($_POST['nut'])
	{
		case 'Đăng nhập':
		{
			$user=$_REQUEST['txtuser'];
			$pass=$_REQUEST['txtpass'];
			if($user!='' && $pass!='')
			{
				if($p->mylogin($user,$pass)==0)
				{
					echo 'Đăng nhập không thành công (sai username hoặc password).';	
				}	
			}
			else
			{
				echo 'Vui lòng nhập đầy đủ thông tin. ';	
			}
			break;	
		}	
	}
  ?>
</form>
</body>
</html>