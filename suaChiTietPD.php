<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include necessary files
include("header.php");
include("ketnoi.php");

// Check if ma_phieu_dat is provided in the URL
if (isset($_GET['ma_phieu_dat'])) {
    $ma_phieu_dat = $_GET['ma_phieu_dat'];

    // Query to fetch booking details from phieu_dat table
    $sql_phieu_dat = "SELECT * FROM phieu_dat WHERE ma_phieu_dat='$ma_phieu_dat'";
    $result_phieu_dat = mysqli_query($conn, $sql_phieu_dat);
    $row_phieu_dat = mysqli_fetch_assoc($result_phieu_dat);

    // Check if the booking exists
    if (!$row_phieu_dat) {
        echo "<div class='alert alert-warning'>Không tồn tại phiếu đặt có mã $ma_phieu_dat</div>";
        exit;
    }

    // Query to fetch customer information based on ma_kh from khach_hang table
    $ma_khach_hang = $row_phieu_dat['ma_kh'];
    $sql_khach_hang = "SELECT * FROM khach_hang WHERE ma_kh='$ma_khach_hang'";
    $result_khach_hang = mysqli_query($conn, $sql_khach_hang);
    $row_khach_hang = mysqli_fetch_assoc($result_khach_hang);

    // Query to fetch room type information based on ma_loai from loai_phong table
    $ma_loai_phong = $row_phieu_dat['ma_loai'];
    $sql_loai_phong = "SELECT * FROM loai_phong WHERE ma_loai='$ma_loai_phong'";
    $result_loai_phong = mysqli_query($conn, $sql_loai_phong);
    $row_loai_phong = mysqli_fetch_assoc($result_loai_phong);

    // Query to fetch employee information based on ma_nv from nhan_vien table
    $ma_nhan_vien = $row_phieu_dat['ma_nv'];
    $sql_nhan_vien = "SELECT * FROM nhan_vien WHERE ma_nv='$ma_nhan_vien'";
    $result_nhan_vien = mysqli_query($conn, $sql_nhan_vien);
    $row_nhan_vien = mysqli_fetch_assoc($result_nhan_vien);

    // Check if the form is submitted to update the status
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $trang_thai = $_POST['trang_thai'];

        // Get ma_nv from session
        $ma_nv_dang_nhap = isset($_SESSION['ma_nv']) ? $_SESSION['ma_nv'] : null;

        // Proceed with updating trang_thai and optionally ma_nv in your SQL update query
        if ($trang_thai == 'Đã xác nhận' && $ma_nv_dang_nhap) {
            $sql_update = "UPDATE phieu_dat SET trang_thai='$trang_thai', ma_nv='$ma_nv_dang_nhap' WHERE ma_phieu_dat='$ma_phieu_dat'";
        } else {
            $sql_update = "UPDATE phieu_dat SET trang_thai='$trang_thai' WHERE ma_phieu_dat='$ma_phieu_dat'";
        }

        // Execute the SQL update query
        if (mysqli_query($conn, $sql_update)) {
            echo "<script>alert('Cập nhật trạng thái thành công!'); window.location.href='QLPD.php';</script>";
            // Optionally refresh the data after update
            $row_phieu_dat['trang_thai'] = $trang_thai; // Update the status in fetched row data
        } else {
            echo "<div class='alert alert-danger'>Lỗi khi cập nhật trạng thái: " . mysqli_error($conn) . "</div>";
        }
    }
} else {
    echo "<div class='alert alert-warning'>Không có mã phiếu đặt được cung cấp.</div>";
    exit;
}
?>

<style>
    .alert-success {
        font-weight: bolder;
        background-color: #65B741;
    }
