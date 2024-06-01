<?php


include("ketnoi.php");

$ma_vat_tu = $_POST["ma_vat_tu"];
$ten_vat_tu = $_POST["ten_vat_tu"];
$so_luong_tong = $_POST["so_luong_tong"];

// Thêm bộ môn mới vào CSDL với khóa chính tự động tăng
$sql = "INSERT INTO vat_tu VALUES ('" .$ma_vat_tu. "', '" .$ten_vat_tu. "', '" .$so_luong_tong. "')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm vật tư mới: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Thêm vật tư mới thành công!');
        window.location='QLVT.php';
    </script>";
?>