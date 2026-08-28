<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" enctype="multipart/form-data">
  <input type="file" name="fileUpload" id="fileUpload" value="Choose File"> 
  No File Chosen 
  <input type="submit" name="submit2" id="submit2" value="Upload File">
  <?php
  	if (isset($_FILES['fileUpload']))
	{
		echo "<pre>";
		var_dump($_FILES['fileUpload']);
		echo "</pre>";	
	}
  ?>
</form>
</body>
</html>