</style>
<div class="container">
    <h4 style="color:#40679E; font-weight:bolder;">CHI TIẾT PHIẾU ĐẶT</h4>
    <form action="" method="POST">
        <div class="form-group">
            <label for="trang_thai" style="color:brown; font-weight: bolder; letter-spacing:1px;">Trạng thái phiếu đặt:</label>
            <select style="letter-spacing:0.5px; font-weight: bold;" class="form-control" id="trang_thai" name="trang_thai" onchange="updateSelectTextColor()">
                <option style="color: #40679E;" value="Chưa xác nhận" <?php if ($row_phieu_dat['trang_thai'] == 'Chưa xác nhận') echo 'selected'; ?>>Chưa xác nhận</option>
                <option style="color: #65B741;" value="Đã xác nhận" <?php if ($row_phieu_dat['trang_thai'] == 'Đã xác nhận') echo 'selected'; ?>>Đã xác nhận</option>
                <option style="color: #D04848" value="Đã hủy" <?php if ($row_phieu_dat['trang_thai'] == 'Đã hủy') echo 'selected'; ?>>Đã hủy</option>
            </select>
        </div>
        <button type="submit" style="color:white; font-weight: bolder ;background-color: #65B741; border: none; height: 35px; border-radius:3px; width: 100px;">Cập nhật</button>
        <button type="button" style="color:white;font-weight: bolder ; background-color: #FFC100; border: none; height: 35px; border-radius:3px; width: 100px;" onclick="window.location.href='QLPD.php'">Trở về</button>
    </form>
    <script>
        // cập nhật màu chữ 
        function updateSelectTextColor() {
            var select = document.getElementById('trang_thai');
            var selectedOption = select.options[select.selectedIndex];
            select.style.color = selectedOption.style.color;
        }

        // thiết lập màu chữ ban đầu dựa trên tùy chọn đã chọn
        updateSelectTextColor();
    </script>
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Mã phiếu đặt</th>
                <td><?php echo $row_phieu_dat['ma_phieu_dat']; ?></td>
            </tr>
            <tr>
                <th scope="row">Mã khách hàng</th>
                <td><?php echo $row_phieu_dat['ma_kh']; ?></td>
            </tr>
            <tr>
                <th scope="row">Họ tên khách hàng</th>
                <td><?php echo $row_khach_hang['ho_ten']; ?></td>
            </tr>
            <tr>
                <th scope="row">Loại phòng</th>
                <td><?php echo $row_loai_phong['ten_loai']; ?></td>
            </tr>
            <tr>
                <th scope="row">Ngày đặt phòng</th>
                <td><?php echo date('d/m/Y', strtotime($row_phieu_dat["ngay_dat"])); ?></td>
            </tr>
            <tr>
                <th scope="row">Ngày nhận phòng</th>
                <td><?php echo date('d/m/Y', strtotime($row_phieu_dat["ngay_nhan"])); ?></td>
            </tr>
            <tr>
                <th scope="row">Ngày trả phòng</th>
                <td><?php echo date('d/m/Y', strtotime($row_phieu_dat["ngay_tra"])); ?></td>
            </tr>
            <tr>
                <th scope="row">Số lượng người lớn</th>
                <td><?php echo $row_phieu_dat['so_luong_nguoi_lon']; ?></td>
            </tr>
            <tr>
                <th scope="row">Số lượng trẻ em</th>
                <td><?php echo $row_phieu_dat['so_luong_tre_em']; ?></td>
            </tr>
            <tr>
                <th scope="row">Số lượng trẻ em dưới 6 tuổi</th>
                <td><?php echo $row_phieu_dat['so_luong_tre_em_duoi_6']; ?></td>
            </tr>
            <tr>
                <th scope="row">Số lượng trẻ em trên 6 tuổi</th>
                <td><?php echo $row_phieu_dat['so_luong_tre_em_tren_6']; ?></td>
            </tr>
            <tr>
                <th scope="row">Số tiền phụ thu trẻ em</th>
                <td><?php echo $row_phieu_dat['phu_thu_tre_em']; ?></td>
            </tr>
            <tr>
                <th scope="row">Số lượng phòng đặt</th>
                <td><?php echo $row_phieu_dat['so_luong_phong_dat']; ?></td>
            </tr>
            <tr>
                <th scope="row">Số tiền đã cọc</th>
                <td><?php echo $row_phieu_dat['tien_coc']; ?></td>
            </tr>
            <tr>
                <th scope="row">Tổng tiền</th>
                <td><?php echo $row_phieu_dat['tong_tien']; ?></td>
            </tr>
            <tr>
                <th scope="row">Họ tên nhân viên</th>
                <td><?php echo isset($row_nhan_vien['ho_ten']) ? $row_nhan_vien['ho_ten'] : ''; ?></td>
            </tr>
        </tbody>
    </table>
</div>

<?php include ("footer.php"); ?>
