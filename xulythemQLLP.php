<?php
include("ketnoi.php");

// Kiểm tra xem các biến từ form đã tồn tại trước khi sử dụng
if (isset($_POST["ten_loai"], $_POST["dien_tich"], $_POST["chi_tiet_phong"], $_POST["so_luong"], $_POST["gia_phong"])) {
    $ten_loai = $_POST["ten_loai"];
    $dien_tich = $_POST["dien_tich"];
    $chi_tiet_phong = $_POST["chi_tiet_phong"];
    $so_luong = $_POST["so_luong"];
    $gia_phong = $_POST["gia_phong"];

    // Xử lý tải lên hình ảnh
    $anh_loai_phong = ''; // Khởi tạo biến để lưu đường dẫn ảnh sau khi tải lên

    if ($_FILES["anh_loai_phong"]["name"] != "") {
        $duongdan = "./anhtin/";
        $duongdan = $duongdan . basename($_FILES["anh_loai_phong"]["name"]);
        if (move_uploaded_file($_FILES["anh_loai_phong"]["tmp_name"], $duongdan)) {
            $anh_loai_phong = $duongdan;
        } else {
            die("Không thể tải lên hình ảnh.");
        }
    }

    // Chuẩn bị và thực hiện truy vấn SQL
    $sql = "INSERT INTO loai_phong (ten_loai, anh_loai_phong, dien_tich, chi_tiet_phong, so_luong, gia_phong) VALUES ('$ten_loai', '$anh_loai_phong', '$dien_tich', '$chi_tiet_phong', '$so_luong', '$gia_phong')";
    $kq = mysqli_query($conn, $sql) or die("Không thể thêm loại phòng mới: " . mysqli_error($conn));

    echo "<script language=javascript>
            alert('Thêm loại phòng mới thành công!');
            window.location.href = 'QLLP.php'; // Điều hướng sau khi thêm thành công
          </script>";
} else {
    echo "Các trường dữ liệu không được gửi đầy đủ từ form.";
}
?>
