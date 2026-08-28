
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<table width="761" border="1" align="center">
  <tr>
    <td width="288">a=
      
        <label for="textfield2"></label>
        <input type="text" name="txta" id="txta" />
    </td>
    <td width="288">b=
      
        <label for="textfield3"></label>
        <input type="text" name="txtb" id="txtb" />
    </td>
    <td width="110">
      <input type="submit" name="nut" id="nut" value="+" />
      <input type="submit" name="nut" id="nut" value="-" />
      <input type="submit" name="nut" id="nut" value="*" />
	  <input type="submit" name="nut" id="nut" value=":" />
    </td>
  </tr>
  <tr>
    <td colspan="3">Kết quả: 
    	<?php
		switch($_POST['nut'])
		{
			case'+':
			{
				$a=$_REQUEST['txta'];
				$b=$_REQUEST['txtb'];
				
				echo($a + $b);
				break;	
			}
			case'-':
			{
				$a=$_REQUEST['txta'];
				$b=$_REQUEST['txtb'];
				
				echo($a - $b);
				break;	
			}
			case'*':
			{
				$a=$_REQUEST['txta'];
				$b=$_REQUEST['txtb'];
				
				echo($a * $b);
				break;	
			}
			case':':
			{
				$a=$_REQUEST['txta'];
				$b=$_REQUEST['txtb'];
				
				if ($b==0)
				{
				 	echo 'Không thể chia cho 0';	
				}else{
					echo ($a / $b);
				}
				break;	
			}	
		}
	?>
    </td>

  </tr>
</table>
</form>
</body>
</html>