<?php
session_start();

// Nếu người dùng đã đăng nhập rồi thì cho chuyển sang trangchu.php luôn
if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
    header("Location: trangchu.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang Đăng Nhập</title>
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
            <h3 style="text-align: center;">THÔNG TIN ĐĂNG NHẬP</h3>

            <?php if (isset($_GET['status']) && $_GET['status'] == 'registered'): ?>
                <p style="color: green; font-weight: bold; text-align: center;">
                    Đăng ký thành công! Mời bạn đăng nhập tài khoản vừa tạo.
                </p>
            <?php endif; ?>

            <form id="form1" name="form1" method="post" action="">
                <table border="0" cellpadding="5">
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="textemail" id="textemail" required></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="textpassword" id="textpassword" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="sbdangnhap" id="sbdangnhap" value="Đăng nhập">
                            <input type="reset" name="button2" id="button2" value="Làm lại">
                        </td>
                    </tr>
                </table>
            </form>

            <hr>

            <?php
            if (isset($_POST['sbdangnhap'])) {
                $email = $_POST['textemail'];
                $password = $_POST['textpassword'];

                // Kiểm tra tài khoản trong danh sách đã đăng ký
                $users = isset($_SESSION['users_list']) ? $_SESSION['users_list'] : array();

                if (isset($users[$email]) && $users[$email]['password'] === $password) {
                    // Đăng nhập đúng -> Lưu lại thông tin người dùng hiện tại
                    $_SESSION['is_logged_in'] = true;
                    $_SESSION['current_user'] = $users[$email];

                    header("Location: trangchu.php");
                    exit();
                } else {
                    echo "<p style='color: red; font-weight: bold;'>Đăng nhập thất bại! Email hoặc mật khẩu không đúng.</p>";
                }
            }
            ?>
        </div>
    </div>

    <footer>
        Footer website
    </footer>
</div>

</body>
</html>