<style>
    .text {
        height: 60px;
        font-size: medium;
        display: flex;
        /* flex-direction: column; */
        margin-top: 40px;
        gap: 15px;
        justify-content: center;
    }

    .text h4 {
        font-family: Tahoma;
        background-color: #F5F5F5;
        font-size: large;
        width: 90%;
        padding: 10px 30px;
        display: flex;
        align-items: center;
        color: #40679E;
        font-weight: bold;
    }

    .themtong {
        margin-top: 20px;
        background: #F5F5F5;
        display: flex;
        flex-direction: column;
        /* align-items: center; */
        justify-content: center;
        /* border: 2px solid #F5F5F5; */
        width: 90%;
        margin: 20px auto;
        gap: 20px;
        padding: 40px;
        border-radius: 5px;
    }

    .themmoi {
        gap: 100px;
        display: flex;
        justify-content: center;
    }

    .themm {
        display: flex;
        flex-direction: column;
        gap: 20px;

    }

    .thema {
        display: flex;
        flex-direction: column;
        gap: 5px;

    }

    input[type="text" i] {
        height: 40px;
        border: 1px solid #40679E;
        border-radius: 3px;
        color: black;
        width: 350px;
    }

    .thema>select {
        height: 40px;
        border: 1px solid #40679E;
        border-radius: 3px;
        color: black;
        width: 350px;
    }

    .thema>span {
        color: #40679E;
        font-weight: 600;
        font-size: large;
    }

    .luulai {
        display: flex;
        gap: 30px;
        justify-content: center;
        align-items: center;
        padding: 10px 20px;

    }

    .luulai input {
        margin-top: 5px;
        width: 80px;
        padding: 5px 10px;
        color: #fafafa;
        background-color: #65B741;
        border: 1px solid white;
        font-weight: bolder;
        border-radius: 3px;
        font-size: large;
    }

    .luulai button {
        margin-top: 5px;
        width: 80px;
        padding: 5px 10px;
        color: #fafafa;
        background-color: #FFC100;
        border: 1px solid white;
        font-weight: bolder;
        border-radius: 3px;
        font-size: large;
    }

    .themaa {
        font-size: large;
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .checkbox {
        display: flex;
        gap: 78px;
        justify-content: center;
    }

    .checkboxx {
        gap: 96px;
        margin-left: 152px;
        display: flex;
    }

    .themmoii {
        margin-left: 67px;
    }

    .nhanphong {
        display: flex;
        gap: 16px;
        flex-direction: column;

    }

    .nhanphong>span {
        color: #40679E;
        font-weight: 600;
        font-size: large;
    }

    input[type="checkbox"] {
        height: 20px;
        width: 20px;
    }
</style>

<?php
include ("header.php");
include ("ketnoi.php");

if (isset($_GET['user'])) {
    $ma_o = $_GET['user'];

    // Fetch current data for the given user
    $sql = "SELECT * FROM `o` WHERE `ma_o` = '$ma_o'";
    $result = mysqli_query($conn, $sql);
    $currentData = mysqli_fetch_assoc($result);
}

$sql_khach_hang = "SELECT ho_ten FROM khach_hang WHERE ma_kh = '{$currentData['ma_kh']}'";
$result_khach_hang = mysqli_query($conn, $sql_khach_hang);
if ($result_khach_hang) {
    $row_khach_hang = mysqli_fetch_assoc($result_khach_hang);
    $ho_ten_khach_hang = $row_khach_hang['ho_ten'];
} else {
    // Xử lý khi không lấy được thông tin khách hàng
    $ho_ten_khach_hang = "Không có thông tin khách hàng";
}

$sql_loai_phong = "SELECT ten_loai FROM loai_phong WHERE ma_loai = '{$currentData['ma_loai']}'";
$result_loai_phong = mysqli_query($conn, $sql_loai_phong);
if ($result_loai_phong) {
    $row_loai_phong = mysqli_fetch_assoc($result_loai_phong);
    $ten_loai_phong = $row_loai_phong['ten_loai'];
} else {
    // Xử lý khi không lấy được thông tin loại phòng
    $ten_loai_phong = "Không có thông tin loại phòng";
}
?>

<form enctype="multipart/form-data" action="xulysuapp.php" name="xulysuapp" method="post">
    <input type="hidden" name="ma_o" value="<?php echo $ma_o; ?>">
    <div class="text">
        <h4>PHÂN PHÒNG</h4>
    </div>

    <div class="themtong">
        <div class="themmoi">
            <div class="themm">
                <!-- <div class="thema">
                    <span>Mã phiếu đặt</span>
                    <select name="phieu_dat" id="phieu_dat">
                        <option value="" disabled selected>Vui lòng chọn mã phiếu</option>
                        <?php
                        $sql = "SELECT ma_phieu_dat FROM phieu_dat";
                        $kq = mysqli_query($conn, $sql) or die("Không thể thêm thông tin: " . mysqli_error($conn));
                        while ($row = mysqli_fetch_assoc($kq)) {
                            $ma_phieu_dat = $row['ma_phieu_dat'];
                            $selected = ($currentData['ma_phieu_dat'] == $ma_phieu_dat) ? 'selected' : '';
                            echo "<option value=\"$ma_phieu_dat\" $selected>$ma_phieu_dat</option>";
                        }
                        ?>
                    </select>
                </div> -->
                <div class="thema">
                    <span>Mã phiếu đặt</span>
                    <input type="text" name="phieu_dat" id="phieu_dat"
                        value="<?php echo isset($currentData['ma_phieu_dat']) ? htmlspecialchars($currentData['ma_phieu_dat']) : ''; ?>"
                        readonly>
                </div>
            </div>
            <div class="themm">
                <div class="thema">
                    <span>Nhân viên xác nhận</span>
                    <input type="text" name="ho_ten_nhan_vien" id="nhan_vien_xac_nhan"
                        value="<?php echo $_SESSION['ho_ten']; ?>" readonly />
                </div>
            </div>
        </div>
        <div class="themmoi">
            <div class="thema">
                <span>Họ tên khách hàng</span>
                <input style="width:800px;" type="text" name="ho_ten_khach_hang" id="ho_ten_khach_hang" readonly
                    value="<?php echo $ho_ten_khach_hang; ?>">
            </div>
        </div>
        <div class="themmoi">
            <div class="thema">
                <span>Loại phòng</span>
                <input style="width:800px;" type="text" name="loai_phong" id="loai_phong"
                    value="<?php echo $ten_loai_phong; ?>" readonly>
            </div>
        </div>
        <div class="themmoi">
            <div class="thema">
                <span>Tên phòng</span>
                <select style="width:800px;" name="phong" id="phong">
                    <?php
                    $sql = "SELECT ma_phong, ten_phong FROM phong";
                    $kq = mysqli_query($conn, $sql) or die("Không thể thêm thông tin: " . mysqli_error($conn));
                    while ($row = mysqli_fetch_assoc($kq)) {
                        $ma_phong = $row['ma_phong'];
                        $ten_phong = $row['ten_phong'];
                        $selected = ($currentData['ma_phong'] == $ma_phong) ? 'selected' : '';
                        echo "<option value=\"$ma_phong\" $selected>$ten_phong</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="themmoi">
            <div class="themm">
                <div class="thema">
                    <span>Ngày nhận phòng</span>
                    <input type="text" name="ngay_den" id="ngay_den" readonly
                        value="<?php echo $currentData['ngay_den']; ?>" />
                </div>
                <div class="thema">
                    <span>Ngày trả phòng</span>
                    <input type="text" name="ngay_di" id="ngay_di" value="<?php echo $currentData['ngay_di']; ?>" />
                </div>
            </div>
            <div class="themm">
                <div class="thema">
                    <span>Thời gian nhận phòng</span>
                    <input type="text" name="thoi_gian_den" id="thoi_gian_den"
                        value="<?php echo $currentData['thoi_gian_den']; ?>" />
                </div>
                <div class="thema">
                    <span>Thời gian trả phòng</span>
                    <input type="text" name="thoi_gian_di" id="thoi_gian_di"
                        value="<?php echo $currentData['thoi_gian_di']; ?>" />
                </div>
            </div>
        </div>
        <div class="themmoi">
            <div class="themm">
                <div class="thema">
                    <span>Tổng số tiền</span>
                    <input type="text" name="tong_tien" id="tong_tien" readonly
                        value="<?php echo $currentData['tong_tien']; ?>" />
                </div>
                <div class="thema">
                    <span>Số tiền còn lại</span>
                    <input type="text" name="tong_so_tien_can_tra" id="tong_so_tien_can_tra" readonly
                        value="<?php echo $currentData['tong_so_tien_can_tra']; ?>" />
                </div>
            </div>
            <div class="themm">
                <div class="thema">
                    <span>Số tiền đã cọc</span>
                    <input type="text" name="so_tien_da_coc" id="so_tien_da_coc" readonly
                        value="<?php echo $currentData['so_tien_da_coc']; ?>" />
                </div>
                <div class="thema">
                    <span>Số tiền thực nhận</span>
                    <input type="text" name="so_tien_thuc_nhan" id="so_tien_thuc_nhan"
                        value="<?php echo $currentData['so_tien_thuc_nhan']; ?>" />
                </div>
            </div>
        </div>
        <div class="themmoi">
            <div class="thema">
                <span>Tình trạng</span>
                <select style="width:800px;" name="tinh_trang" id="tinh_trang">
                    <option value="Đã phân phòng" <?php echo ($currentData['tinh_trang'] == 'Đã phân phòng') ? 'selected' : ''; ?>>Đã phân phòng</option>
                    <option value="Đã nhận phòng" <?php echo ($currentData['tinh_trang'] == 'Đã nhận phòng') ? 'selected' : ''; ?>>Đã nhận phòng</option>
                    <option value="Đã trả phòng" <?php echo ($currentData['tinh_trang'] == 'Đã trả phòng') ? 'selected' : ''; ?>>Đã trả phòng</option>
                </select>
            </div>
        </div>
        <div class="themmoi">
            <div class="thema">
                <span>Gia hạn phòng (ngày)</span>
                <select style="width: 800px;" name="gia_han_phong" id="gia_han_phong">
                    <?php
                    for ($i = 0; $i <= 10; $i++) {
                        $selected = ($currentData['gia_han_phong'] == $i) ? 'selected' : '';
                        echo "<option value=\"$i\" $selected>$i ngày</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="themmoi">
            <div class="thema">
                <span>Số tiền gia hạn phòng</span>
                <input type="text" name="so_tien_gia_han_phong" id="so_tien_gia_han_phong" readonly
                    value="<?php echo $currentData['so_tien_gia_han_phong']; ?>" />
            </div>
        </div>
        <div class="themmoii">
            <div class="nhanphong">
                <span>Nhận phòng sớm</span>
                <div class="checkboxx">
                    <div class="themaa">
                        <input type="checkbox" id="nhan_phong_som_6_9" name="nhan_phong_som_6_9"
                            onchange="updateTotalAmount()" <?php echo ($currentData['phu_thu_den_truoc'] == '6h00 - 9h00') ? 'checked' : ''; ?> />
                        <span>6h00 - 9h00</span>
                    </div>
                    <div class="themaa">
                        <input type="checkbox" id="nhan_phong_som_9_12" name="nhan_phong_som_9_12"
                            onchange="updateTotalAmount()" <?php echo ($currentData['phu_thu_den_truoc'] == '9h00 - 12h00') ? 'checked' : ''; ?> />
                        <span>9h00 - 12h00</span>
                    </div>
                </div>
            </div>
            <div class="nhanphong">
                <span>Trả phòng trễ</span>
                <div class="checkboxx">
                    <div class="themaa">
                        <input type="checkbox" id="tra_phong_tre_13_15" name="tra_phong_tre_13_15"
                            onchange="updateTotalAmount()" <?php echo ($currentData['phu_thu_den_sau'] == '13h00 - 15h00') ? 'checked' : ''; ?> />
                        <span>13h00 - 15h00</span>
                    </div>
                    <div class="themaa">
                        <input type="checkbox" id="tra_phong_tre_15_18" name="tra_phong_tre_15_18"
                            onchange="updateTotalAmount()" <?php echo ($currentData['phu_thu_den_sau'] == '15h00 - 18h00') ? 'checked' : ''; ?> />
                        <span>15h00 - 18h00</span>
                    </div>
                    <div class="themaa">
                        <input type="checkbox" id="tra_phong_tre_sau_18" name="tra_phong_tre_sau_18"
                            onchange="updateTotalAmount()" <?php echo ($currentData['phu_thu_den_sau'] == 'Sau 18h') ? 'checked' : ''; ?> />
                        <span>Sau 18h</span>
                    </div>

                </div>
                <?php
                // Kiểm tra và gán giá trị cho biến $ghi_chu
                $ghi_chu = isset($row['ghi_chu']) ? $row['ghi_chu'] : '';
                $so_tien_phu_thu_den_truoc = isset($row['so_tien_phu_thu_den_truoc']) ? $row['so_tien_phu_thu_den_truoc'] : '';
                $so_tien_phu_thu_den_sau = isset($row['so_tien_phu_thu_den_sau']) ? $row['so_tien_phu_thu_den_sau'] : '';
                ?>

                <div class="themmoi">
                    <div class="thema">
                        <span>Số tiền phụ thu đến trước</span>
                        <input type="text" name="so_tien_phu_thu_den_truoc" id="so_tien_phu_thu_den_truoc" readonly
                            value="<?php echo htmlspecialchars($so_tien_phu_thu_den_truoc); ?>">
                    </div>
                    <div class="thema">
                        <span>Số tiền phụ thu đến sau</span>
                        <input type="text" name="so_tien_phu_thu_den_sau" id="so_tien_phu_thu_den_sau" readonly
                            value="">
                    </div>
                </div>

                <div>


                    <span>Ghi chú</span>
                    <input style="width:800px;" type="text" name="ghi_chu" id="ghi_chu"
                        value="<?php echo htmlspecialchars($ghi_chu); ?>">
                </div>

            </div>
        </div>
    </div>
    <div class="luulai">
        <input type="button" name="thoat" id="thoat" value="Thoát" onclick="window.location.href='phanphong.php'" />
        <input type="submit" name="update_o" id="update_o" value="Cập nhật" />
    </div>

</form>

<!-- <script>
    function formatDate(dateString) {
        const date = new Date(dateString);
        const day = date.getDate();
        const month = date.getMonth() + 1;
        const year = date.getFullYear();
        return `${day}/${month}/${year}`;
    }

    async function fetchBookingDetails(maPhieuDat) {
        const response = await fetch('layThongTinPhieuDat.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `ma_phieu_dat=${maPhieuDat}`,
        });

        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }

        const data = await response.json();
        if (data.error) {
            throw new Error(data.error);
        }

        return data;
    }

    async function updateTotalAmount() {
        const maPhieuDat = document.getElementById('phieu_dat').value;

        try {
            const data = await fetchBookingDetails(maPhieuDat);

            // Update form fields with retrieved data
            document.getElementById('ho_ten_khach_hang').value = data.ho_ten_khach_hang;
            document.getElementById('loai_phong').value = data.loai_phong;
            document.getElementById('ngay_den').value = formatDate(data.ngay_nhan);
            document.getElementById('ngay_di').value = formatDate(data.ngay_tra);
            document.getElementById('tong_tien').value = data.tong_tien;
            document.getElementById('so_tien_da_coc').value = data.tien_coc;

            const loaiPhongGia = parseFloat(data.gia_phong);
            const soNgayGiaHan = parseInt(document.getElementById('gia_han_phong').value) || 0;

            // Calculate extension cost and update the input field
            const tienGiaHanPhong = loaiPhongGia * soNgayGiaHan;
            document.getElementById('so_tien_gia_han_phong').value = tienGiaHanPhong.toFixed(0);

            // Calculate remaining amount to be paid
            const soTienDaCoc = parseFloat(data.tien_coc);
            const tongTien = parseFloat(data.tong_tien);
            const soTienConLai = tongTien - soTienDaCoc;

            const earlyCheckinCheckboxes = [
                { checkbox: document.getElementById('nhan_phong_som_6_9'), rate: 0.10 },
                { checkbox: document.getElementById('nhan_phong_som_9_12'), rate: 0.15 }
            ];

            const lateCheckoutCheckboxes = [
                { checkbox: document.getElementById('tra_phong_tre_13_15'), rate: 0.10 },
                { checkbox: document.getElementById('tra_phong_tre_15_18'), rate: 0.15 },
                { checkbox: document.getElementById('tra_phong_tre_sau_18'), rate: 0.20 },
                { checkbox: document.getElementById('tra_phong_tre_20_23'), rate: 0.30 }
            ];

            // Calculate surcharge amounts
            let phuThuDenTruoc = earlyCheckinCheckboxes.reduce((total, item) => {
                return item.checkbox.checked ? total + (tongTien * item.rate) : total;
            }, 0);

            let phuThuDenSau = lateCheckoutCheckboxes.reduce((total, item) => {
                return item.checkbox.checked ? total + (tongTien * item.rate) : total;
            }, 0);

            // Update surcharge input fields
            document.getElementById('so_tien_phu_thu_den_truoc').value = phuThuDenTruoc.toFixed(0);
           document.getElementById('so_tien_phu_thu_den_sau').value = phuThuDenSau.toFixed(0);  // Đây là giá trị mới tính toán từ JavaScript

            const newTongTien = tongTien + phuThuDenTruoc + phuThuDenSau + tienGiaHanPhong;
            document.getElementById('tong_tien').value = newTongTien.toFixed(0);

            const soTienConLaiSauPhi = soTienConLai + phuThuDenTruoc + phuThuDenSau + tienGiaHanPhong;
            document.getElementById('tong_so_tien_can_tra').value = soTienConLaiSauPhi.toFixed(0);


        } catch (error) {
            console.error('Error fetching data:', error);
            alert('Error fetching data. Please try again later.');
        }
    }

    // Add event listeners to relevant elements
    document.getElementById('phieu_dat').addEventListener('change', updateTotalAmount);
    document.getElementById('gia_han_phong').addEventListener('change', updateTotalAmount);

    const checkinCheckoutCheckboxes = [
        document.getElementById('nhan_phong_som_6_9'),
        document.getElementById('nhan_phong_som_9_12'),
        document.getElementById('tra_phong_tre_13_15'),
        document.getElementById('tra_phong_tre_15_18'),
        document.getElementById('tra_phong_tre_sau_18'),
        document.getElementById('tra_phong_tre_20_23')
    ];

    checkinCheckoutCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateTotalAmount);
    });


