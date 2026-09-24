<?php 
include ("classtmdt/clstmdt.php");
$p=new csdltmdt();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	$p->xuatdanhsachcongty("select * from congty");
?>
</body>
</html>