<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang Đăng Ký</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <header class="<?php echo isset($_COOKIE['bgcolor']) ? $_COOKIE['bgcolor'] : ''; ?>">
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
            <h3 style="text-align: center;">THÔNG TIN ĐĂNG KÝ</h3>

            <form action="" method="post">
                <table border="0" cellpadding="5">
                    <tr>
                        <td colspan="2"><b>Thông tin tài khoản</b></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="txtemail" required></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="txtpass" required></td>
                    </tr>
                    <tr>
                        <td>Nhập lại password</td>
                        <td><input type="password" name="txtrepass" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Thông tin cá nhân</b></td>
                    </tr>
                    <tr>
                        <td>Họ tên</td>
                        <td><input type="text" name="txthoten" required></td>
                    </tr>
                    <tr>
                        <td>Quê quán</td>
                        <td>
                            <select name="slquequan">
                                <option value="Chọn Tỉnh/Thành phố">Chọn Tỉnh/Thành phố</option>
                                <option value="Hà Nội">Hà Nội</option>
                                <option value="TP.HCM">TP.HCM</option>
                                <option value="Đà Nẵng">Đà Nẵng</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Điện thoại</td>
                        <td><input type="text" name="txtdienthoai" required></td>
                    </tr>
                    <tr>
                        <td>Giới tính</td>
                        <td>
                            <input type="radio" name="rdgioitinh" value="Nam" checked> Nam
                            <input type="radio" name="rdgioitinh" value="Nữ"> Nữ
                        </td>
                    </tr>
                    <tr>
                        <td>Sở thích</td>
                        <td>
                            <!-- Bước 2: Đặt value tương ứng với tên class CSS -->
                            <input type="checkbox" name="chkthich[]" value="bg_green"> Màu xanh
                            <input type="checkbox" name="chkthich[]" value="bg_red"> Màu đỏ
                            <input type="checkbox" name="chkthich[]" value="Đồng quê"> Đồng quê
                            <input type="checkbox" name="chkthich[]" value="Cao nguyên"> Cao nguyên
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="sbdangky" value="Đăng ký">
                            <input type="reset" value="Làm lại">
                        </td>
                    </tr>
                </table>
            </form>

            <?php
            if (isset($_POST['sbdangky'])) {
                $email = $_POST['txtemail'];
                $pass = $_POST['txtpass'];
                $repass = $_POST['txtrepass'];
                $hoten = $_POST['txthoten'];
                $quequan = $_POST['slquequan'];
                $dienthoai = $_POST['txtdienthoai'];
                $gioitinh = isset($_POST['rdgioitinh']) ? $_POST['rdgioitinh'] : '';

                // Xử lý sở thích & kiểm tra chọn màu sắc để lưu Cookie
                $selected_bg = "";
                $sothich_arr = array();

                if (isset($_POST['chkthich']) && is_array($_POST['chkthich'])) {
                    foreach ($_POST['chkthich'] as $item) {
                        if ($item === 'bg_green') {
                            $selected_bg = 'bg_green';
                            $sothich_arr[] = "Màu xanh";
                        } elseif ($item === 'bg_red') {
                            $selected_bg = 'bg_red';
                            $sothich_arr[] = "Màu đỏ";
                        } else {
                            $sothich_arr[] = $item;
                        }
                    }
                }
                $sothich = implode(", ", $sothich_arr);

                if ($pass !== $repass) {
                    echo "<p style='color: red; font-weight: bold;'>Mật khẩu nhập lại không khớp!</p>";
                } else {
                    // Bước 3: Lưu Cookie màu nền trong 10 ngày (10 * 24 * 3600 giây)
                    if ($selected_bg !== "") {
                        setcookie("bgcolor", $selected_bg, time() + (10 * 24 * 3600), "/");
                    } else {
                        // Nếu không chọn màu xanh/đỏ thì xóa cookie màu nền cũ nếu có
                        setcookie("bgcolor", "", time() - 3600, "/");
                    }

                    // Lưu tài khoản vào Session
                    if (!isset($_SESSION['users_list']) || !is_array($_SESSION['users_list'])) {
                        $_SESSION['users_list'] = array();
                    }

                    $_SESSION['users_list'][$email] = array(
                        'email' => $email,
                        'password' => $pass,
                        'hoten' => $hoten,
                        'quequan' => $quequan,
                        'dienthoai' => $dienthoai,
                        'gioitinh' => $gioitinh,
                        'sothich' => $sothich,
                        'bgcolor' => $selected_bg
                    );

                    header("Location: dangnhap.php?status=registered");
                    exit();
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