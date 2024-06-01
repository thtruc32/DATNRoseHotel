<?php
include("header.php");
?>

<link rel="stylesheet" href="chinhsua.css" type="text/css"/>
<form enctype="multipart/form-data" action="xulythemQLNV.php" name="xulythemQLNV" method="post">

    <div class="text">
        <h2>
        <ion-icon name="add-circle"></ion-icon>
        THÊM NHÂN VIÊN
        </h2>
    </div>
       

    <div class="themmoi">
        <div class="them">
            <span>STT</span>
            <input type="text" readonly name="ma_nv"/>
        </div>

        <div class="them">
            <span>Họ tên</span>
            <input type="text" name="ho_ten"/>
        </div>

        <div class="them">
            <span>Giới tính</span>
            <input type="text" name="gioi_tinh"/>
        </div>

        <div class="them">
            <span>Căn cước</span>
            <input type="text" name="cccd"/>
        </div>

        <div class="them">
            <span>Ngày sinh</span>
            <input type="text" name="ngay_sinh"/>
        </div>

        <div class="them">
            <span>Liên lạc</span>
            <input type="text" name="sdtnv"/>
        </div>

        <div class="them">
            <span>Địa chỉ</span>
            <input type="text" name="dia_chi"/>
        </div>

        <div class="them">
            <span>Tài khoản</span>
            <input type="text" name="user"/>
        </div>

        <div class="them">
            <span>Mật khẩu</span>
            <input type="text" name="pass"/>
        </div>

        <div class="them">
            <span>Quyền</span>
            <input type="text" name="quyen"/>
        </div>

        <div class="them">
            <span>Tình trạng</span>
            <input type="text" name="tinh_trang"/>
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