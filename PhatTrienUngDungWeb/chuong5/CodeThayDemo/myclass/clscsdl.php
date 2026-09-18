<?php
class csdl
{
	private function connect()
	{
		$con=mysql_connect('localhost','dhcntt21avl','123456');
		if(!$con)
		{
			echo 'Không kết nối được CSDL';
			exit();	
		}
		else
		{
			mysql_select_db('dhcntt21avl_db');
			mysql_query("SET NAMES UTF8");
			return $con;	
		}	
	}
	public function xuatbangsinhvien($sql)
	{
		$link=$this->connect();
		$ketqua=mysql_query($sql,$link);
		$i=mysql_num_rows($ketqua);
		if($i>0)
		{
			echo '<table width="1000" border="1" align="center">
					<tbody>
					<tr>
					<td align="center"><strong>STT</strong></td>
					<td align="center"><strong>MASV</strong></td>
					<td align="center"><strong>HỌ ĐỆM</strong></td>
					<td align="center"><strong>TÊN</strong></td>
					<td align="center"><strong>LỚP</strong></td>
					</tr>';
			$dem=1;
			while($row=mysql_fetch_array($ketqua))
			{
				$id=$row['id'];	
				$masv=$row['masv'];	
				$hodem=$row['hodem'];	
				$ten=$row['ten'];
				$lop=$row['lop'];
				echo '<tr>
						<td align="center" valign="middle">'.$dem.'</td>
						<td align="center" valign="middle">'.$masv.'</td>
						<td align="center" valign="middle">'.$hodem.'</td>
						<td align="center" valign="middle">'.$ten.'</td>
						<td align="center" valign="middle">'.$lop.'</td>
						</tr>';	
				$dem++;
			}
			echo '</table>';
		}
		else
		{
			echo 'Không có dữ liệu';
		}	
		mysql_close($link);	
	}	
	public function xuatcomboboxsv($sql)
	{
		$link=$this->connect();
		$ketqua=mysql_query($sql,$link);
		$i=mysql_num_rows($ketqua);
		if($i>0)
		{
			echo '<select name="select" id="select">';
			echo '<option value="0">Mời chọn</option>';
			while($row=mysql_fetch_array($ketqua))
			{
				$id=$row['id'];	
				$masv=$row['masv'];	
				$hodem=$row['hodem'];	
				$ten=$row['ten'];
				$xuat=$masv.' - '.$hodem.' - '.$ten;
				echo '<option value="'.$id.'">'.$xuat.'</option>';
			}
			echo '</select>';
		}
		else
		{
			echo 'Không có dữ liệu';
		}	
		mysql_close($link);	
	}
}
?>