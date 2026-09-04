<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phân Tích Lỗi Mã Nguồn PHP & Session</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.6;
            background-color: #f4f6f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #1a5276;
            text-align: center;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 25px;
        }
        h2 {
            color: #2980b9;
            background: #ebf5fb;
            padding: 10px 15px;
            border-left: 5px solid #3498db;
            border-radius: 3px;
            margin-top: 25px;
        }
        ul {
            padding-left: 20px;
        }
        li {
            margin-bottom: 15px;
        }
        .error-title {
            font-weight: bold;
            color: #c0392b;
        }
        code {
            background-color: #f8f9fa;
            border: 1px solid #e1e4e8;
            border-radius: 4px;
            padding: 2px 6px;
            color: #d63384;
            font-family: Consolas, Monaco, monospace;
            font-size: 0.95em;
        }
        pre {
            background-color: #282c34;
            color: #abb2bf;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            font-family: Consolas, Monaco, monospace;
        }
        pre code {
            background: none;
            border: none;
            color: inherit;
            padding: 0;
        }
        .highlight {
            color: #61afef;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>KẾT QUẢ PHÂN TÍCH VÀ SỬA LỖI MÃ NGUỒN PHP</h1>

    <h2>1. Trang 1: <code>session.php</code></h2>
    <ul>
        <li>
            <span class="error-title">Lỗi kiểm tra biến Session chưa khởi tạo:</span><br>
            <strong>Mô tả:</strong> Đoạn mã <code>if($_SESSION["ThongTin"])</code> kiểm tra trực tiếp biến session khi vừa truy cập trang (chưa nhấn nút "Gán"). Điều này gây ra lỗi <code>Notice/Warning: Undefined array key "ThongTin"</code>.<br>
            <strong>Khắc phục:</strong> Sử dụng hàm <code>isset()</code> để kiểm tra sự tồn tại của biến:<br>
            <code>if(isset($_SESSION["ThongTin"]) && $_SESSION["ThongTin"] != "")</code>
        </li>
        <li>
            <span class="error-title">Lỗi ký tự lạ trong thẻ HTML:</span><br>
            <strong>Mô tả:</strong> Trong đoạn mã các dòng <code>&lt;input&gt;</code> có chứa ký tự khoảng trắng không bẻ dòng (Non-breaking space <code>U+00A0</code>) thay vì dấu cách tiêu chuẩn.<br>
            <strong>Khắc phục:</strong> Xóa các khoảng trắng lùi dòng cũ và gõ lại bằng phím Space chuẩn.
        </li>
        <li>
            <span class="error-title">Lỗi sai đường dẫn liên kết:</span><br>
            <strong>Mô tả:</strong> Thẻ <code>&lt;a href='logout.php'&gt;</code> trỏ tới file <code>logout.php</code> trong khi đề bài yêu cầu trang 2 là <code>dangxuat.php</code>, dẫn đến lỗi 404.<br>
            <strong>Khắc phục:</strong> Đổi thành <code>href='dangxuat.php'</code>.
        </li>
        <li>
            <span class="error-title">Thẻ HTML chưa được đóng:</span><br>
            <strong>Mô tả:</strong> Thẻ <code>&lt;h3&gt;</code> ở khối PHP chưa có thẻ đóng <code>&lt;/h3&gt;</code>.
        </li>
    </ul>

    <h2>2. Trang 2: <code>dangxuat.php</code></h2>
    <ul>
        <li>
            <span class="error-title">Thiếu hàm <code>session_start()</code> (Nghiêm trọng):</span><br>
            <strong>Mô tả:</strong> File đọc dữ liệu từ <code>$_SESSION</code> nhưng không gọi hàm <code>session_start()</code> ở đầu file, khiến PHP không lấy được dữ liệu đã lưu từ trang trước.<br>
            <strong>Khắc phục:</strong> Thêm <code>session_start();</code> vào ngay đầu file PHP.
        </li>
        <li>
            <span class="error-title">Lỗi đặt hàm <code>header()</code> sai vị trí:</span><br>
            <strong>Mô tả:</strong> Lệnh <code>header("Location:session.php");</code> nằm dưới các thẻ HTML (<code>&lt;!doctype html&gt;</code>, <code>&lt;html&gt;</code>,...). Trong PHP, <code>header()</code> phải được gọi trước khi xuất bất kỳ dữ liệu/HTML nào ra trình duyệt, nếu không sẽ bị lỗi <i>Headers already sent</i>.<br>
            <strong>Khắc phục:</strong> Chuyển toàn bộ khối mã kiểm tra điều hướng PHP lên trên cùng của file (trước thẻ HTML).
        </li>
        <li>
            <span class="error-title">Chức năng Đăng xuất chưa hoàn thiện:</span><br>
            <strong>Mô tả:</strong> Trang tên là <code>dangxuat.php</code> nhưng không hề xử lý xóa Session (<code>unset()</code> hoặc <code>session_destroy()</code>), mà lại hiển thị lại dữ liệu session và link logout cũ.<br>
            <strong>Khắc phục:</strong> Thêm lệnh xóa session và điều hướng về <code>session.php</code>.
        </li>
        <li>
            <span class="error-title">Thẻ HTML chưa được đóng:</span><br>
            <strong>Mô tả:</strong> Thẻ <code>&lt;h3&gt;</code> mở nhưng chưa có thẻ đóng <code>&lt;/h3&gt;</code>.
        </li>
    </ul>

    <h2>3. Mã nguồn tối ưu đề xuất</h2>
    <p><strong>Code chuẩn cho <code>session.php</code>:</strong></p>
<pre><code>&lt;?php
session_start();
?&gt;
&lt;!doctype html&gt;
&lt;html&gt;
&lt;head&gt;
    &lt;meta charset="utf-8"&gt;
    &lt;title&gt;Session Demo&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;?php
if(isset($_POST['sbgan'])) {
    $_SESSION['ThongTin'] = $_POST['txtthongtin'];
}
?&gt;
&lt;form method="post"&gt;
    &lt;table&gt;
        &lt;tr&gt;
            &lt;td&gt;Gán giá trị cho biến session: &lt;/td&gt;
            &lt;td&gt;&lt;input type="text" name="txtthongtin"&gt;&lt;/td&gt;
            &lt;td&gt;&lt;input type="submit" value="Gán" name="sbgan"&gt;&lt;/td&gt;
        &lt;/tr&gt;
    &lt;/table&gt;
&lt;/form&gt;

&lt;h3&gt;
&lt;?php
if(isset($_SESSION["ThongTin"]) &amp;&amp; $_SESSION["ThongTin"] != "") {
    echo "Giá trị biến session là: " . $_SESSION["ThongTin"] . ". &lt;a href='dangxuat.php'&gt;Đăng xuất&lt;/a&gt;";  
} else {
    echo "Giá trị biến session chưa được gán";  
}
?&gt;
&lt;/h3&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>

    <p><strong>Code chuẩn cho <code>dangxuat.php</code>:</strong></p>
<pre><code>&lt;?php
session_start();
// Thực hiện hủy session khi người dùng bấm Đăng xuất
unset($_SESSION['ThongTin']);
session_destroy();

// Điều hướng về trang session.php
header("Location: session.php");
exit();
?&gt;</code></pre>
</div>

</body>
</html>