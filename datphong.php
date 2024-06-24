<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include ("headertc.php");
include ('ketnoi.php');

if (!isset($_SESSION['ma_kh'])) {
    header('Location: login.php');
    exit;
}

$ma_kh = $_SESSION['ma_kh'];
$ten_loai = '';
$gia_phong = 0;
$tien_coc = 0;
$tong_tien = 0;
$so_luong = 0;

if (isset($_GET['id'])) {
    $ma_loai = $_GET['id'];
    $sql = "SELECT * FROM loai_phong WHERE ma_loai = '" . $conn->real_escape_string($ma_loai) . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $ten_loai = $row["ten_loai"];
        $gia_phong = $row["gia_phong"];
        $so_luong = $row["so_luong"];
    } else {
        echo 'Không có thông tin phòng.';
    }
} else {
    echo 'Thiếu thông tin phòng.';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ngay_dat = date("Y-m-d");
    $ngay_nhan = $_POST['ngay_nhan'];
    $ngay_tra = $_POST['ngay_tra'];
    $so_luong_nguoi_lon = $_POST['so_luong_nguoi_lon'];
    $so_luong_tre_em_duoi_6 = isset($_POST['so_luong_tre_em_duoi_6']) ? intval($_POST['so_luong_tre_em_duoi_6']) : 0;
    $so_luong_tre_em_tren_6 = isset($_POST['so_luong_tre_em_tren_6']) ? intval($_POST['so_luong_tre_em_tren_6']) : 0;
    $so_luong_tre_em = $so_luong_tre_em_duoi_6 + $so_luong_tre_em_tren_6;
    $phu_thu_tre_em = isset($_POST['phu_thu_tre_em']) ? $_POST['phu_thu_tre_em'] : 0;
    $so_luong_phong_dat = $_POST['so_luong_phong_dat'];
    $tien_coc = $_POST['tien_coc'];
    $tong_tien = $_POST['tong_tien'];
    $trang_thai = "Đã chuyển đặt cọc";

    $sql_insert = "INSERT INTO phieu_dat (ma_kh, ma_loai, ma_nv, ngay_dat, ngay_nhan, ngay_tra, so_luong_nguoi_lon, so_luong_tre_em, phu_thu_tre_em, so_luong_phong_dat, tien_coc, tong_tien, trang_thai) VALUES ('$ma_kh', '$ma_loai', NULL, '$ngay_dat', '$ngay_nhan', '$ngay_tra', '$so_luong_nguoi_lon', '$so_luong_tre_em', '$phu_thu_tre_em', '$so_luong_phong_dat', '$tien_coc', '$tong_tien', '$trang_thai')";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Xử lý dữ liệu biểu mẫu và chèn vào cơ sở dữ liệu
        if ($conn->query($sql_insert) === TRUE) {
            echo "<script>alert('Bạn đã đặt phòng thành công!'); window.location.href='thongtinkhach.php';</script>";
            exit; 
        } else {
            echo "Lỗi: " . $sql_insert . "<br>" . $conn->error;
        }
    }
}

?>

