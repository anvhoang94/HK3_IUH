<html>
<head>
<meta content="charset=utf-8" />
<meta charset="utf-8" />
<title>Bài 1.4</title>
<title>Hiển thị thông tin</title>
</head>
<style type="text/css">
	.body{margin: auto; padding-left: 100px;
padding-top: 20px:}
	.a_0{font-weight: bold;}
	.a_1{font-weight:normal; font-style: italic;}
</style>
<body>
<?php
for($i=0;$i<31;$i++)
{
	echo ' <span class="a_'.($i%2).'">'.$i.'</span>';
}
?>
</body>
</html>
