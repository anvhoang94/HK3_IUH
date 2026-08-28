<html>
<head>
<meta content="charset=utf-8" />
<meta charset="utf-8" />
<title>Bài 1.5</title>
</head>
<body>
<?php
$lanLap = 0;

do {
    $lanLap++;
    $x = rand(0, 100);
    
    // Bình phương của x
    $binhPhuong = $x * $x; 

} while ($binhPhuong <= 5000); // Lặp lại nếu bình phương chưa lớn hơn 5000

// Định dạng kết quả xuất ra
$x_formatted = number_format($x);
$binhPhuong_formatted = number_format($binhPhuong);

echo "Sau $lanLap lần lặp, đã tìm thấy x = $x_formatted <br>";
echo "Bình phương $x_formatted^2 = <strong>$binhPhuong_formatted</strong> (lớn hơn 5,000)!";
?>
</body>
</html>
