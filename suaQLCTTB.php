<?php
include ("header.php");
include ("ketnoi.php");

$usern = $_REQUEST["user"]; //Nhận giá trị user từ link sửa của quantri.php

$sql = "SELECT * FROM chi_tiet_thiet_bi WHERE ma_cttb = '" . $usern . "'";
$kq = mysqli_query($conn, $sql) or die("Không thể sửa thiết bị" . mysqli_error());
$row = mysqli_fetch_array($kq);
?>
<link rel="stylesheet" href="css/chinhsua.css" type="text/css" />

<form enctype="multipart/form-data" action="xulysuaQLCTTB.php" name="xulysuaQLCTTB" method="post">
<div class="text">
        <h4>CHỈNH SỬA CHI TIẾT THIẾT BỊ</h4>
    </div>
    <div class="themmoi">
        <div class="them">
            <div class="thema">
                <span>Mã chi tiết</span>
                <input type="text" name="ma_cttb" readonly value="<?php echo htmlspecialchars($row["ma_cttb"]); ?>" />
            </div>
            <div class="thema">
                <span>Tên phòng</span>
                <select name="ma_phong">
                    <?php
                    $sql2 = "SELECT ma_phong, ten_phong FROM phong";
                    $result2 = mysqli_query($conn, $sql2) or die("Không thể lấy thông tin phòng: " . mysqli_error($conn));
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $ma_phong = $row2['ma_phong'];
                        $ten_phong = $row2['ten_phong'];
                        $selected = ($ma_phong == $row['ma_phong']) ? "selected" : "";
                        echo "<option value=\"$ma_phong\" $selected>$ten_phong</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="thema">
                <span>Tên thiết bị</span>
                <select name="ma_thiet_bi">
                    <?php
                    $sql2 = "SELECT ma_thiet_bi, ten_thiet_bi FROM thiet_bi";
                    $result2 = mysqli_query($conn, $sql2) or die("Không thể lấy thông tin thiết bị: " . mysqli_error($conn));
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $ma_thiet_bi = $row2['ma_thiet_bi'];
                        $ten_thiet_bi = $row2['ten_thiet_bi'];
                        $selected = ($ma_thiet_bi == $row['ma_thiet_bi']) ? "selected" : "";
                        echo "<option value=\"$ma_thiet_bi\" $selected>$ten_thiet_bi</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="them">
            <div class="thema">
                <span>Số lượng</span>
                <input type="text" name="so_luong_trong_phong" value="<?php echo htmlspecialchars($row["so_luong_trong_phong"]); ?>" />
            </div>
            <div class="thema">
                <span>Tình trạng thiết bị</span>
                <select name="tinh_trang">
                    <option value="Đang sử dụng" <?php echo ($row["tinh_trang"] == "Đang sử dụng") ? "selected" : ""; ?>>Đang sử dụng</option>
                    <option value="Đang sửa chữa" <?php echo ($row["tinh_trang"] == "Đang sửa chữa") ? "selected" : ""; ?>>Đang sửa chữa</option>
                </select>
            </div>
        </div>
    </div>
    <div class="luulai">
        <input type="submit" name="luu" value="Lưu lại" />
        <button type="button" onclick="window.location.href='QLCTTB.php'">Trở về</button>
    </div>
</form>
<?php
include("footer.php");
?>