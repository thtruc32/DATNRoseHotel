<?php
include ("header.php");
?>

<link rel="stylesheet" href="chinhsua.css" type="text/css" />
<form enctype="multipart/form-data" action="xulythemQLVT.php" name="xulythemQLVT" method="post">

    <div class="text">
        <h4>
            THÊM THÔNG TIN VẬT TƯ MỚI
        </h4>
    </div>


    <div class="themmoi">
        <div class="them">
            <div class="thema">
                <span>Tên vật tư</span>
                <input type="text" name="ten_vat_tu" />
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
        <button type="button" onclick="window.location.href='QLVT.php'">Trở về</button>
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