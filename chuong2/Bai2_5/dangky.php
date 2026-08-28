<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang Đăng Ký</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <!-- BANNER / HEADER -->
    <header>
        <h2>BANNER WEBSITE</h2>
    </header>

    <!-- MAIN CONTENT (CONTENT + NAV) -->
    <div class="main">
        <!-- NỘI DUNG CHÍNH BÊN TRÁI -->
        <nav>
            <b>Menu</b><br><br>
            <a href="#">Trang chủ</a><br>
            <a href="#">Đăng ký</a><br>
            <a href="#">Đăng nhập</a>
        </nav>
        <div class="content">
            <h3 style="text-align: center;">THÔNG TIN ĐĂNG KÝ</h3>

            <!-- FORM NHẬP THÔNG TIN -->
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
                            <input type="checkbox" name="chkthich[]" value="Màu xanh"> Màu xanh
                            <input type="checkbox" name="chkthich[]" value="Màu đỏ"> Màu đỏ
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

            <hr>

            <!-- XỬ LÝ VÀ XUẤT THÔNG TIN SAU KHI BẤM "ĐĂNG KÝ" -->
            <?php
            if (isset($_POST['sbdangky'])) {
                $email = $_POST['txtemail'];
                $pass = $_POST['txtpass'];
                $hoten = $_POST['txthoten'];
                $quequan = $_POST['slquequan'];
                $dienthoai = $_POST['txtdienthoai'];
                $gioitinh = isset($_POST['rdgioitinh']) ? $_POST['rdgioitinh'] : '';

                // Xử lý mảng Checkbox sở thích
                $sothich = "";
                if (isset($_POST['chkthich']) && is_array($_POST['chkthich'])) {
                    $sothich = implode(", ", $_POST['chkthich']);
                }

                echo "<h3>THÔNG TIN ĐÃ ĐĂNG KÝ:</h3>";
                echo "Email: " . $email . "<br>";
                echo "Họ tên: " . $hoten . "<br>";
                echo "Quê quán: " . $quequan . "<br>";
                echo "Điện thoại: " . $dienthoai . "<br>";
                echo "Giới tính: " . $gioitinh . "<br>";
                echo "Sở thích: " . $sothich . "<br>";
            }
            ?>
        </div>

        <!-- MENU BÊN PHẢI -->
        
    </div>

    <!-- FOOTER -->
    <footer>
        Footer website
    </footer>
</div>

</body>
</html>