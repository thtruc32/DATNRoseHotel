<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include ("headertc.php");
include ('ketnoi.php');

if (!isset($_SESSION['ma_kh'])) {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header('Location: login.php');
    exit;
}

// Lấy thông tin khách hàng từ cơ sở dữ liệu
$ma_kh = $_SESSION['ma_kh'];
$sql = "SELECT ho_ten, gioi_tinh, cccd, sdtkh, emailkh, matkhaukh, dia_chi FROM khach_hang WHERE ma_kh = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $ma_kh);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $ho_ten = $row['ho_ten'];
    $gioi_tinh = $row['gioi_tinh'];
    $cccd = $row['cccd'];
    $sdtkh = $row['sdtkh'];
    $emailkh = $row['emailkh'];
    $matkhaukh = $row['matkhaukh'];
    $dia_chi = $row['dia_chi'];
} else {
    // Nếu không tìm thấy thông tin, có thể thông báo lỗi hoặc xử lý theo ý bạn
    echo "Không tìm thấy thông tin khách hàng.";
    exit;
}
$stmt->close(); // Đóng statement sau khi sử dụng

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/thongtinkhach.css" />
</head>

<body>
    <div class="image-bia">
        <img class="img-bia" src="anhtin/a1.jpg" />
    </div>

    <div class="title-info">
        <i class="fa-solid fa-user"></i>
        <h4>TRANG THÔNG TIN CÁ NHÂN</h4>
    </div>

    <div style="background-color:#FEFAF6;">
        <table class="table1">
            <tr style="display:none;">
                <td style="width: 160px; color: dimgray; border-bottom: 1px solid floralwhite;">Mã khách hàng</td>
                <td style="width:343px; border-bottom: 1px solid floralwhite;"><?php echo htmlspecialchars($ma_kh); ?>
                </td>
            </tr>
            <tr>
                <td style="width: 160px; color: dimgray; border-bottom: 1px solid floralwhite;">Họ và tên</td>
                <td style="width:343px; border-bottom: 1px solid floralwhite;"><?php echo htmlspecialchars($ho_ten); ?>
                </td>
            </tr>
            <tr>
                <td style="color: dimgray;border-bottom: 1px solid floralwhite;">Giới tính</td>
                <td style="border-bottom: 1px solid floralwhite;"><?php echo htmlspecialchars($gioi_tinh); ?></td>
            </tr>
            <tr>
                <td style="color: dimgray; border-bottom: 1px solid floralwhite;">Điện thoại</td>
                <td style="border-bottom: 1px solid floralwhite;"><?php echo htmlspecialchars($sdtkh); ?></td>
            </tr>
            <tr>
                <td style="color: dimgray; border-bottom: 1px solid floralwhite;">CCCD/CMND</td>
                <td style="border-bottom: 1px solid floralwhite;"><?php echo htmlspecialchars($cccd); ?></td>
            </tr>
            <tr>
                <td style="color: dimgray; border-bottom: 1px solid floralwhite;">Địa chỉ</td>
                <td style="border-bottom: 1px solid floralwhite;"><?php echo htmlspecialchars($dia_chi); ?></td>
            </tr>
            <tr>
                <td style="color: dimgray;">Tài khoản</td>
                <td><?php echo htmlspecialchars($emailkh); ?></td>
            </tr>

            <tr>
                <td colspan="2">
                    <button style="width:400px; margin-left:48px; height: 25px; margin-top: 10px;">
                        <i class="fa-solid fa-pen"></i>
                        <a style="color: black;" href="suathongtinkh.php">Chỉnh sửa thông tin cá nhân</a>
                    </button>
                </td>

            </tr>


        </table>

        <div class="row">
            <div style="background-color:#FEFAF6; padding: 30px;" class="table-responsive p-3">
                <table class="table2" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Khách hàng</th>
                            <th>Loại phòng</th>
                            <th>Hình ảnh</th> 
                            <th>Ngày đặt</th>
                            <th>Ngày nhận</th>
                            <th>Trạng thái</th>
                            <th>Tuỳ chọn</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM phieu_dat WHERE ma_kh = ?";
                        $stmt = $conn->prepare($sql);
                        if (!$stmt) {
                            echo "Lỗi chuẩn bị truy vấn: " . $conn->error;
                            exit;
                        }
                        $stmt->bind_param("s", $ma_kh);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        while ($row = $result->fetch_assoc()) {
                            $booking_time = strtotime($row["ngay_dat"]);
                            $allowed_cancel_time = $booking_time + 24 * 3600; // 24 giờ tính bằng giây
                        
                            $loai_phongs = $row["ma_loai"];
                            $sql2 = "SELECT * FROM loai_phong WHERE ma_loai=?";
                            $stmt2 = $conn->prepare($sql2);
                            if (!$stmt2) {
                                echo "Lỗi chuẩn bị truy vấn: " . $conn->error;
                                exit;
                            }
                            $stmt2->bind_param("s", $loai_phongs);
                            $stmt2->execute();
                            $result2 = $stmt2->get_result();
                            $loai_phong = $result2->fetch_assoc();
                            $stmt2->close(); // Đóng statement sau khi sử dụng
                        
                            $usern = $row["ma_phieu_dat"];
                            echo "<tr>";
                            echo "<td>" . $ho_ten . "</td>";
                            echo "<td>" . $loai_phong["ten_loai"] . "</td>";
                            echo "<td><img src='" . $loai_phong["anh_loai_phong"] . "' alt='Hình ảnh' style='width:100px;height:auto; padding: 5px;'></td>";
                            echo "<td>" . date('d/m/Y', strtotime($row["ngay_dat"])) . "</td>";
                            echo "<td>" . date('d/m/Y', strtotime($row["ngay_nhan"])) . "</td>";
                            echo "<td >" . $row["trang_thai"] . "</td>";
                            echo "<td>";
                            echo "<a href='xemchitietdadat.php?user=$usern'><button class='xemchitiet'>Chi tiết</button></a>";
                            if (time() < $allowed_cancel_time) {
                                echo "<button class='huyphong' onclick='confirmCancel(\"$usern\")' data-cancelable='true'>Huỷ phòng</button>";
                            } else {
                                echo "<button class='huyphong' data-cancelable='false'>Huỷ phòng</button>";
                            }
                            echo "</td>";
                            echo "</tr>";
                        }

                        $stmt->close(); 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
</body>

</html>
<?php
include ("footertc.php")
    ?>
    <script>
 document.addEventListener("DOMContentLoaded", function() {
    var buttons = document.querySelectorAll(".huyphong");
    buttons.forEach(function(button) {
        button.addEventListener("click", function(event) {
            if (!this.getAttribute("data-cancelable") || this.getAttribute("data-cancelable") === "false") {
                event.preventDefault();
                alert("Không thể hủy phòng vì đã quá thời gian cho phép.");
            } else {
                if (!confirm("Bạn có chắc chắn muốn hủy phòng này?")) {
                    event.preventDefault();
                }
            }
        });
    });
});
    </script>