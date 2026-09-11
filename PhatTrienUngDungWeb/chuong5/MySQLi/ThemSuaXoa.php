<?php
include ("KetNoiCSDL.php");
$sql = "INSERT INTO sinhvien(id, name) values ('6','Cao Ba Quat')"; //insert
/*$sql = "UPDATE sinhvien SET name='Ngo Thi Tu' WHERE id='5'";*/ //update
/*$sql = "DELETE FROM sinhvien WHERE id='6'";*/ //delete
if($con->query($sql))
{
	echo 'Thuc hien thanh cong';	
}
else
{
	echo 'Thuc hien that bai'.$con->error;	
}
$con->close();
?>