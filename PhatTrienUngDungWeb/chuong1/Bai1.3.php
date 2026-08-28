<html>
<head>
<meta content="charset=utf-8" />
<meta charset="utf-8" />
<title>Bài 1.3</title>
</head>
<body>
<?php
$lanLap = 0;

// Vòng lặp while: Tiếp tục chạy KHI mà $x <= $y
// Chúng ta khởi tạo giá trị ban đầu để vào được vòng lặp
$x = 0;
$y = 0;

while ($x <= $y) {
    $lanLap++;
    $x = rand(0, 100);
    $y = rand(0, 100);
    
    echo "Lần $lanLap: x = $x, y = $y <br>";
}

echo "<strong>Đã tìm thấy cặp số thỏa mãn x > y ở lần lặp thứ $lanLap!</strong>";
?>
</body>
</html>
