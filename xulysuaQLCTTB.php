<?php
include("ketnoi.php");

$ma_cttb = $_POST["ma_cttb"];
$ma_phong = $_POST["ma_phong"];
$ma_thiet_bi = $_POST["ma_thiet_bi"];
$so_luong_trong_phong = $_POST["so_luong_trong_phong"];
$tinh_trang = $_POST["tinh_trang"];

// Update academic department in the database
$sql = "UPDATE chi_tiet_thiet_bi SET ma_phong = '$ma_phong', ma_thiet_bi = '$ma_thiet_bi', so_luong_trong_phong = '$so_luong_trong_phong', tinh_trang = '$tinh_trang' WHERE ma_cttb = '$ma_cttb'";
$kq = mysqli_query($conn, $sql) or die("Không thể cập nhật thông tin chi tiết thiết bị: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Cập nhật thông tin chi tiết thiết bị thành công!');
        window.location='QLCTTB.php';
    </script>";
?>
