<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bai 3_2</title>
</head>

<body>
<!-- ============================== PHẦN 1: TẠO FORM UPLOAD FILE ============================== -->
<!-- method="post": Dữ liệu của form sẽ được gửi bằng phương thức POST. enctype="multipart/form-data": BẮT BUỘC phải có khi upload file. Nó cho phép form gửi dữ liệu dạng file lên server. -->
<form method="post" enctype="multipart/form-data" name="form1" id="form1">
  <label for="fileField">File:</label>
  <!-- type="file": Tạo nút để người dùng chọn file từ máy tính. name="file[]": Dấu [] cho biết đây là một MẢNG file. PHP sẽ lưu thông tin file vào $_FILES["file"]. -->
  <input type="file" name="file[]" id="file[]">
  <!-- Nút submit. name="sbupload" dùng để PHP kiểm tra xem người dùng đã bấm nút Upload hay chưa. -->
  <input type="submit" name="sbupload" id="sbupload" value="Upload file">
</form>
<?php
// ======================================== // PHẦN 2: KIỂM TRA NGƯỜI DÙNG ĐÃ UPLOAD CHƯA // ============ /* isset($_POST["sbupload"]): Kiểm tra xem nút "Upload file" đã được nhấn chưa. Vì form dùng method="post" nên dữ liệu của nút submit nằm trong $_POST. */
	if(isset($_POST["sbupload"]))
	{
		// ===// PHẦN 3: DUYỆT QUA CÁC FILE ĐƯỢC UPLOAD // ============
		/* $_FILES["file"]["name"]: Chứa tên của các file người dùng chọn. 
		count(...): Đếm xem có bao nhiêu file. 
		$i = 0: Bắt đầu từ file đầu tiên. 
		$i++: Mỗi vòng lặp tăng $i lên 1. */
		for($i=0;$i<count($_FILES["file"]["name"]);$i++)
		{
// ========= // PHẦN 4: TẠO KHUNG HIỂN THỊ THÔNG TIN FILE // =================
			echo '<div style="float:left; border:1px solid
			c9c9c9; padding:10px; height: 300px; margin: 5px;">';
// ==========// PHẦN 5: TẠO TÊN FILE MỚI // ========================================== 
/* pathinfo(..., PATHINFO_FILENAME): Lấy tên file KHÔNG bao gồm phần mở rộng. 
Ví dụ: abc.jpg => abc rand(100,999): 
Tạo một số ngẫu nhiên từ 100 đến 999. Ghép lại: abc_572 */
			$name_new=pathinfo($_FILES["file"]["name"][$i],PATHINFO_FILENAME) ."_".rand(100,999);
			/* PATHINFO_EXTENSION: Lấy phần mở rộng của file. Ví dụ: abc.jpg => jpg anh.png => png */
			$ext=pathinfo($_FILES["file"]["name"][$i],PATHINFO_EXTENSION);
			/* Ghép tên mới + phần mở rộng. Ví dụ: $name_new = abc_572 $ext = jpg => abc_572.jpg */
			$filename_new=$name_new.".".$ext;
// ========== // PHẦN 6: HIỂN THỊ THÔNG TIN FILE // ===============
				 /* $_FILES["file"]["name"][$i]: Lấy tên file gốc mà người dùng chọn. */
				echo "Tên file ban đầu: ".$_FILES["file"]["name"][$i];
				/* Hiển thị tên file mới sau khi đổi tên. */
				echo "<br />Tên file thay đổi:".$filename_new;
				/* $_FILES["file"]["size"][$i]: Lấy kích thước file tính bằng BYTE. /1024: 
				Đổi từ Byte sang KB. round(): Làm tròn số KB. */
				echo "<br />Kích thước: ".round($_FILES["file"]["size"][$i]/1024)."KB";
				/* $_FILES["file"]["type"][$i]: Lấy MIME type của file. Ví dụ: image/jpeg image/png */
				echo "<br />Loại file:".$_FILES["file"]["type"][$i];
				/* $_FILES["file"]["tmp_name"][$i]: Đây là đường dẫn đến file tạm mà PHP tạo ra trong quá trình upload. */
				echo "<br /> Tên file tạm: ".$_FILES["file"]["tmp_name"][$i];
				// ============== // PHẦN 7: XÁC ĐỊNH NƠI LƯU FILE // =================
				/* $targetFile: Là đường dẫn cuối cùng mà file sẽ được lưu. "hinhanh/": Thư mục dùng để 								                chứa file upload. Ví dụ: hinhanh/abc_572.jpg */
				echo "<br />Nơi lưu trữ: ".$targetFile="hinhanh/".$filename_new;
				echo "<p />";
				// ==================== // PHẦN 8: KIỂM TRA LỖI UPLOAD // =======
				/* $_FILES["file"]["error"][$i]: Chứa mã lỗi của quá trình upload. 
				Nếu > 0: Có lỗi xảy ra. Nếu == 0: Upload thành công, không có lỗi. */
				if($_FILES["file"]["error"][$i]>0)
				echo "Lỗi trong quá trình upload";
				else
				/* move_uploaded_file(): Di chuyển file từ thư mục tạm của PHP sang thư mục "hinhanh".
				Tham số 1: Đường dẫn file tạm. Tham số 2: Nơi muốn lưu file. Đây là dòng QUAN TRỌNG nhất 
				để file thực sự được lưu vào server. */
				move_uploaded_file($_FILES["file"]["tmp_name"][$i],$targetFile="hinhanh/".$filename_new);
				// ============ // PHẦN 9: KIỂM TRA FILE CÓ PHẢI ẢNH KHÔNG // ===================
				/* $ext: Phần mở rộng của file. Nếu là: png jpg gif thì hiển thị ảnh. */
				if($ext=='png' || $ext=='jpg' || $ext=='gif' )
				/* <img src="...">: Hiển thị hình ảnh trên trình duyệt. width="200": Đặt chiều rộng ảnh là 200px. */
				echo '<img src="hinhanh/'.$filename_new.'" width="200">';
				else
					echo 'Không phải file ảnh';
				echo '</div>';	
		}	
	}
?>
</body>
</html>

--------------------------------
🧠 Mạch code bạn chỉ cần nhớ như sau
Người dùng chọn file
        ↓
Bấm "Upload file"
        ↓
if(isset($_POST["sbupload"]))
        ↓
Lấy thông tin file trong $_FILES
        ↓
for() → duyệt từng file
        ↓
Lấy tên file + phần mở rộng
        ↓
Tạo tên file mới
        ↓
Tạo đường dẫn lưu:
hinhanh/tên_file_mới
        ↓
Kiểm tra $_FILES["file"]["error"]
        ↓
move_uploaded_file()
        ↓
File được lưu vào thư mục hinhanh/
        ↓
Kiểm tra extension
        ↓
Nếu jpg/png/gif → hiển thị ảnh
Nếu không → "Không phải file ảnh"

4 dòng quan trọng nhất cần hiểu để làm bài:

Code	Ý nghĩa
$_FILES["file"]	Lấy thông tin file được upload
pathinfo()	Tách tên file / phần mở rộng
move_uploaded_file()	Đưa file từ thư mục tạm vào thư mục lưu trữ
$_FILES["file"]["error"]	Kiểm tra upload có lỗi hay không
