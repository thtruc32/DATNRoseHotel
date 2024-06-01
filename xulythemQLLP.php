<?php


include("ketnoi.php");

$ma_loai = $_POST["ma_loai"];
$ten_loai = $_POST["ten_loai"];
$dien_tich = $_POST["dien_tich"];
$chi_tiet_phong = $_POST["chi_tiet_phong"];
$so_luong = $_POST["so_luong"];
$gia_phong = $_POST["gia_phong"];

$sql = "INSERT INTO loai_phong VALUES ('" .$ma_loai. "', '" .$ten_loai. "', '" .$dien_tich. "', '" .$chi_tiet_phong. "', '" .$so_luong. "', '" .$gia_phong. "')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm loại phòng mới: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Thêm loại phòng mới thành công!');
        window.location='QLLP.php';
    </script>";
?>