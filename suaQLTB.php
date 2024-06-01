<?php
include ("header.php");

include ("ketnoi.php");

$usern = $_REQUEST["user"]; //Nhận giá trị user từ link sửa của quantri.php

$sql = "SELECT * FROM thiet_bi WHERE ma_thiet_bi = '" . $usern . "'";
$kq = mysqli_query($conn, $sql) or die("Không thể sửa thông tin thiết bị" . mysqli_error());
$row = mysqli_fetch_array($kq);
?>
<link rel="stylesheet" href="chinhsua.css" type="text/css" />

<form enctype="multipart/form-data" action="xulysuaQLTB.php" name="xulysuaQLTB" method="post">
    <div class="text">
        <h4>
            CHỈNH SỬA THÔNG TIN THIẾT BỊ
        </h4>
    </div>

    <div class="themmoi">
        <div class="them">
            <div class="thema">
                <span>Mã thiết bị</span>
                <input type="text" name="ma_thiet_bi" readonly value="<?php echo $row["ma_thiet_bi"]; ?>" />
            </div>

            <div class="thema">
                <span>Tên thiết bị</span>
                <input type="text" name="ten_thiet_bi" value="<?php echo $row["ten_thiet_bi"]; ?>" />
            </div>
        </div>
        <div class="them">
            <div class="thema">
                <span>Tổng số lượng</span>
                <input type="text" name="so_luong_tong" value="<?php echo $row["so_luong_tong"]; ?>" />
            </div>

            <div class="thema">
                <span>Số lượng tồn</span>
                <input type="text" name="so_luong_ton" value="<?php echo $row["so_luong_ton"]; ?>" />
            </div>
        </div>
    </div>
    <div class="luulai">
        <input type="submit" name="luu" value="Lưu lại" />
        <button type="button" onclick="window.location.href='QLTB.php'">Trở về</button>
    </div>

</form>

<!-- <style>
            .admin_tab >:nth-child(8){
                background-color: #3593D8;
                color: white;
            }
            </style> -->


<?php
include ("footer.php")
    ?>