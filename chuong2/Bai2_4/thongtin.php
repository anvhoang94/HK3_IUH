<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
$ten = $_REQUEST['ten'];

if ($ten == 'an')
{
	echo 'Tác giả: Hoàng Vũ An<br>';
	echo 'Sinh năm : 1994';
}
else if ($ten == 'hai')
{
	echo 'Tác giả: Trần Văn Hải<br>';	
	echo 'Sinh năm : 1992';
}
else if ($ten == 'tai')
{
	echo 'Tác giả: Nguyễn Thành Tài<br>';
	echo 'Sinh năm : 1990';
}
?>
</body>
</html>