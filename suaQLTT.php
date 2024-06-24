<?php
include("header.php");
include("ketnoi.php");

$usern = $_REQUEST["user"]; //Nhận giá trị user từ link sửa của quantri.php

$sql = "SELECT * FROM tin_tuc WHERE ma_tin_tuc = '".$usern."'";
$kq = mysqli_query($conn, $sql) or die("Không thể sửa tin tức: " . mysqli_error($conn));
$row = mysqli_fetch_array($kq);
?>
<link rel="stylesheet" href="css/chinhsua.css" type="text/css"/>

<form enctype="multipart/form-data" action="xulysuaQLTT.php" name="xulysuaQLTT" method="post">
    <div class="text">
        <h2>
        <ion-icon name="add-circle"></ion-icon>
        SỬA THÔNG TIN BÀI ĐĂNG
        </h2>
    </div>

    <div class="themmoi">
        <div class="them">
            <span>STT</span>
            <input type="text" name="ma_tin_tuc" readonly value="<?php echo $row["ma_tin_tuc"]; ?>"/>
        </div>

        <div class="them">
            <span>Người đăng</span>
            <select name="ma_nv">
                <?php
                $sql2 = "SELECT ma_nv, ho_ten FROM nhan_vien";
                $result2 = mysqli_query($conn, $sql2) or die("Không thể lấy thông tin người đăng: " . mysqli_error($conn));
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $ma_nv = $row2['ma_nv'];
                    $ho_ten = $row2['ho_ten'];
                    $selected = ($ma_nv == $row['ma_nv']) ? "selected" : ""; 
                    echo "<option value=\"$ma_nv\" $selected>$ho_ten</option>";
                }
                ?>
            </select>
        </div>

        <div class="them">
            <span>Chủ đề</span>
            <input type="text" name="ten_tin_tuc" value="<?php echo $row["ten_tin_tuc"]; ?>"/>
        </div>

        <div class="them">
            <span>Nội dung</span>
            <input type="text" name="noi_dung" value="<?php echo $row["noi_dung"]; ?>"/>
        </div>

        <div class="them">
            <span>Hình ảnh</span>
            <input type="text" name="hinh_anh_hien_tai" id="hinh_anh_hien_tai" value="<?php echo $row['hinh_anh']; ?>" readonly>
            <input type="file" name="hinh_anh" id="hinh_anh" style="display:none;" onchange="updateImagePath(this)">
            <img id="hinh_anh_preview" src="<?php echo $row['hinh_anh']; ?>" alt="Hình ảnh hiện tại" style="max-width:300px;">
            <button type="button" onclick="document.getElementById('hinh_anh').click();">Chọn hình ảnh mới</button>
            
        </div>

        <div class="them">
            <span>Ngày đăng</span>
            <input type="text" name="ngay_dang" value="<?php echo $row["ngay_dang"]; ?>"/>
        </div>

        <div class="them">
            <span>Trạng thái</span>
            <input type="text" name="trang_thai" value="<?php echo $row["trang_thai"]; ?>"/>
        </div>

        <div class="luulai">
            <input type="submit" name="luu" value="Lưu"/>
        </div>
    </div>
</form>

<script>
function updateImagePath(input) {
    var filePath = input.value.split('\\').pop(); // Lấy tên tệp từ đường dẫn đầy đủ
    document.getElementById('hinh_anh_hien_tai').value = "./anhtin/" + filePath; // Cập nhật đường dẫn hiển thị
    
    // Hiển thị hình ảnh mới
    var file = input.files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('hinh_anh_preview').src = e.target.result;
    };
    reader.readAsDataURL(file);
}
</script>

<?php
include("footer.php")
?>