<form enctype="multipart/form-data" action="" name="xulydatphong" method="post"
    onsubmit="event.preventDefault(); showConfirmationPopup();">

    <div class="image-bia">
        <img class="img-bia" src="anhtin/a1.jpg" />
    </div>

    <div class="form-datphong">
        <h4>PHIẾU ĐẶT</h4>
        <p>Sử dụng biểu mẫu dưới đây, bạn có thể đặt phòng trực tuyến của chúng tôi và nhận đặt phòng đảm bảo.</p>

        <div class="frame-form">
            <div class="title-form">
                <span>Vui lòng chọn ngày nhận, trả phòng và số lượng khách</span>
            </div>
            <div class="frame-content">
                <div class="content">
                    <span style="color: dimgray;">Bạn đang chọn phòng "<a
                            style="color:#b20600; font-weight:bold;"><?php echo htmlspecialchars($ten_loai); ?></a>"</span>
                </div>
            </div>
            <div class="frame-contentt">
                <div class="content">
                    <span>Ngày nhận phòng</span>
                    <input type="date" name="ngay_nhan" id="ngay_nhan" onchange="updateTotal()" />
                </div>
                <div class="content">
                    <span>Ngày trả phòng</span>
                    <input type="date" name="ngay_tra" id="ngay_tra" onchange="updateTotal()" />
                </div>
            </div>
            <!-- <div class="frame-content">
                <span>Trẻ từ 6 tuổi trở lên, phụ thu 70.000/người</span>
            </div> -->
            <div class="framecontentt">
                <div class="content">
                    <span>Số lượng người lớn</span>
                    <div class="quantity-control">
                        <button style="height: 22px; width: 23px; font-size: 15px;" type="button"
                            onclick="updateQuantity('so_luong_nguoi_lon', -1)">-</button>
                        <input style="height: 37px; width: 221px;" type="text" id="so_luong_nguoi_lon"
                            name="so_luong_nguoi_lon" value="1 người lớn" readonly data-label="người lớn">
                        <button style="height: 22px; width: 23px; font-size: 15px;" type="button"
                            onclick="updateQuantity('so_luong_nguoi_lon', 1)">+</button>
                    </div>
                </div>
                <div class="content">
                    <span>Chọn số lượng trẻ <a style="color:#b20600;">dưới</a> 6 tuổi</span>
                    <div class="quantity-control">
                        <button style="height: 22px; width: 23px; font-size: 15px;" type="button"
                            onclick="updateQuantity('so_luong_tre_em_duoi_6', -1)">-</button>
                        <input style="height: 37px; width: 221px;" type="text" id="so_luong_tre_em_duoi_6"
                            name="so_luong_tre_em_duoi_6" value="0 trẻ em" readonly data-label="trẻ em">
                        <button style="height: 22px; width: 23px; font-size: 15px;" type="button"
                            onclick="updateQuantity('so_luong_tre_em_duoi_6', 1)">+</button>
                    </div>
                    <span style="color:#b20600;">**Trẻ từ 6 tuổi trở lên, phụ thu thêm 70.000/người</span>

                    <span>Chọn số lượng trẻ <a style="color:#b20600;">trên</a> 6 tuổi</span>
                    <div class="quantity-control">
                        <button style="height: 22px; width: 23px; font-size: 15px;" type="button"
                            onclick="updateQuantity('so_luong_tre_em_tren_6', -1)">-</button>
                        <input style="height: 37px; width: 221px;" type="text" id="so_luong_tre_em_tren_6"
                            name="so_luong_tre_em_tren_6" value="0 trẻ em" readonly data-label="trẻ em">
                        <button style="height: 22px; width: 23px; font-size: 15px;" type="button"
                            onclick="updateQuantity('so_luong_tre_em_tren_6', 1)">+</button>
                    </div>
                    <span>Số tiền phụ thu trẻ: <input style="border:none; background-color:#F0F0F0; color:#b20600;"
                            type="text" readonly name="phu_thu_tre_em" id="phu_thu_tre_em" /></span>

                </div>
            </div>

            <div class="frame-contenttt">
                <div class="contentt">
                    <span>Số lượng phòng</span>
                    <select name="so_luong_phong_dat" id="so_luong_phong_dat" onchange="updateTotal()">
                        <option value="" disabled selected>Chọn số lượng phòng</option>
                        <?php
                        for ($i = 1; $i <= $so_luong; $i++) {
                            echo '<option value="' . $i . '">' . $i . ' phòng</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="frame-contentt">
                <div class="content">
                    <span>Tổng số tiền</span>
                    <input type="text" readonly name="tong_tien" value="<?php echo $tong_tien; ?>" />
                </div>
                <div class="content">
                    <span>Tiền cọc phòng</span>
                    <input type="text" readonly name="tien_coc" value="<?php echo $tien_coc; ?>" />
                </div>
            </div>

            <div class="framecontent">
                <div class="frcontent">
                    <span>Thông tin chuyển khoản</span>
                    <p><a style="color:#b20600;">**</a>Quý khách vui lòng<a style="color:#b20600;">chuyển khoản đặt cọc phòng trước khi bấm đặt phòng</a>để được xác nhận phòng nhanh chóng.</p>
                    <p><a style="color:#b20600;">**</a>Nội dung chuyển khoản: HỌ TÊN - LOẠI PHÒNG ĐÃ ĐẶT.</p>
                    <label class="imgQR">
                        <img class="imgqr" src="anhtin/maqr.jpg" />
                    </label>

                </div>

            </div>
            <button type="button" class="btdatphongg" onclick="showConfirmationPopup()">ĐẶT PHÒNG</button>

        </div>
        <div class="phone-button">
            <a href="tel:+0903345615">
                <i class="fa-solid fa-phone"></i>0903 345 615
            </a>
        </div>
        <button onclick="topFunction()" id="scrollToTopBtn" title="Go to top">
            <i style="font-size: 18px; color:white;" class="fa-solid fa-arrow-up"></i>
        </button>
    </div>
</form>
<script>
    function showConfirmationPopup() {
    
        let ngayNhan = document.getElementById('ngay_nhan').value;
        let ngayTra = document.getElementById('ngay_tra').value;
        let soLuongNguoiLon = document.getElementById('so_luong_nguoi_lon').value;
        let soLuongTreEmDuoi6 = document.getElementById('so_luong_tre_em_duoi_6').value;
        let soLuongTreEmTren6 = document.getElementById('so_luong_tre_em_tren_6').value;
        let soLuongPhong = document.getElementById('so_luong_phong_dat').value;
        let tongTien = document.getElementsByName('tong_tien')[0].value;
        let tienCoc = document.getElementsByName('tien_coc')[0].value;

        let confirmationMessage = `Xác nhận đặt phòng với các thông tin sau:\n
                              - Ngày nhận phòng: ${ngayNhan}\n
                              - Ngày trả phòng: ${ngayTra}\n
                              - Số lượng người lớn: ${soLuongNguoiLon}\n
                              - Số lượng trẻ em dưới 6 tuổi: ${soLuongTreEmDuoi6}\n
                              - Số lượng trẻ em trên 6 tuổi: ${soLuongTreEmTren6}\n
                              - Số lượng phòng: ${soLuongPhong}\n
                              - Tổng tiền: ${tongTien}\n
                              - Tiền đặt cọc: ${tienCoc}`;

        // Hiển thị hộp thoại xác nhận với hai lựa chọn Đồng ý và Hủy bỏ
        let confirmation = confirm(confirmationMessage);

        // Nếu người dùng chọn Đồng ý, gửi biểu mẫu
        if (confirmation) {
            document.forms['xulydatphong'].submit();
        }
    }
</script>

<script>
    let mybutton = document.getElementById("scrollToTopBtn");
    window.onscroll = function () { scrollFunction() };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }
    function updateQuantity(id, change) {
        let input = document.getElementById(id);
        let currentValue = parseInt(input.value);
        if (!isNaN(currentValue)) {
            let newValue = currentValue + change;
            if (newValue >= 0) {
                if (id === "so_luong_tre_em_duoi_6" || id === "so_luong_tre_em_tren_6") {
                    input.value = newValue + " trẻ em"; // Update label to "trẻ em"
                } else {
                    input.value = newValue + " người lớn"; // Default to "người lớn"
                }
                // Update total when quantity changes
                updateTotal();
            }
        }
    }

    function updateTotal() {
        let selectedRooms = document.getElementById("so_luong_phong_dat").value;
        let ngay_nhan = new Date(document.getElementById("ngay_nhan").value);
        let ngay_tra = new Date(document.getElementById("ngay_tra").value);
        let diffTime = Math.abs(ngay_tra - ngay_nhan);
        let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        let totalPrice = selectedRooms * <?php echo $gia_phong; ?> * diffDays;
        let additionalCharge = 0;
        let so_luong_tre_em_tren_6 = parseInt(document.getElementById("so_luong_tre_em_tren_6").value);
        if (!isNaN(so_luong_tre_em_tren_6)) {
            additionalCharge = so_luong_tre_em_tren_6 * 70000;
        }
        document.getElementById("phu_thu_tre_em").value = additionalCharge;
        let totalWithChildren = additionalCharge + totalPrice;
        let deposit = totalWithChildren / 2;
        document.getElementsByName("tong_tien")[0].value = totalWithChildren;
        if (selectedRooms !== "") {
            document.getElementsByName("tien_coc")[0].value = deposit;
        } else {
            document.getElementsByName("tien_coc")[0].value = 0;
        }
    }
</script>
<?php
include ("footertc.php")
    ?>