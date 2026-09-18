<?php
include ('myclass/clscsdl.php');
$p = new csdl();

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	$p->xuatbangsinhvien("select * from sinhvien order by ten asc");
?>
<hr />
<?php
	$p->xuatcomboboxsv("select id, masv, hodem, ten from sinhvien order by ten asc");
?>
</body>
</body>
</html>