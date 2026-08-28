<?php
include ("myclass/clsfile.php");
$p=new thaotacfile();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form method="post" enctype="multipart/form-data" name="form1" id="form1">
  Mời bạn chọn File 
  <input type="file" name="myfile" id="myfile">
  <input type="submit" name="nut" id="nut" value="Tải file lên">
  <?php
  	switch($_POST['nut'])
	{
		case 'Tải file lên':
		{
			$name=$_FILES['myfile']['name'];
			$name=time()."_".$name;
			$tmp_name=$_FILES['myfile']['tmp_name'];
			if($p->upfile($name,$tmp_name,"data")==1)
			{
				echo 'Upload file thành công';	
			}
			else
			{
				echo 'Không thành công';	
			}
		}	
	}
  ?>
</form>
</body>
</html>