<?php
include ("ketnoi.php");

// Kiểm tra xem các biến từ form đã tồn tại trước khi sử dụng
if (isset($_FILES["hinh_anh"], $_POST["loai_phong"])) {
    $loai_phong = $_POST["loai_phong"];

    // Xử lý tải lên hình ảnh
    $hinh_anh = ''; // Biến lưu đường dẫn hình ảnh sau khi tải lên

    if ($_FILES["hinh_anh"]["name"] != "") {
        $duongdan = "./anhtin/";
        $ten_file = basename($_FILES["hinh_anh"]["name"]); // Lấy tên file gốc
        $duongdan = $duongdan . $ten_file; // Đường dẫn đầy đủ để lưu file

        // Đảm bảo di chuyển file tải lên vào đường dẫn đã chỉ định
        if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $duongdan)) {
            $hinh_anh = $duongdan; // Lưu đường dẫn hình ảnh sau khi tải lên thành công
        } else {
            die("Không thể tải lên hình ảnh.");
        }
    }

    // Chuẩn bị và thực hiện truy vấn SQL để thêm hình ảnh vào cơ sở dữ liệu
    $sql = "INSERT INTO hinh_anh (hinh_anh, ma_loai) VALUES ('$hinh_anh', '$loai_phong')";
    $kq = mysqli_query($conn, $sql) or die("Không thể thêm hình ảnh: " . mysqli_error($conn));

    // Sau khi thêm thành công, chuyển hướng người dùng trở lại trang quản lý hình ảnh
    header("Location: QLHA.php");
    exit();
} else {
    echo "Các trường dữ liệu không được gửi đầy đủ từ form.";
}
?>
