<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 2.1</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  Xuất thông tin
</form>
<?php
	if (isset($_POST['txtten']))
	{
		echo $_POST['txtten'];
	}

?>
</body>
</html>