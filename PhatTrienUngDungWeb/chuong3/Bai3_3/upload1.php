<!doctype html>
<html>
<head>
</style>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form method="post" enctype="multipart/form-data" name="form1" id="form1">
<label for="fileField">File:</label>
<input type="file" name="uploadfile[]" id="uploadfile[]" multiple>
<input type="submit" name="sbupload" id="sbupload" value="Upload File">
<?php
	if(isset($_POST['sbupload']))
	{
		for($i=0;$i<count($_FILES['uploadfile']['name']);$i++)
		{
			$name_new=pathinfo($_FILES['uploadfile']['name'][$i],PATHINFO_FILENAME)."_".rand(100,999);
			$ext=pathinfo($_FILES['uploadfile']['name'][$i],PATHINFO_EXTENSION);
			$filename_new=$name_new.'.'.$ext;
			echo '<br />';
			echo 'Tên file ban đầu: '.$_FILES['uploadfile']['name'][$i];
			echo '<br /> Tên file mới (sau khi đổi): '.$filename_new;
			echo '<br /> Kích thước file: '.round($_FILES['uploadfile']['size'][$i]/1024).'KB';
			echo '<br /> Nơi lưu file tạm: '.$_FILES['uploadfile']['tmp_name'][$i];
			echo '<br /> Nơi lưu file: '.$targetFile='hinhanh/'.$filename_new;
			echo "<p />";
		
			if($_FILES['uploadfile']['error'][$i]>0)
			{
				echo 'Lỗi trong quá trình upload';	
			}
			else
			{
				move_uploaded_file($_FILES['uploadfile']['tmp_name'][$i],$targetFile='hinhanh/'.$filename_new);	
			}
			if($ext=='png' || $ext=='jpg' || $ext=='gif')
			{
				echo '<img src="hinhanh/'.$filename_new.'" width="200">';	
			}
			else
			{
				echo 'Không phải file ảnh';	
			}
		}
	}
?>
</form>
</body>
</html>
