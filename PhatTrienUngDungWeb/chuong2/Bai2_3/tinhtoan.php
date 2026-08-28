<?php
include_once('clspheptinh.php');
$pt = new pheptinh();
$ketqua = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = isset($_POST['textfield']) ? floatval($_POST['textfield']) : 0;
    $b = isset($_POST['textfield2']) ? floatval($_POST['textfield2']) : 0;
    
    // Xác định nút bấm nào đã được nhấn
    $pt_type = "";
    if (isset($_POST['button']))  $pt_type = "+";
    if (isset($_POST['button2'])) $pt_type = "-";
    if (isset($_POST['button3'])) $pt_type = "*";
    if (isset($_POST['button4'])) $pt_type = "/";

    // Sử dụng switch case để gọi các phương thức tương ứng
    switch ($pt_type) {
        case "+":
            $ketqua = $pt->phepcong($a, $b);
            break;
        case "-":
            $ketqua = $pt->pheptru($a, $b);
            break;
        case "*":
            $ketqua = $pt->phepnhan($a, $b);
            break;
        case "/":
            $ketqua = $pt->phepchia($a, $b);
            break;
        default:
            $ketqua = "Chưa chọn phép tính!";
            break;
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>a = 
    <label for="textfield"></label>
    <input type="text" name="textfield" id="textfield" value="<?php echo isset($_POST['textfield']) ? $_POST['textfield'] : ''; ?>" />
    b = 
    <label for="textfield2"></label>
    <input type="text" name="textfield2" id="textfield2" value="<?php echo isset($_POST['textfield2']) ? $_POST['textfield2'] : ''; ?>" />
  </p>
  <p>
    <input type="submit" name="button" id="button" value="+" />
    <input type="submit" name="button2" id="button2" value="-" />
    <input type="submit" name="button3" id="button3" value="*" />
    <input type="submit" name="button4" id="button4" value="/" />
  </p>
  <?php if ($ketqua !== ""): ?>
    <p><strong>Kết quả:</strong> <?php echo $ketqua; ?></p>
  <?php endif; ?>
</form>
</body>
</html>