<?php
include ("ketnoi.php");

$khach_hang = $_POST["khach_hang"];
$loai_phong = $_POST["loai_phong"];
$nhan_vien = $_POST["nhan_vien"];
$ngay_dat = $_POST["ngay_dat"];
$ngay_nhan = $_POST["ngay_nhan"];
$ngay_tra = $_POST["ngay_tra"];
$so_luong_nguoi_lon = $_POST["so_luong_nguoi_lon"];
$so_luong_tre_em = $_POST["so_luong_tre_em"];
$phu_thu_tre_em = $_POST["phu_thu_tre_em"];
$so_luong_phong_dat = $_POST["so_luong_phong_dat"];
$tien_coc = $_POST["tien_coc"];
$tong_tien = $_POST["tong_tien"];
$trang_thai = $_POST["trang_thai"];


// Thêm bộ môn mới vào CSDL với khóa chính tự động tăng
$sql = "INSERT INTO phieu_dat (ma_kh, ma_loai, ma_nv, ngay_dat, ngay_nhan, ngay_tra, so_luong_nguoi_lon, so_luong_tre_em, phu_thu_tre_em, so_luong_phong_dat, tien_coc, tong_tien, trang_thai)
VALUES ('$khach_hang', '$loai_phong', '$nhan_vien', '$ngay_dat', '$ngay_nhan', '$ngay_tra', '$so_luong_nguoi_lon', '$so_luong_tre_em', '$phu_thu_tre_em', '$so_luong_phong_dat', '$tien_coc', '$tong_tien', '$trang_thai')";
$kq = mysqli_query($conn, $sql) or die("Không thể thêm phiếu đặt: " . mysqli_error($conn));

echo "<script language=javascript>
        alert('Tạo phiếu thành công!');
window.location='QLPD.php';
    </script>";
?>