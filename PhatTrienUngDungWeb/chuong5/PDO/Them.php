<?php
include ("KetNoiCSDL.php");
$sql = "INSERT INTO sinhvien (name) values (?)";
$data = array('Nguyen A');
$result = $pdo->prepare($sql);
if($result->execute($data))
{
	echo '<br>'."Them thanh cong";	
}
else
{
	echo "Them that bai";	
}
?>