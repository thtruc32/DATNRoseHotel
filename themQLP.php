<?php
include ("header.php");
include ("ketnoi.php");
?>

<link rel="stylesheet" href="chinhsua.css" type="text/css" />
<form enctype="multipart/form-data" action="xulythemQLP.php" name="xulythemQLP" method="post">

    <div class="text">
        <h4>
            THÊM THÔNG TIN PHÒNG MỚI
        </h4>
    </div>


    <div class="themmoi">
        <!-- <div class="them">
            <span>STT</span>
            <input type="text" readonly name="ma_phong"/>
        </div> -->

        <div class="them">
            <div class="thema">
                <span>Loại phòng</span>
                <select name="loai_phong">
                    <?php
                    $sql = "SELECT ma_loai, ten_loai FROM loai_phong";
                    $kq = mysqli_query($conn, $sql) or die("Không thể thêm thông tin phòng mới: " . mysqli_error($conn));
                    while ($row = mysqli_fetch_assoc($kq)) {
                        $ma_loai = $row['ma_loai'];
                        $ten_loai = $row['ten_loai'];
                        echo "<option value=\"$ma_loai\">$ten_loai</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="thema">
                <span>Tên phòng</span>
                <input type="text" name="ten_phong" />
            </div>
        </div>

        <!-- <div class="them">
            <div class="thema">
                <span>Diện tích phòng</span>
                <select name="dien_tich">
                    <option value="31-32m2">31-32m2</option>
                    <option value="35-36m2">35-36m2</option>
                </select>
            </div>


            <div class="thema">
                <span>Chi tiết phòng</span>
                <select name="chi_tiet_phong">
                    <option value="2 người lớn, 2 giường đơn">2 người lớn, 2 giường đơn</option>
                    <option value="2 người lớn, giường đôi">2 người lớn, giường đôi</option>
                </select>
            </div>
        </div> -->
    </div>
    <div class="luulai">
        <input type="submit" name="luu" value="Lưu lại" />
        <button type="button" onclick="window.location.href='QLP.php'">Trở về</button>
    </div>

</form>
<!-- <style>
            .admin_tab >:nth-child(4){
                background-color: #3593D8;
                color: white;
            }
            </style> -->


<?php
include ("footer.php")
    ?>