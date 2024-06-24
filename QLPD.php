<?php include ("header.php");
include ("ketnoi.php");
?>
<style>
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
    .status-chua-xac-nhan {
        color: #40679E;
        font-weight: bold;
    }
    .status-da-xac-nhan {
        color: #65B741;
        font-weight: bold;
    }
    .status-da-huy {
        color: #D04848;
        font-weight: bold;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6>QUẢN LÝ PHIẾU ĐẶT</h6>
            </div>
            <!-- <a href="themQLPD.php"><button>Thêm</button></a> -->

            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">STT</th>
                            <th width="20%">Khách hàng</th>
                            <th witdh="23%">Loại phòng</th>
                            <!-- <th>Nhân viên</th> -->
                            <th width="10%">Ngày đặt</th>
                            <th width="13%">Ngày nhận</th>
                            <!-- <th>Ngày trả</th>
                            <th>Số lượng</th>
                            <th>Tiền cọc</th> -->
                            <th width="17%">Trạng thái</th>
                            <th width="12%">Tuỳ chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        include ("ketnoi.php");
                        $sql = "select * from phieu_dat ";
                        $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin " . mysqli_error());
                        while ($row = mysqli_fetch_array($kq)) {

                            $loai_phongs = $row["ma_loai"];//////////nếu không có khóa ngoại thì ko cần dùng đến
                            $sql2 = "SELECT * FROM loai_phong WHERE ma_loai='" . $loai_phongs . "'";
                            $kq2 = mysqli_query($conn, $sql2) or die("Không thể xuất thông tin " . mysqli_error());
                            $loai_phong = mysqli_fetch_array($kq2);

                            $nhan_viens = $row["ma_nv"];
                            $sql3 = "SELECT * FROM nhan_vien WHERE ma_nv='" . $nhan_viens . "'";
                            $kq3 = mysqli_query($conn, $sql3) or die("Không thể xuất thông tin " . mysqli_error());
                            $nhan_vien = mysqli_fetch_array($kq3);
                            
                            $khach_hangs = $row["ma_kh"];
                            $sql3 = "SELECT * FROM khach_hang WHERE ma_kh='" . $khach_hangs . "'";
                            $kq3 = mysqli_query($conn, $sql3) or die("Không thể xuất thông tin " . mysqli_error());
                            $khach_hang = mysqli_fetch_array($kq3);

                            $status_class = '';
                            switch ($row["trang_thai"]) {
                                case 'Chưa xác nhận':
                                    $status_class = 'status-chua-xac-nhan';
                                    break;
                                case 'Đã xác nhận':
                                    $status_class = 'status-da-xac-nhan';
                                    break;
                                case 'Đã hủy':
                                    $status_class = 'status-da-huy';
                                    break;
                            }

                            echo "<tr>";
                            echo "<td>" . $row["ma_phieu_dat"] . "</td>";
                            $usern = $row["ma_phieu_dat"];
                            echo "<td>" . $khach_hang["ho_ten"] . "</td>";
                            echo "<td>" . $loai_phong["ten_loai"] . "</td>";
                            echo "<td>" . date('d/m/Y', strtotime($row["ngay_dat"])) . "</td>";
                            echo "<td>" . date('d/m/Y', strtotime($row["ngay_nhan"])) . "</td>";
                            echo "<td class='$status_class'>" . $row["trang_thai"] . "</td>";
                            echo "<td>
                        <a href='suaChiTietPD.php?ma_phieu_dat=$usern'><button class='eye'><ion-icon name='eye'></ion-icon></button></a>
                        <a href='phanphong.php?ma_phieu_dat=$usern'><button class='key'><ion-icon name='key'></ion-icon></button></a>
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