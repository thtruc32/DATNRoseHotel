<?php
session_start();

include("ketnoi.php");

$ma_loai = $_POST["ma_loai"];
$ten_loai = $_POST["ten_loai"];
$dien_tich = $_POST["dien_tich"];
$chi_tiet_phong = $_POST["chi_tiet_phong"];
$so_luong = $_POST["so_luong"];
$gia_phong = $_POST["gia_phong"];


// Update academic department in the database
$sql = "UPDATE loai_phong SET ten_loai = '$ten_loai',dien_tich = '$dien_tich',chi_tiet_phong = '$chi_tiet_phong', so_luong = '$so_luong', gia_phong = '$gia_phong' WHERE ma_loai = '$ma_loai'";
$kq = mysqli_query($conn, $sql) or die("Không thể cập nhật thông tin loại phòng: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Cập nhật thông tin loại phòng thành công!');
        window.location='QLLP.php';
    </script>";
?>