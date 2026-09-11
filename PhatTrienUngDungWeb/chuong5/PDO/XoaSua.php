<?php 
include ("KetNoiCSDL.php");
/*$sql = "DELETE FROM sinhvien WHERE id=?"; //delete
$data = array(8); //delete*/
$sql = "UPDATE sinhvien SET name=? WHERE id=?"; //update
$data = array('Smaug', 1); //update

$result = $pdo->prepare($sql); // Nạp câu lệnh SQL vào biến $result
if($result -> execute($data))
{
	echo '<br>'.'Cap nhat thanh cong';	
}
else
{
	echo 'Cap nhat that bai';	
}
?>