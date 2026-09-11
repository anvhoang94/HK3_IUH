<?php
//INSERT
include("KetNoiCSDL_MySQL.php");
$sql = "INSERT INTO sinhvien (name) VALUES ('Nguyen Van A')";

if(mysql_query($sql, $con)) {
    echo "Them sinh vien thanh cong!";
} else {
    echo "Loi khi them: " . mysql_error();	
}
mysql_close($con);

//UPDATE
/*include("KetNoiCSDL_MySQL.php");
$sql = "UPDATE sinhvien SET name = 'Tran Van A Update' WHERE id = 1";

if(mysql_query($sql, $con)) {
    echo "Cap nhat thanh cong!";
} else {
    echo "Loi khi sua: " . mysql_error();	
}
mysql_close($con);*/

//DELETE
/*include("KetNoiCSDL_MySQL.php");
$sql = "DELETE FROM sinhvien WHERE id = 2";

if(mysql_query($sql, $con)) {
    echo "Xoa sinh vien thanh cong!";
} else {
    echo "Loi khi xoa: " . mysql_error();	
}
mysql_close($con);*/

?>
