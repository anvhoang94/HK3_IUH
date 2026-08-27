<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bai 3_2</title>
</head>

<body>
<form method="post" enctype="multipart/form-data" name="form1" id="form1">
  <label for="fileField">File:</label>
  <input type="file" name="file[]" id="file[]">
  <input type="submit" name="sbupload" id="sbupload" value="Upload file">
</form>
<?php
	if(isset($_POST["sbupload"]))
	{
		for($i=0;$i<count($_FILES["file"]["name"]);$i++)
		{
			echo '<div style="float:left; border:1px solid
			c9c9c9; padding:10px; height: 300px; margin: 5px;">';
			$name_new=pathinfo($_FILES["file"]["name"][$i],PATHINFO_FILENAME) ."_".rand(100,999);
			$ext=pathinfo($_FILES["file"]["name"][$i],PATHINFO_EXTENSION);
			$filename_new=$name_new.".".$ext;
				echo "Tên file ban đầu: ".$_FILES["file"]["name"][$i];
				echo "<br />Tên file thay đổi:".$filename_new;
				echo "<br />Kích thước: ".round($_FILES["file"]["size"][$i]/1024)."KB";
				echo "<br />Loại
			file:".$_FILES["file"]["type"][$i];
				echo "<br /> Tên file tạm: ".$_FILES["file"]["tmp_name"][$i];
				echo "<p />";
				if($_FILES["file"]["error"][$i]>0)
				echo "Lỗi trong quá trình upload";
				else
				move_uploaded_file($_FILES["file"]["tmp_name"][$i],"hinhanh/".$filename_new);
				if($ext=='png' || $ext=='jpg' || $ext=='gif' )
				echo '<img src="hinhanh/'.$filename_new.'" width="200">';
				else
					echo 'Không phải file ảnh';
				echo '</div>';	
		}	
	}
?>
</body>
</html>