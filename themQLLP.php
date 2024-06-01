<?php
include ("header.php");
?>

<link rel="stylesheet" href="chinhsua.css" type="text/css" />
<form enctype="multipart/form-data" action="xulythemQLLP.php" name="xulythemQLLPxu" method="post">

    <div class="text">
        <h4>
            THÊM LOẠI PHÒNG MỚI
        </h4>
    </div>


    <div class="themmoi">
        <div class="them">
            <!-- <div class="thema">
                <span>Mã loại phòng</span>
                <input type="text" readonly name="ma_loai" />
            </div> -->

            <div class="thema">
                <span>Tên loại phòng</span>
                <input type="text" name="ten_loai" />
            </div>

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
        </div>

        <div class="them">
            <div class="thema">

                <span>Số lượng</span>
                <input type="text" name="so_luong" />
            </div>

            <div class="thema">
                <span>Giá loại phòng</span>
                <input type="text" name="gia_phong" />
            </div>
        </div>
    </div>
    <div class="luulai">
        <input type="submit" name="luu" value="Lưu lại" />
        <button type="button" onclick="window.location.href='QLLP.php'">Trở về</button>

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