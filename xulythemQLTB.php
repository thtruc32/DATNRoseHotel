<?php


include("ketnoi.php");

$ma_thiet_bi = $_POST["ma_thiet_bi"];
$ten_thiet_bi = $_POST["ten_thiet_bi"];
$so_luong_tong = $_POST["so_luong_tong"];

// Thêm bộ môn mới vào CSDL với khóa chính tự động tăng
$sql = "INSERT INTO thiet_bi VALUES ('" .$ma_thiet_bi. "', '" .$ten_thiet_bi. "', '" .$so_luong_tong. "')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm thiết bị mới: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Thêm thiết bị mới thành công!');
        window.location='QLTB.php';
    </script>";
?>