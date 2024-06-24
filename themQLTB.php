<?php
include ("header.php");
?>

<link rel="stylesheet" href="css/chinhsua.css" type="text/css" />
<form enctype="multipart/form-data" action="xulythemQLTB.php" name="xulythemQLTB" method="post">

    <div class="text">
        <h4>
            THÊM THÔNG TIN THIẾT BỊ MỚI
        </h4>
    </div>


    <div class="themmoi">
        <div class="them">
            <!-- <div class="thema">
                <span>Mã thiết bị</span>
                <input type="text" readonly name="ma_thiet_bi" />
            </div> -->


            <div class="thema">
                <span>Tên thiết bị</span>
                <input type="text" name="ten_thiet_bi" />
            </div>
   
            <div class="thema">
                <span>Tổng số lượng</span>
                <input type="text" name="so_luong_tong" />
            </div>
            <div class="thema">
                <span>Số lượng tồn</span>
                <input type="text" name="so_luong_ton" />
            </div>
        </div>
    </div>
    <div class="luulai">
        <input type="submit" name="them" value="Lưu lại" />
        <button type="button" onclick="window.location.href='QLTB.php'">Trở về</button>
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