<?php
include("header.php");

include("ketnoi.php");

$usern=$_REQUEST["user"]; //Nhận giá trị user từ link sửa của quantri.php

$sql = "SELECT * FROM khach_hang WHERE ma_kh = '".$usern."'";
$kq = mysqli_query($conn, $sql) or die("Không thể sửa thông tin khách hàng" . mysqli_error());
$row = mysqli_fetch_array($kq);
?>
<link rel="stylesheet" href="chinhsua.css" type="text/css"/>

<form enctype="multipart/form-data" action="xulysuaQLKH.php" name="xulysuaQLKH" method="post">
    <div class="text">
        <h2>
        <ion-icon name="add-circle"></ion-icon>
        SỬA NHÂN VIÊN
        </h2>
    </div>

    <div class="themmoi">
        <div class="them">
            <span>STT</span>
            <input type="text" name="ma_kh" readonly value="<?php echo $row["ma_kh"]; ?>"/>
        </div>

        <div class="them">
            <span>Họ tên</span>
            <input type="text" name="ho_ten" value="<?php echo $row["ho_ten"]; ?>"/>
        </div>

        <div class="them">
            <span>Giới tính</span>
            <input type="text" name="gioi_tinh" value="<?php echo $row["gioi_tinh"]; ?>"/>
        </div>

        <div class="them">
            <span>CCCD/CMND</span>
            <input type="text" name="cccd" value="<?php echo $row["cccd"]; ?>"/>
        </div>

        <div class="them">
            <span>Liên lạc</span>
            <input type="text" name="sdtkh" value="<?php echo $row["sdtkh"]; ?>"/>
        </div>

        <div class="them">
            <span>Email</span>
            <input type="text" name="emailkh" value="<?php echo $row["emailkh"]; ?>"/>
        </div>

        <div class="them">
            <span>Địa chỉ</span>
            <input type="text" name="dia_chi" value="<?php echo $row["dia_chi"]; ?>"/>
        </div>

        <div class="luulai">
        <input type="submit" name="luu" value="Lưu"/>
        </div>
    </div>
</form>
    
<!-- <style>
            .admin_tab >:nth-child(8){
                background-color: #3593D8;
                color: white;
            }
            </style> -->


<?php
include("footer.php")
?>