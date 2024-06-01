<?php


include("ketnoi.php");

$ma_nv = $_POST["ma_nv"];
$ho_ten = $_POST["ho_ten"];
$gioi_tinh = $_POST["gioi_tinh"];
$cccd = $_POST["cccd"];
$ngay_sinh = $_POST["ngay_sinh"];
$sdtnv = $_POST["sdtnv"];
$dia_chi = $_POST["dia_chi"];
$user = $_POST["user"];
$pass = $_POST["pass"];
$quyen = $_POST["quyen"];
$tinh_trang = $_POST["tinh_trang"];


// Thêm bộ môn mới vào CSDL với khóa chính tự động tăng
$sql = "INSERT INTO nhan_vien VALUES ('" .$ma_nv. "', '" .$ho_ten. "', '" .$gioi_tinh. "', '" .$cccd. "', '" .$ngay_sinh. "', '" .$sdtnv. "', '" .$dia_chi. "', '" .$user. "', '" .$pass. "', '" .$quyen. "', '" .$tinh_trang. "')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm nhân viên mới: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Thêm nhân viên mới thành công!');
        window.location='QLNV.php';
    </script>";
?>