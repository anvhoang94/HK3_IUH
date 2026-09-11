<?php
include ("KetNoiCSDL.php");
$sql = "SELECT name FROM sinhvien WHERE id=?";
$id = 2;

// Đã sửa cú pháp khai báo mảng để tương thích với mọi bản PHP
$data = array($id); 

$result = $pdo->prepare($sql);

// Thêm cặp ngoặc nhọn {} cho khối lệnh if để code rõ ràng, an toàn
if($result->execute($data)) 
{
    while($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        echo '<br>'.'Thong tin: '.$row['name'];	
    }
}
else
{
    echo 'Loi truy van';	
}
?>