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
	public function xuatdanhsachcongty($sql)
	{
		$link=$this->connect();
		$ketqua=mysql_query($sql,$link);
		$i=mysql_num_rows($ketqua);
		if($i>0)
		{
			echo '<table width="902" border="1" align="center">
				  <tbody>
					<tr align="center">
					  <td width="59">STT</td>
					  <td width="165">TÊN CÔNG TY</td>
					  <td width="258">ĐỊA CHỈ</td>
					  <td width="243">ĐIỆN THOẠI</td>
					  <td width="143">FAX</td>
					</tr>';
			$dem=1;
			while($row=mysql_fetch_array($ketqua))
			{
				$idcty=$row['idcty'];
				$tencty=$row['tencty'];
				$diachi=$row['diachi'];
				$dienthoai=$row['dienthoai'];
				$fax=$row['fax'];	
				
				echo '<tr align="left">
						  <td>'.$dem.'</td>
						  <td>'.$tencty.'</td>
						  <td>'.$diachi.'</td>
						  <td>'.$dienthoai.'</td>
						  <td>'.$fax.'</td>
						</tr>';
					$dem++;
			}
			echo '</tbody>
					</table>';
		}
		else
		{
				
		}
		mysql_close($link);	
	}	
}
?>