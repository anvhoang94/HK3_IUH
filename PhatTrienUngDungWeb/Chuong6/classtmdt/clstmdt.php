<?php
class csdltmdt
{
	private function connect()
	{
		$con=mysql_connect('localhost','usertmdt','passtmdt');
		if(!$con)
		{
			echo 'Loi ko truy cap duoc CSDL';
			exit();	
		}
		else
		{
			mysql_select_db('tmdt_db');
			mysql_query("SET NAMES UTF8");
			return $con;	
		}	
	}
	public function loaddscongty($sql)
	{
		$link=$this->connect();
		$ketqua=mysql_query($sql,$link);
		$i=mysql_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysql_fetch_array($ketqua))
			{
				$idcty=$row['idcty'];
				$tencty=$row['tencty'];
                echo '<a href="?idcty='.$idcty.'">'.$tencty.'</a>';
                echo '<br>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);	
	}
	public function loaddssanpham($sql)
	{
		$link=$this->connect();
		$ketqua=mysql_query($sql,$link);
		$i=mysql_num_rows($ketqua);
		if($i>0)
		{
			while($row=mysql_fetch_array($ketqua))
			{
				$idsp=$row['idsp'];
				$tensp=$row['tensp'];
				$gia=$row['gia'];
				$hinh=$row['hinh'];
				echo '<div id="sanpham">
						<div id="sanpham_ten">'.$tensp.'</div>
						<div id="sanpham_hinh"><img src="hinh/'.$hinh.'" width"161" height="161" alt=""/></div>
						<div id="sanpham_gia">Giá: '.$gia.'</div>
					 </div>';
			}
		}
		else
		{
			echo 'Không có dữ liệu';
		}
		mysql_close($link);	
	}	
}
?>