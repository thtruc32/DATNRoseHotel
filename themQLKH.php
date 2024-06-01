<?php
include ("header.php");
?>

<link rel="stylesheet" href="chinhsua.css" type="text/css" />
<form enctype="multipart/form-data" action="xulythemQLKH.php" name="xulythemQLKH" method="post">

    <div class="text">
        <h4>
            THÊM THÔNG TIN KHÁCH HÀNG MỚI
        </h4>
    </div>


    <div class="themmoi">

        <div class="them">
            <div class="thema">
                <span>Họ tên khách hàng</span>
                <input type="text" name="ho_ten" />
            </div>

            <div class="thema">
                <span>Giới tính</span>
                <input type="text" name="gioi_tinh" />
            </div>

            <div class="thema">
                <span>CCCD/CMND</span>
                <input type="text" name="cccd" />
            </div>
        </div>

        <div class="them">
            <div class="thema">
                <span>Liên lạc</span>
                <input type="text" name="sdtkh" />
            </div>

            <div class="thema">
                <span>Email</span>
                <input type="text" name="emailkh" />
            </div>

            <div class="thema">
                <span>Địa chỉ</span>
                <input type="text" name="dia_chi" />
            </div>
        </div>
    </div>
    <div class="luulai">
        <input type="submit" name="them" value="Lưu lại" />
        <button type="button" onclick="window.location.href='QLKH.php'">Trở về</button>
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