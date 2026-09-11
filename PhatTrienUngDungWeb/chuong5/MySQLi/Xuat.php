<?php
include ("KetNoiCSDL.php");
$sql = 'SELECT name FROM sinhvien'; //tên bảng là sinhvien và cột là name
$result = $con->query($sql);
if($result->num_rows > 0)
{
	while($row = $result->fetch_array())
	{
		echo 'Thong tin: '.$row['name'].'<br>';
	}	
}
else
{
	echo 'Khong co du lieu';	
}
$con->close();
?>