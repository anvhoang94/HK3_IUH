<?php
session_start();
// 1. XỬ LÝ ĐĂNG KÝ
if(isset($_POST['dangky']))
{
    // Nhận thông tin
    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $matkhau = $_POST['matkhau'];
    $gioitinh = $_POST['gioitinh'];

    // Nhận sở thích
    if(isset($_POST['sothich']))
    {
        $sothich = $_POST['sothich'];
    }
    else
    {
        $sothich = array();
    }

    // 3. LƯU THÔNG TIN VÀO SESSION
    $_SESSION['hoten'] = $hoten;
    $_SESSION['email'] = $email;
    $_SESSION['matkhau'] = $matkhau;
    $_SESSION['gioitinh'] = $gioitinh;
    $_SESSION['sothich'] = $sothich;

    // 4. UPLOAD ẢNH
    $name = $_FILES['anhdaidien']['name'];
    $tmp_name = $_FILES['anhdaidien']['tmp_name'];
    $name = time() . '_' . $name;
    $duongdan = 'uploads/' . $name;
    if(move_uploaded_file($tmp_name, $duongdan))
    {
        $_SESSION['tenfile'] = $name;
    }
    else
    {
        echo 'Upload ảnh thất bại!';
        echo '<br><br>';
        echo '<a href="dangky.php">Quay lại trang đăng ký</a>';
        exit();
    }
	
    // Sau khi đăng ký thành công
    // chuyển sang xuly.php bằng GET
    header("Location: xuly.php");
    exit();
}

// 5. XỬ LÝ XÓA ẢNH
if(isset($_POST['xoa']))
{
    if(isset($_SESSION['tenfile']) && $_SESSION['tenfile'] != '')
    {
        $name = $_SESSION['tenfile'];
        $duongdan = 'uploads/' . $name;
        if(file_exists($duongdan))
        {
            unlink($duongdan);
            $_SESSION['thongbao'] = 'Xóa ảnh thành công!';
        }
        else
        {
            $_SESSION['thongbao'] = 'Ảnh không tồn tại!';
        }

        // Xóa tên file khỏi session
        unset($_SESSION['tenfile']);
    }
    else
    {
        $_SESSION['thongbao'] = 'Không có ảnh để xóa!';
    }

    // Quay lại xuly.php
    // để hiển thị thông báo
    header("Location: xuly.php");
    exit();
}

// 6. XỬ LÝ ĐĂNG XUẤT
if(isset($_POST['dangxuat']))
{
    session_destroy();
    header("Location: dangky.php");
    exit();
}

// Truy cập xuly.php về lại dangky.php
if(!isset($_SESSION['hoten']))
{
    header("Location: dangky.php");
    exit();
}

// 8. LẤY DỮ LIỆU TỪ SESSION
$hoten = $_SESSION['hoten'];
$email = $_SESSION['email'];
$matkhau = $_SESSION['matkhau'];
$gioitinh = $_SESSION['gioitinh'];

if(isset($_SESSION['sothich']))
{
    $sothich = $_SESSION['sothich'];
}
else
{
    $sothich = array();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thông tin đăng ký</title>
</head>
<body>
<h2>Thông tin đăng ký</h2>
<?php
// 9. HIỂN THỊ THÔNG TIN
echo 'Họ và tên: ' . $hoten . '<br>';
echo 'Email: ' . $email . '<br>';
echo 'Mật khẩu: ' . $matkhau . '<br>';
echo 'Giới tính: ' . $gioitinh . '<br>';
echo 'Sở thích: ';
// Hiển thị sở thích
foreach($sothich as $st)
{
    echo $st . ' ';
}
echo '<br>';

// 10. HIỂN THỊ THÔNG BÁO
if(isset($_SESSION['thongbao']))
{
    echo '<p style="color:green;">';
    echo $_SESSION['thongbao'];
    echo '</p>';

    // Hiển thị một lần rồi xóa
    unset($_SESSION['thongbao']);
}

// 11. HIỂN THỊ ẢNH
if(isset($_SESSION['tenfile']) && $_SESSION['tenfile'] != '')
{
    $name = $_SESSION['tenfile'];
    $duongdan='uploads/'.$name;
    echo 'Ảnh đại diện:<br>';
    echo '<img src="'.$duongdan.'" width="200">';
    echo '<br><br>';
    echo '<a href="'.$duongdan.'" download>Tải ảnh</a>';
    echo '<br><br>';
}
?>

<!-- ========================================
     12. FORM XÓA ẢNH / ĐĂNG XUẤT
     ======================================== -->
<form method="post">
<?php
if(isset($_SESSION['tenfile']) && $_SESSION['tenfile'] != '')
{
?>
    <input type="submit" name="xoa" value="Xóa ảnh">
<?php
}
?>
    <input type="submit" name="dangxuat" value="Đăng xuất">
</form>
</body>
</html>
