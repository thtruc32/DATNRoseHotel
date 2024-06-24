<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include ("headertc.php");
include ("ketnoi.php");

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
    echo "Không tìm thấy thông tin khách hàng.";
    exit;
}

$stmt->close();
$conn->close();
?>
<style>
    .image-bia {
        width: 100%;
        height: 500px;
    }

    .img-bia {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: fill;
    }

    .frame-info {
        display: flex;
        width: 100%;
        height: auto;
        background-color: #FEFAF6;
    }

    .info-cus>span {
        color: dimgray;
    }

    .title-info {
        margin-left: 26.5%;
        gap: 10px;
        display: flex;
        font-size: 20px;
        align-items: center;
        margin-top: 35px;
        color: dimgray;
    }

    table {
        padding: 15px;
        margin: 22px auto;
        display: flex;
        justify-content: center;
        width: 47%;
        height: auto;
        background-color: #F0F0F0;
    }

    td {
        font-size: 15px;
        height: 40px;
        font-family: sans-serif;
    }

    input {
        width: 300px;
        border: none;
        background-color: #F0F0F0;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form enctype="multipart/form-data" action="xulysuathongtinkh.php" method="post">
        <div class="image-bia">
            <img class="img-bia" src="anhtin/a1.jpg" />
        </div>
        <div class="title-info">
            <i class="fa-solid fa-user"></i>
            <h4>TRANG THÔNG TIN CÁ NHÂN</h4>
        </div>
        <div style="background-color:#FEFAF6;">
            <table>
                <tr style="display:none;">
                    <td style="width: 180px; color: dimgray; border-bottom: 1px solid floralwhite;">Mã khách hàng
                    </td>
                    <td style="width:300px; border-bottom: 1px solid floralwhite;">
                        <?php echo htmlspecialchars($ma_kh); ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 180px; color: dimgray; border-bottom: 1px solid floralwhite;">Họ và tên</td>
                    <td style="width:300px; border-bottom: 1px solid floralwhite;">
                        <input type="text" id="ho_ten" name="ho_ten" value="<?php echo htmlspecialchars($ho_ten); ?>">
                    </td>
                </tr>
                <tr>
                    <td style="color: dimgray;border-bottom: 1px solid floralwhite;">Giới tính</td>
                    <td style="border-bottom: 1px solid floralwhite;">
                        <input type="text" id="gioi_tinh" name="gioi_tinh"
                            value="<?php echo htmlspecialchars($gioi_tinh); ?>">
                    </td>
                </tr>
                <tr>
                    <td style="color: dimgray; border-bottom: 1px solid floralwhite;">Điện thoại</td>
                    <td style="border-bottom: 1px solid floralwhite;">
                        <input type="text" id="sdtkh" name="sdtkh" value="<?php echo htmlspecialchars($sdtkh); ?>">
                    </td>
                </tr>
                <tr>
                    <td style="color: dimgray; border-bottom: 1px solid floralwhite;">CCCD/CMND</td>
                    <td style="border-bottom: 1px solid floralwhite;">
                        <input type="text" id="cccd" name="cccd" value="<?php echo htmlspecialchars($cccd); ?>">
                    </td>
                </tr>
                <tr>
                    <td style="color: dimgray; border-bottom: 1px solid floralwhite;">Địa chỉ</td>
                    <td style="border-bottom: 1px solid floralwhite;">
                        <input type="text" id="dia_chi" name="dia_chi"
                            value="<?php echo htmlspecialchars($dia_chi); ?>">
                    </td>
                </tr>
                <tr>
                    <td style="color: dimgray; border-bottom: 1px solid floralwhite;">Tài khoản</td>
                    <td style="border-bottom: 1px solid floralwhite;">
                        <input type="text" id="emailkh" name="emailkh"
                            value="<?php echo htmlspecialchars($emailkh); ?>">
                    </td>
                </tr>
                <tr>
                    <td style="color: dimgray;">Mật khẩu</td>
                    <td>
                        <input type="password" id="matkhaukh" name="matkhaukh"
                            value="<?php echo htmlspecialchars($matkhaukh); ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" style="width:300px; margin-left:85px; height: 25px; margin-top: 30px;">Lưu
                            thông tin</button>
                        <button style="width:300px; margin-left:85px; height: 25px; margin-top: 10px;" type="button"
                            onclick="window.location.href='thongtinkhach.php'">
                            Trở về</a>
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</body>

</html>
<?php
include ("footertc.php");
?>