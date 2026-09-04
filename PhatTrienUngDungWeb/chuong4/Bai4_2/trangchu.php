<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <header>
        <h2>BANNER WEBSITE</h2>
    </header>

    <div class="main">
        <nav>
            <b>Menu</b><br><br>
            <a href="trangchu.php">Trang chủ</a><br>
            <a href="dangky.php">Đăng ký</a><br>
            <a href="dangnhap.php">Đăng nhập</a>
        </nav>

        <div class="content">
            <h3 style="text-align: center;">CHÀO MỪNG ĐẾN VỚI TRANG CHỦ</h3>
            
            <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true && isset($_SESSION['current_user'])): ?>
                <?php $info = $_SESSION['current_user']; ?>
                <h4 style="color: green;">THÔNG TIN TÀI KHOẢN VỪA ĐĂNG NHẬP:</h4>
                <p><b>Email:</b> <?php echo $info['email']; ?></p>
                <p><b>Họ tên:</b> <?php echo $info['hoten']; ?></p>
                <p><b>Quê quán:</b> <?php echo $info['quequan']; ?></p>
                <p><b>Điện thoại:</b> <?php echo $info['dienthoai']; ?></p>
                <p><b>Giới tính:</b> <?php echo $info['gioitinh']; ?></p>
                <p><b>Sở thích:</b> <?php echo $info['sothich']; ?></p>
                <br>
                <a href="dangxuat.php">Đăng xuất</a>
            <?php else: ?>
                <p>Chào mừng bạn! Vui lòng đăng ký / đăng nhập để xem thông tin.</p>
            <?php endif; ?>
        </div>
    </div>

    <footer>
        Footer website
    </footer>
</div>

</body>
</html>