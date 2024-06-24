<?php include ("header.php");
include ("ketnoi.php");
?>
<style>

.btthem>button {
        display: flex;
        color: #fafafa;
        font-weight: bolder;
        border: none;
        background-color: #D04848;
        border-radius: 3px;
        margin-left: 15px;
        margin-top: 20px;
        gap: 2px;
        justify-content: center;
        align-items: center;
    }
    .key{
    color: white;
    border: none;
    background-color:#D04848;
    border-radius: 3px;
    }

    .eye{
    color: white;
    border: none;
    background-color:#65B741;
    border-radius: 3px;
    }

    h6 {
        font-size: 1.5rem;
        font-family: Tahoma;
        color: #40679E;
        font-weight: 600;
        margin: 2px;
    }
    .table th, .table td {
        text-align: center; /* Căn giữa dữ liệu */
        vertical-align: middle; /* Căn giữa theo chiều dọc */
    }
 
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6>QUẢN LÝ PHÂN PHÒNG</h6>
            </div>
            <a class="btthem" href="thempp.php"><button><ion-icon name="add-circle"></ion-icon>Thêm</button></a>

            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>STT</th>
                            <th>Phiếu đặt</th>
                            <th>Loại phòng</th>
                            <th>Phòng</th>
                            <th>Khách hàng</th>
                            <th>Nhân viên</th>
                            <th>Ngày nhận</th>
                            <th>Ngày trả</th>
                            <th>Tuỳ chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        include ("ketnoi.php");
                        $sql = "select * from o ";
                        $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin " . mysqli_error());
                        while ($row = mysqli_fetch_array($kq)) {

                            $phieu_dats = $row["ma_phieu_dat"];//////////nếu không có khóa ngoại thì ko cần dùng đến
                            $sql2 = "SELECT * FROM phieu_dat WHERE ma_phieu_dat='" . $phieu_dats . "'";
                            $kq2 = mysqli_query($conn, $sql2) or die("Không thể xuất thông tin " . mysqli_error());
                            $phieu_dat = mysqli_fetch_array($kq2);

                            $loai_phongs = $row["ma_loai"];//////////nếu không có khóa ngoại thì ko cần dùng đến
                            $sql2 = "SELECT * FROM loai_phong WHERE ma_loai='" . $loai_phongs . "'";
                            $kq2 = mysqli_query($conn, $sql2) or die("Không thể xuất thông tin " . mysqli_error());
                            $loai_phong = mysqli_fetch_array($kq2);

                            $phongs = $row["ma_phong"];//////////nếu không có khóa ngoại thì ko cần dùng đến
                            $sql2 = "SELECT * FROM phong WHERE ma_phong='" . $phongs . "'";
                            $kq2 = mysqli_query($conn, $sql2) or die("Không thể xuất thông tin " . mysqli_error());
                            $phong = mysqli_fetch_array($kq2);

                            $khach_hangs = $row["ma_kh"];
                            $sql3 = "SELECT * FROM khach_hang WHERE ma_kh='" . $khach_hangs . "'";
                            $kq3 = mysqli_query($conn, $sql3) or die("Không thể xuất thông tin " . mysqli_error());
                            $khach_hang = mysqli_fetch_array($kq3);

                            $nhan_viens = $row["ma_nv"];
                            $sql3 = "SELECT * FROM nhan_vien WHERE ma_nv='" . $nhan_viens . "'";
                            $kq3 = mysqli_query($conn, $sql3) or die("Không thể xuất thông tin " . mysqli_error());
                            $nhan_vien = mysqli_fetch_array($kq3);
                          

                            echo "<tr>";
                            echo "<td>" . $row["ma_o"] . "</td>";
                            $usern = $row["ma_o"];
                            echo "<td>" . $phieu_dat["ma_phieu_dat"] . "</td>";
                            echo "<td>" . $loai_phong["ten_loai"] . "</td>";
                            echo "<td>" . $phong["ten_phong"] . "</td>";
                            echo "<td>" . $khach_hang["ho_ten"] . "</td>";
                            echo "<td>" . $nhan_vien["ho_ten"] . "</td>";
                            echo "<td>" . $row["ngay_den"] . "</td>";
                            echo "<td>" . $row["ngay_di"] . "</td>";
                            echo "<td>
                            <a href='chitietpp.php?user=$usern'><button class='eye'><ion-icon name='eye'></ion-icon></button></a>
                            <a href='suapp.php?user=$usern'><button><ion-icon name='pencil'></ion-icon></button></a>
                            </td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include ("footer.php"); ?>

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "Không có dữ liệu",
                "info": "Đang hiển thị _START_ đến _END_ của _TOTAL_ mục",
                "infoEmpty": "Đang hiển thị 0 đến 0 của 0 mục",
                "infoFiltered": "(đã lọc từ tổng số _MAX_ mục)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Hiển thị _MENU_ mục",
                "loadingRecords": "Đang tải...",
                "processing": "Đang xử lý...",
                "search": "Tìm kiếm:",
                "zeroRecords": "Không tìm thấy kết quả phù hợp",
                "paginate": {
                    "first": "Đầu",
                    "last": "Cuối",
                    "next": "Tiếp",
                    "previous": "Trước"
                },
                "aria": {
                    "sortAscending": ": sắp xếp tăng dần",
                    "sortDescending": ": sắp xếp giảm dần"
                },
                "searchPlaceholder": "Tìm kiếm..."
            },
            "pageLength": 10,
        });
    });

</script>