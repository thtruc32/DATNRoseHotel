<?php
include("header.php");
include("ketnoi.php");

// Kiểm tra xem có thông tin mã phiếu đặt được truyền từ URL không
if (isset($_GET['ma_phieu_dat'])) {
    $ma_phieu_dat = $_GET['ma_phieu_dat'];

    // Truy vấn thông tin chi tiết của phiếu đặt từ bảng phieu_dat
    $sql_phieu_dat = "SELECT * FROM phieu_dat WHERE ma_phieu_dat='$ma_phieu_dat'";
    $result_phieu_dat = mysqli_query($conn, $sql_phieu_dat);
    $row_phieu_dat = mysqli_fetch_assoc($result_phieu_dat);

    $ma_khach_hang = $row_phieu_dat['ma_kh'];
    $sql_khach_hang = "SELECT * FROM khach_hang WHERE ma_kh='$ma_khach_hang'";
    $result_khach_hang = mysqli_query($conn, $sql_khach_hang);
    $row_khach_hang = mysqli_fetch_assoc($result_khach_hang);

    // Truy vấn thông tin loại phòng từ bảng loai_phong
    $ma_loai_phong = $row_phieu_dat['ma_loai'];
    $sql_loai_phong = "SELECT * FROM loai_phong WHERE ma_loai='$ma_loai_phong'";
    $result_loai_phong = mysqli_query($conn, $sql_loai_phong);
    $row_loai_phong = mysqli_fetch_assoc($result_loai_phong);

    // Truy vấn thông tin nhân viên từ bảng nhan_vien
    $ma_nhan_vien = $row_phieu_dat['ma_nv'];
    $sql_nhan_vien = "SELECT * FROM nhan_vien WHERE ma_nv='$ma_nhan_vien'";
    $result_nhan_vien = mysqli_query($conn, $sql_nhan_vien);
    $row_nhan_vien = mysqli_fetch_assoc($result_nhan_vien);

    // Kiểm tra xem người dùng đã thay đổi trạng thái chưa
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $trang_thai = $_POST['trang_thai'];
        $sql_update = "UPDATE phieu_dat SET trang_thai='$trang_thai' WHERE ma_phieu_dat='$ma_phieu_dat'";
        if (mysqli_query($conn, $sql_update)) {
            echo "<a href='QLPD.php?ma_phieu_dat=$ma_phieu_dat'>Quay lại trang QLPD</a>";
            echo "<div class='alert alert-success'>Cập nhật trạng thái thành công</div>";
            // Cập nhật lại thông tin phiếu đặt sau khi đã cập nhật trạng thái
            $result_phieu_dat = mysqli_query($conn, $sql_phieu_dat);
            $row_phieu_dat = mysqli_fetch_assoc($result_phieu_dat);
        } else {
            echo "<div class='alert alert-danger'>Lỗi khi cập nhật trạng thái: " . mysqli_error($conn) . "</div>";
        }
    }
} else {
    echo "<div class='alert alert-warning'>Không có mã phiếu đặt được cung cấp.</div>";
    exit;
}

?>

<div class="container">
    <h2>Chi Tiết Phiếu Đặt</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="trang_thai">Trạng Thái:</label>
            <select class="form-control" id="trang_thai" name="trang_thai">
                <option value="Chưa xác nhận" <?php if ($row_phieu_dat['trang_thai'] == 'Chưa xác nhận') echo 'selected'; ?>>Chưa xác nhận</option>
                <option value="Đã xác nhận" <?php if ($row_phieu_dat['trang_thai'] == 'Đã xác nhận') echo 'selected'; ?>>Đã xác nhận</option>
                <option value="Đã hủy" <?php if ($row_phieu_dat['trang_thai'] == 'Đã hủy') echo 'selected'; ?>>Đã hủy</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>

    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Mã Phiếu Đặt</th>
                <td><?php echo $row_phieu_dat['ma_phieu_dat']; ?></td>
            </tr>
            <tr>
                <th scope="row">Mã Khách Hàng</th>
                <td><?php echo $row_phieu_dat['ma_kh']; ?></td>
            </tr>
            <tr>
                <th scope="row">Tên Khách Hàng</th>
                <td><?php echo $row_khach_hang['ho_ten']; ?></td>
            </tr>
            <tr>
                <th scope="row">Loại Phòng</th>
                <td><?php echo $row_loai_phong['ten_loai']; ?></td>
            </tr>
            <tr>
                <th scope="row">Ngày Đặt</th>
                <td><?php echo $row_phieu_dat['ngay_dat']; ?></td>
            </tr>
            <tr>
                <th scope="row">Ngày Nhận</th>
                <td><?php echo $row_phieu_dat['ngay_nhan']; ?></td>
            </tr>
            <tr>
                <th scope="row">Ngày Trả</th>
                <td><?php echo $row_phieu_dat['ngay_tra']; ?></td>
            </tr>
            <tr>
                <th scope="row">Số Lượng Người Lớn</th>
                <td><?php echo $row_phieu_dat['so_luong_nguoi_lon']; ?></td>
            </tr>
            <tr>
                <th scope="row">Số Lượng Trẻ Em</th>
                <td><?php echo $row_phieu_dat['so_luong_tre_em']; ?></td>
            </tr>
            <tr>
                <th scope="row">Số Lượng Phòng Đặt</th>
                <td><?php echo $row_phieu_dat['so_luong_phong_dat']; ?></td>
            </tr>
            <tr>
                <th scope="row">Tiền Cọc</th>
                <td><?php echo $row_phieu_dat['tien_coc']; ?></td>
            </tr>
            <tr>
                <th scope="row">Tổng Tiền</th>
                <td><?php echo $row_phieu_dat['tong_tien']; ?></td>
            </tr>
            <tr>
                <th scope="row">Nhân Viên</th>
                <td><?php echo $row_nhan_vien['ho_ten']; ?></td>
            </tr>
            <!-- Các trường thông tin khác tương tự -->
        </tbody>
    </table>
</div>

<?php include("footer.php"); ?>
