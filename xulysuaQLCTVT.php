<?php
include("ketnoi.php");

$ma_ctvt = $_POST["ma_ctvt"];
$ma_phong = $_POST["ma_phong"];
$ma_vat_tu = $_POST["ma_vat_tu"];
$so_luong_trong_phong = $_POST["so_luong_trong_phong"];
$tinh_trang = $_POST["tinh_trang"];

// Update academic department in the database
$sql = "UPDATE chi_tiet_vat_tu SET ma_phong = '$ma_phong', ma_vat_tu = '$ma_vat_tu', so_luong_trong_phong = '$so_luong_trong_phong', tinh_trang = '$tinh_trang' WHERE ma_ctvt= '$ma_ctvt'";
$kq = mysqli_query($conn, $sql) or die("Không thể cập nhật thông tin chi tiết vật tư: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Cập nhật thông tin chi tiết vật tư thành công!');
        window.location='QLCTVT.php';
    </script>";
?>
