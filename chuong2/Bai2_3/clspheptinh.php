<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
	class pheptinh
	{
		public function phepcong($a, $b)
		{
			return $a + $b;	
		}
		public function pheptru($a, $b)
		{
			return $a - $b;	
		}
		public function phepnhan($a, $b)
		{
			return $a * $b;	
		}
		public function phepchia($a, $b)
		{
			if ($b == 0)
			{
				return 'Không thể chia cho 0';	
			}
			return $a / $b;	
		}
	}

?>
<body>
</body>
</html>