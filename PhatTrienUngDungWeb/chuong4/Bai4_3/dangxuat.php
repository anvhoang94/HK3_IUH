<?php
session_start();

// Chỉ xóa trạng thái phiên đăng nhập của người dùng hiện tại
unset($_SESSION['is_logged_in']);
unset($_SESSION['current_user']);

// Chuyển hướng về trang chủ
header("Location: trangchu.php");
exit();
?>