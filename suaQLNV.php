<?php
include("header.php");

include("ketnoi.php");

$usern=$_REQUEST["user"]; //Nhận giá trị user từ link sửa của quantri.php

$sql = "SELECT * FROM nhan_vien WHERE ma_nv = '".$usern."'";
$kq = mysqli_query($conn, $sql) or die("Không thể sửa thông tin nhân viên" . mysqli_error());
$row = mysqli_fetch_array($kq);
?>
<link rel="stylesheet" href="chinhsua.css" type="text/css"/>

<form enctype="multipart/form-data" action="xulysuaQLNV.php" name="xulysuaQLNV" method="post">
    <div class="text">
        <h2>
        <ion-icon name="add-circle"></ion-icon>
        SỬA NHÂN VIÊN
        </h2>
    </div>

    <div class="themmoi">
        <div class="them">
            <span>STT</span>
            <input type="text" name="ma_nv" readonly value="<?php echo $row["ma_nv"]; ?>"/>
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
            <span>Căn cước</span>
            <input type="text" name="cccd" value="<?php echo $row["cccd"]; ?>"/>
        </div>

        <div class="them">
            <span>Ngày sinh</span>
            <input type="text" name="ngay_sinh" value="<?php echo $row["ngay_sinh"]; ?>"/>
        </div>

        <div class="them">
            <span>Liên lạc</span>
            <input type="text" name="sdtnv" value="<?php echo $row["sdtnv"]; ?>"/>
        </div>

        <div class="them">
            <span>Địa chỉ</span>
            <input type="text" name="dia_chi" value="<?php echo $row["dia_chi"]; ?>"/>
        </div>

        <div class="them">
            <span>Tài khoản</span>
            <input type="text" name="user" value="<?php echo $row["user"]; ?>"/>
        </div>

        <div class="them">
            <span>Mật khẩu</span>
            <input type="text" name="pass" value="<?php echo $row["pass"]; ?>"/>
        </div>

        <div class="them">
            <span>Tình trạng</span>
            <input type="text" name="tinh_trang" value="<?php echo $row["tinh_trang"]; ?>"/>
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