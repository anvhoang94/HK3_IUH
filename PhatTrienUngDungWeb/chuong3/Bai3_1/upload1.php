<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<form method="post" enctype="multipart/form-data" name="form1" id="form1">
<label for="fileField">Mời chọn file:</label>
<input type="file" name="fileupload" id="fileupload">
<input type="submit" name="submit" id="submit" value="Upload File">
<?php
	if(isset($_FILES['fileupload']))
	{
		echo '<pre>';
		var_dump($_FILES['fileupload']);
		echo '</pre>';
	}
?>
</form>
</body>
</html>