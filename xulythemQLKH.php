<?php


include("ketnoi.php");

$ma_kh = $_POST["ma_kh"];
$ho_ten = $_POST["ho_ten"];
$gioi_tinh = $_POST["gioi_tinh"];
$cccd = $_POST["cccd"];
$sdtkh = $_POST["sdtkh"];
$emailkh = $_POST["emailkh"];
$dia_chi = $_POST["dia_chi"];


$sql = "INSERT INTO khach_hang VALUES ('" .$ma_kh. "', '" .$ho_ten. "', '" .$gioi_tinh. "', '" .$cccd. "', '" .$sdtkh. "', '" .$emailkh. "', '" .$dia_chi. "')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm khách hàng mới: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Thêm khách hàng mới thành công!');
        window.location='QLKH.php';
    </script>";
?>