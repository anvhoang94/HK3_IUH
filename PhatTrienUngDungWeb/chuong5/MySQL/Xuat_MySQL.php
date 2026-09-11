<?php
include ("KetNoiCSDL_MySQL.php");
$sql = "SELECT * FROM sinhvien";
$result=mysql_query($sql,$con);
while($row=mysql_fetch_array($result))
{
	echo $row['name']."<br>";	
}
mysql_close($con); //sửa lại link thành con (ko giống trong sách)
?>