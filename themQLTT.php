<?php
include("header.php");
include("ketnoi.php");
?>

<link rel="stylesheet" href="css/chinhsua.css" type="text/css"/>
<form enctype="multipart/form-data" action="xulythemQLTT.php" name="xulythemQLTT" method="post">

    <div class="text">
        <h2>
        <ion-icon name="add-circle"></ion-icon>
        THÊM TIN TỨC 
        </h2>
    </div>
       

    <div class="themmoi">
        <div class="them">
            <span>STT</span>
            <input type="text" readonly name="ma_tin_tuc"/>
        </div>

        <div class="them">
        <span>Người đăng</span>
        <select name="nhan_vien">
                        <?php
                $sql = "SELECT ma_nv, ho_ten FROM nhan_vien";
                $kq = mysqli_query($conn, $sql) or die("Không thể thêm người đăng: " . mysqli_error($conn));
                while ($row = mysqli_fetch_assoc($kq)) {
                    $ma_nv = $row['ma_nv'];
                    $ho_ten = $row['ho_ten'];
                    echo "<option value=\"$ma_nv\">$ho_ten</option>";
                    }
                ?>
                    </select>
        </div>

        <div class="them">
            <span>Chủ đề</span>
            <input type="text" name="ten_tin_tuc"/>
        </div>

        <div class="them">
            <span>Nội dung</span>
            <input type="text" name="noi_dung"/>
        </div>

        <div class="them">
            <span>Hình ảnh</span>
            <input type="file" name="hinh_anh"  style="border:none;"/>
        </div>

        <div class="them">
            <span>Ngày đăng</span>
            <input type="text" name="ngay_dang"/>
        </div>

        <div class="them">
            <span>Trạng thái</span>
            <input type="text" name="trang_thai"/>
        </div>

        <div class="luulai">
        <input type="submit" name="them" value="Thêm"/>
        </div>
    </div>

</form>
<!-- <style>
            .admin_tab >:nth-child(4){
                background-color: #3593D8;
                color: white;
            }
            </style> -->


<?php
include("footer.php")
?>