<?php
include ("header.php");

include ("ketnoi.php");

$usern = $_REQUEST["user"]; //Nhận giá trị user từ link sửa của quantri.php

$sql = "SELECT * FROM vat_tu WHERE ma_vat_tu = '" . $usern . "'";
$kq = mysqli_query($conn, $sql) or die("Không thể sửa thông tin vật tư" . mysqli_error());
$row = mysqli_fetch_array($kq);
?>
<link rel="stylesheet" href="chinhsua.css" type="text/css" />

<form enctype="multipart/form-data" action="xulysuaQLVT.php" name="xulysuaQLVT" method="post">
    <div class="text">
        <h4>
            CHỈNH SỬA THÔNG TIN VẬT TƯ
        </h4>
    </div>
        <div class="themmoi">
            <div class="them">
                <div class="thema">
                    <span>Mã vật tư</span>
                    <input type="text" name="ma_vat_tu" readonly value="<?php echo $row["ma_vat_tu"]; ?>" />
                </div>
                <div class="thema">
                    <span>Tên vật tư</span>
                    <input type="text" name="ten_vat_tu" value="<?php echo $row["ten_vat_tu"]; ?>" />
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
            <button type="button" onclick="window.location.href='QLCTVT.php'">Trở về</button>
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