<?php
class pheptinh
{
	public function phepcong($a,$b)
	{
		return $a+$b;	
	}
	public function pheptru($a,$b)
	{
		return $a-$b;	
	}
	public function phepnhan($a,$b)
	{
		return $a*$b;	
	}
	public function phepchia($a,$b)
	{
		if ($b==0)
		{
			return 'Không thể chia cho 0';	
		}
		return $a/$b;	
	}	
}

?>