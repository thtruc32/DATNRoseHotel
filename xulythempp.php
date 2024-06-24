<?php
session_start(); // Bắt đầu phiên PHP

include ("ketnoi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $ma_phieu_dat = $_POST['phieu_dat'];
    $ma_phong = $_POST['phong'];
    $ho_ten_nv = $_SESSION['ho_ten'] ?? '';
    $ngay_den = $_POST['ngay_den'];
    $thoi_gian_den = $_POST['thoi_gian_den'];
    $ngay_di = $_POST['ngay_di'];
    $thoi_gian_di = $_POST['thoi_gian_di'];
    $tong_tien = $_POST['tong_tien'];
    $so_tien_da_coc = $_POST['so_tien_da_coc'];
    $tong_so_tien_can_tra = $_POST['tong_so_tien_can_tra'];
    $so_tien_thuc_nhan = $_POST['so_tien_thuc_nhan'];
    $tinh_trang = $_POST['tinh_trang'];
    $phu_thu_den_truoc = (isset($_POST['nhan_phong_som_6_9']) ? '6h00 - 9h00, ' : '') . (isset($_POST['nhan_phong_som_9_12']) ? '9h00 - 12h00, ' : '');
    $so_tien_phu_thu_den_truoc = $_POST['so_tien_phu_thu_den_truoc'];
    $phu_thu_den_sau = (isset($_POST['tra_phong_muon_13_15']) ? '13h00 - 15h00, ' : '') . (isset($_POST['tra_phong_muon_15_18']) ? '15h00 - 18h00, ' : '') . (isset($_POST['tra_phong_muon_sau_18']) ? 'Sau 18h00, ' : '');
    $so_tien_phu_thu_den_sau = $_POST['so_tien_phu_thu_den_sau'];
    $gia_han_phong = $_POST['gia_han_phong'];
    $so_tien_gia_han_phong = $_POST['so_tien_gia_han_phong'];
    $ghi_chu = $_POST['ghi_chu'];

    // Loại bỏ dấu phẩy cuối cùng trong chuỗi phụ thu nếu có
    $phu_thu_den_truoc = rtrim($phu_thu_den_truoc, ', ');
    $phu_thu_den_sau = rtrim($phu_thu_den_sau, ', ');

    // Kiểm tra xem ho_ten_nv có trống không
    if (empty($ho_ten_nv)) {
        echo "Không tìm thấy mã nhân viên cho tên vì biến ho_ten_nv trống.";
        exit;
    }

    // Truy vấn mã khách hàng và mã loại phòng từ mã phiếu đặt
    $sql_get_ma_kh_ma_loai = "SELECT ma_kh, ma_loai FROM phieu_dat WHERE ma_phieu_dat = '$ma_phieu_dat'";
    $result = mysqli_query($conn, $sql_get_ma_kh_ma_loai);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $ma_kh = $row['ma_kh'];
        $ma_loai = $row['ma_loai'];

        // Truy vấn mã nhân viên từ họ tên nhân viên
        $sql_get_ma_nv = "SELECT ma_nv FROM nhan_vien WHERE ho_ten = '$ho_ten_nv'";
        $result_nv = mysqli_query($conn, $sql_get_ma_nv);

        if (mysqli_num_rows($result_nv) > 0) {
            $row_nv = mysqli_fetch_assoc($result_nv);
            $ma_nv = $row_nv['ma_nv'];

            // Chèn dữ liệu vào bảng `o`
            $sql = "INSERT INTO `o` (
                    `ma_phieu_dat`, 
                    `ma_loai`, 
                    `ma_phong`, 
                    `ma_kh`, 
                    `ma_nv`, 
                    `ngay_den`, 
                    `thoi_gian_den`, 
                    `ngay_di`, 
                    `thoi_gian_di`, 
                    `tong_tien`, 
                    `so_tien_da_coc`, 
                    `tong_so_tien_can_tra`, 
                    `so_tien_thuc_nhan`, 
                    `tinh_trang`, 
                    `phu_thu_den_truoc`, 
                    `so_tien_phu_thu_den_truoc`, 
                    `phu_thu_den_sau`, 
                    `so_tien_phu_thu_den_sau`, 
                    `gia_han_phong`, 
                    `so_tien_gia_han_phong`, 
                    `ghi_chu`
                ) VALUES (
                    '$ma_phieu_dat', 
                    '$ma_loai', 
                    '$ma_phong', 
                    '$ma_kh', 
                    '$ma_nv', 
                    '$ngay_den', 
                    '$thoi_gian_den', 
                    '$ngay_di', 
                    '$thoi_gian_di', 
                    '$tong_tien', 
                    '$so_tien_da_coc', 
                    '$tong_so_tien_can_tra', 
                    '$so_tien_thuc_nhan', 
                    '$tinh_trang', 
                    '$phu_thu_den_truoc', 
                    '$so_tien_phu_thu_den_truoc', 
                    '$phu_thu_den_sau', 
                    '$so_tien_phu_thu_den_sau', 
                    '$gia_han_phong', 
                    '$so_tien_gia_han_phong', 
                    '$ghi_chu'
                )";

            if (mysqli_query($conn, $sql)) {
                echo "<script language=javascript>
            alert('Thêm loại phòng mới thành công!');
            window.location.href = 'phanphong.php'; // Điều hướng sau khi thêm thành công
          </script>";
            } else {
                echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Không tìm thấy mã nhân viên cho tên: $ho_ten_nv";
        }
    } else {
        echo "Không tìm thấy mã khách hàng hoặc mã loại phòng cho mã phiếu đặt: $ma_phieu_dat";
    }

    mysqli_close($conn);
}
?>