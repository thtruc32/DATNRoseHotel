<?php


include("ketnoi.php");

$phong = $_POST["phong"];
$thiet_bi = $_POST["thiet_bi"];
$so_luong_trong_phong = $_POST["so_luong_trong_phong"];
$tinh_trang = $_POST["tinh_trang"];

$sql = "INSERT INTO chi_tiet_thiet_bi (ma_phong, ma_thiet_bi, so_luong_trong_phong, tinh_trang) VALUE ('" .$phong. "', '" .$thiet_bi. "', '" .$so_luong_trong_phong. "', '" .$tinh_trang. "')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm chi tiết thiết bị: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Thêm chi tiết thiết bị thành công!');
         window.location='QLCTTB.php';
    </script>";
?>
