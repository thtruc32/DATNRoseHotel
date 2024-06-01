<?php


include("ketnoi.php");

$ma_ctvt = $_POST["ma_ctvt"];
$phong = $_POST["phong"];
$vat_tu = $_POST["vat_tu"];
$so_luong_trong_phong = $_POST["so_luong_trong_phong"];
$tinh_trang = $_POST["tinh_trang"];

$sql = "INSERT INTO chi_tiet_vat_tu (ma_ctvt, ma_phong, ma_vat_tu, so_luong_trong_phong, tinh_trang) VALUE ('" .$ma_ctvt. "', '" .$phong. "', '" .$vat_tu. "', '" .$so_luong_trong_phong. "', '" .$tinh_trang. "')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm chi tiết vật tư: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Thêm chi tiết vật tư thành công!');
        window.location='QLCTVT.php';
    </script>";
?>
