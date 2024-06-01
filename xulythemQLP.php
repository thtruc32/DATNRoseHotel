<?php
include("ketnoi.php");

$ma_phong = $_POST["ma_phong"];
$loai_phong = $_POST["loai_phong"];
$ten_phong= $_POST["ten_phong"];
$dien_tich = $_POST["dien_tich"];
$chi_tiet_phong = $_POST["chi_tiet_phong"];

// Thêm bộ môn mới vào CSDL với khóa chính tự động tăng
$sql = "INSERT INTO phong (ma_phong, ma_loai, ten_phong, dien_tich, chi_tiet_phong) VALUES ('$ma_phong', '$loai_phong', '$ten_phong', '$dien_tich', '$chi_tiet_phong')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm thông tin phòng mới: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Thêm thông tin phòng mới thành công!');
        window.location='QLP.php';
    </script>";
?>