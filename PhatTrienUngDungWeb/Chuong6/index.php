<?php
include('classtmdt/clstmdt.php');
$p= new csdltmdt();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="container">
	<div id="banner"></div>
    <div id="main">
    	<div id="mainleft">
        <?php
			$p->loaddscongty("select * from congty order by tencty asc");
		?>
        </div>
    	<div id="mainright">
        <?php
			if(isset($_REQUEST['idcty']))
			{
				$idcty=$_REQUEST['idcty'];
				$p->loaddssanpham("select * from sanpham where idcty='$idcty' order by gia asc");
			}
			else
			{
				$p->loaddssanpham("select * from sanpham order by gia asc");	
			}	
		?>
        </div>
    </div>
    <div id="footer"></div>
</div>
</body>
</html>