</script> -->



<script>
    function formatDate(dateString) {
        const date = new Date(dateString);
        const day = date.getDate();
        const month = date.getMonth() + 1;
        const year = date.getFullYear();
        return `${day}/${month}/${year}`;
    }

    async function fetchBookingDetails(maPhieuDat) {
        const response = await fetch('layThongTinPhieuDat.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `ma_phieu_dat=${maPhieuDat}`,
        });

        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }

        const data = await response.json();
        if (data.error) {
            throw new Error(data.error);
        }

        return data;
    }

    async function updateTotalAmount() {
        const maPhieuDat = document.getElementById('phieu_dat').value;

        try {
            const data = await fetchBookingDetails(maPhieuDat);

            // Update form fields with retrieved data
            document.getElementById('ho_ten_khach_hang').value = data.ho_ten_khach_hang;
            document.getElementById('loai_phong').value = data.loai_phong;
            document.getElementById('ngay_den').value = formatDate(data.ngay_nhan);
            document.getElementById('ngay_di').value = formatDate(data.ngay_tra);
            document.getElementById('tong_tien').value = data.tong_tien;
            document.getElementById('so_tien_da_coc').value = data.tien_coc;

            const loaiPhongGia = parseFloat(data.gia_phong);
            const soNgayGiaHan = parseInt(document.getElementById('gia_han_phong').value) || 0;

            // Calculate extension cost and update the input field
            const tienGiaHanPhong = loaiPhongGia * soNgayGiaHan;
            document.getElementById('so_tien_gia_han_phong').value = tienGiaHanPhong.toFixed(0);

            // Calculate remaining amount to be paid
            const soTienDaCoc = parseFloat(data.tien_coc);
            const tongTien = parseFloat(data.tong_tien);
            const soTienConLai = tongTien - soTienDaCoc;

            const earlyCheckinCheckboxes = [
                { checkbox: document.getElementById('nhan_phong_som_6_9'), rate: 0.10 },
                { checkbox: document.getElementById('nhan_phong_som_9_12'), rate: 0.15 }
            ];

            const lateCheckoutCheckboxes = [
                { checkbox: document.getElementById('tra_phong_tre_13_15'), rate: 0.10 },
                { checkbox: document.getElementById('tra_phong_tre_15_18'), rate: 0.15 },
                { checkbox: document.getElementById('tra_phong_tre_sau_18'), rate: 0.50 },
            ];

            // Calculate surcharge amounts
            let phuThuDenTruoc = earlyCheckinCheckboxes.reduce((total, item) => {
                return item.checkbox.checked ? total + (tongTien * item.rate) : total;
            }, 0);

            let phuThuDenSau = lateCheckoutCheckboxes.reduce((total, item) => {
                return item.checkbox.checked ? total + (tongTien * item.rate) : total;
            }, 0);

            // Calculate initial newTongTien without late checkout surcharge
            let newTongTien = tongTien + phuThuDenTruoc + tienGiaHanPhong;

            // Update late checkout surcharge based on newTongTien
            phuThuDenSau = lateCheckoutCheckboxes.reduce((total, item) => {
                return item.checkbox.checked ? total + (newTongTien * item.rate) : total;
            }, 0);

            // Update surcharge input fields
            document.getElementById('so_tien_phu_thu_den_truoc').value = phuThuDenTruoc.toFixed(0);
            document.getElementById('so_tien_phu_thu_den_sau').value = phuThuDenSau.toFixed(0);

            // Final newTongTien including updated late checkout surcharge
            newTongTien += phuThuDenSau;
            document.getElementById('tong_tien').value = newTongTien.toFixed(0);

            const soTienConLaiSauPhi = soTienConLai + phuThuDenTruoc + phuThuDenSau + tienGiaHanPhong;
            document.getElementById('tong_so_tien_can_tra').value = soTienConLaiSauPhi.toFixed(0);

        } catch (error) {
            console.error('Error fetching data:', error);
            alert('Error fetching data. Please try again later.');
        }
    }

    // Add event listeners to relevant elements
    document.getElementById('phieu_dat').addEventListener('change', updateTotalAmount);
    document.getElementById('gia_han_phong').addEventListener('change', updateTotalAmount);

    const checkinCheckoutCheckboxes = [
        document.getElementById('nhan_phong_som_6_9'),
        document.getElementById('nhan_phong_som_9_12'),
        document.getElementById('tra_phong_tre_13_15'),
        document.getElementById('tra_phong_tre_15_18'),
        document.getElementById('tra_phong_tre_sau_18'),
        document.getElementById('tra_phong_tre_20_23')
    ];

    checkinCheckoutCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateTotalAmount);
    });
</script>















<?php include ("footer.php"); ?>