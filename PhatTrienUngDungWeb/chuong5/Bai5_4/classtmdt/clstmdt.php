<?php
class csdltmdt
{
	Private function connect()
	{
		$con = new mysqli("localhost","usertmdt","passtmdt","tmdt_db");
		if($con->connect_error)
		{
			echo 'Không kết nối được CSDL';
			exit();	
		}
		else
		{
			$con->query("set names 'utf8'");
			return $con;	
		}
	}
	public function xuatdulieu($sql)
	{
		$arr = array();
		$link=$this->connect();
		$result=$link->query($sql);
		if($result->num_rows>0)
		{
			while($row=$result->fetch_assoc())
			{
				$arr[]=$row;	
			}
			return $arr;	
		}	
	}	
}
?>