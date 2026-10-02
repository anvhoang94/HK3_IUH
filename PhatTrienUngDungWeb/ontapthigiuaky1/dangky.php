<?php
// Khởi động session để lưu trạng thái người dùng đã vào từ trang đăng ký.
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <!-- Thiết lập bộ mã ký tự UTF-8 để hiển thị tiếng Việt. -->
    <meta charset="UTF-8">
    <!-- Tiêu đề của trang web. -->
    <title>Đăng ký thành viên</title>
</head>
<body>
    <!-- Tiêu đề chính của form. -->
    <h2>FORM ĐĂNG KÝ THÀNH VIÊN</h2>
    <form action="xuly.php" method="POST" enctype="multipart/form-data">
        <label>Họ và tên:</label>
        <input type="text" name="hoten" required>
        <br><br>
    <label>Email:</label>
<input type="email" name="email" required>
<br><br>
        <label>Mật khẩu:</label>
        <input type="password" name="matkhau" required>
        <br><br>
        <label>Giới tính:</label>
        <input type="radio" name="gioitinh" value="Nam" required>
        Nam
        <input type="radio" name="gioitinh" value="Nữ">
        Nữ
        <input type="radio" name="gioitinh" value="Khác">
        Khác
        <br><br>
        <label>Sở thích:</label>
        <input type="checkbox" name="sothich[]" value="Đọc sách">
        Đọc sách
        <input type="checkbox" name="sothich[]" value="Nghe nhạc">
        Nghe nhạc
        <input type="checkbox" name="sothich[]" value="Xem phim">
        Xem phim
        <input type="checkbox" name="sothich[]" value="Chơi game">
        Chơi game
        <input type="checkbox" name="sothich[]" value="Du lịch">
        Du lịch
        <br><br>
        <label>Ảnh đại diện:</label>
        <input type="file" name="anhdaidien" accept=".gif,.jpg,.jpeg,.png">
        <br><br>
        <input type="submit" name="dangky" value="Đăng ký">
        <input type="reset" value="Nhập lại">
    </form>
</body>
</html>
