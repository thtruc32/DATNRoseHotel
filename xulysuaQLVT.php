<?php
session_start();

include("ketnoi.php");

$ma_vat_tu = $_POST["ma_vat_tu"];
$ten_vat_tu = $_POST["ten_vat_tu"];
$so_luong_tong = $_POST["so_luong_tong"];

$sql = "UPDATE vat_tu SET ten_vat_tu = '$ten_vat_tu', so_luong_tong = '$so_luong_tong' WHERE ma_vat_tu = '$ma_vat_tu'";
$kq = mysqli_query($conn, $sql) or die("Không thể cập nhật vật tư: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Cập nhật vật tư thành công!');
        window.location='QLVT.php';
    </script>";
?>