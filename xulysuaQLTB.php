<?php
session_start();

include("ketnoi.php");

$ma_thiet_bi = $_POST["ma_thiet_bi"];
$ten_thiet_bi = $_POST["ten_thiet_bi"];
$so_luong_tong = $_POST["so_luong_tong"];
$so_luong_ton = $_POST["so_luong_ton"];


// Update academic department in the database
$sql = "UPDATE thiet_bi SET ten_thiet_bi = '$ten_thiet_bi', so_luong_tong = '$so_luong_tong', so_luong_ton = '$so_luong_ton' WHERE ma_thiet_bi = '$ma_thiet_bi'";
$kq = mysqli_query($conn, $sql) or die("Không thể cập nhật thiết bị: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Cập nhật thiết bị thành công!');
        window.location='QLTB.php';
    </script>";
?>