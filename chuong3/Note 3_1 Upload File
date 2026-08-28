<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<!-- Form dùng để gửi file lên server -->
<form id="form1" name="form1" method="post" enctype="multipart/form-data">

  <!-- Ô chọn file từ máy tính -->
  <input type="file" 
         name="fileUpload" 
         id="fileUpload" 
         value="Choose File"> 

  No File Chosen 

  <!-- Nút gửi file lên server -->
  <input type="submit" 
         name="submit2" 
         id="submit2" 
         value="Upload File">

  <?php
    // Kiểm tra xem người dùng đã gửi file hay chưa
    if (isset($_FILES['fileUpload']))
    {
        // <pre> giúp dữ liệu var_dump() hiển thị dễ đọc
        echo "<pre>";

        // Hiển thị thông tin của file được upload
        var_dump($_FILES['fileUpload']);

        echo "</pre>";	
    }
  ?>

</form>

</body>
</html>
----------------------------------------------
⭐ Những dòng cần nhớ

1. enctype="multipart/form-data"

<form method="post" enctype="multipart/form-data">

👉 Cực kỳ quan trọng khi upload file.
Nếu upload file mà thiếu enctype="multipart/form-data" thì PHP thường không nhận được file.

2. <input type="file">

<input type="file" name="fileUpload">

👉 Tạo nút cho người dùng chọn file.

Quan trọng nhất là:

name="fileUpload"

Tên này sẽ được dùng bên PHP:

$_FILES['fileUpload']

➡️ Hai cái phải trùng nhau.

3. method="post"

<form method="post">

👉 Form gửi dữ liệu bằng phương thức POST.

Upload file thường sử dụng POST.

4. isset($_FILES['fileUpload'])

if (isset($_FILES['fileUpload']))

👉 Kiểm tra xem biến chứa thông tin file có tồn tại hay không.

Có thể hiểu đơn giản:

"Có file được gửi lên chưa?"

5. $_FILES['fileUpload']

$_FILES['fileUpload']

👉 Đây là biến PHP chứa thông tin về file được upload.

Nó thường chứa các thông tin như:

name      → tên file
type      → kiểu file
tmp_name  → vị trí file tạm trên server
error     → mã lỗi upload
size      → kích thước file

Ví dụ:

var_dump($_FILES['fileUpload']);

có thể cho ra:

array(
    "name" => "anh.jpg",
    "type" => "image/jpeg",
    "tmp_name" => "...",
    "error" => 0,
    "size" => 123456
)
🧠 Tóm tắt để học thuộc
<form method="post" enctype="multipart/form-data">
              ↑                         ↑
        gửi bằng POST            bắt buộc khi upload file

<input type="file" name="fileUpload">
                         ↓
                  tên của file

$_FILES['fileUpload']
        ↓
Thông tin file upload

isset($_FILES['fileUpload'])
        ↓
Kiểm tra file có được gửi lên chưa

var_dump($_FILES['fileUpload'])
        ↓
In ra thông tin file

Công thức nhớ nhanh:
Chọn file → input file → POST + multipart/form-data → $_FILES → kiểm tra isset() → xử lý file.
