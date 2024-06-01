<?php include ("header.php");
include ("ketnoi.php");
?>
<style>
    a>button{
        color:#D71313;
        font-weight:bolder;
        border:none;
        background-color: #BAD7E9;
        border-radius: 3px;
        margin-left: 30px;
    }
    h6{
        font-size: 1.5rem;
        font-family: Tahoma;
        color: #40679E;
        font-weight: 600; 
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6>QUẢN LÝ HOÁ ĐƠN</h6>
            </div>

            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>STT</th>
                            <th>Phân phòng</th>
                            <th>Khách hàng</th>
                            <th>Nhân viên</th>
                            <th>Ngày lập</th>
                            <th>Thành tiền</th>
                            <th>Tuỳ chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        include ("ketnoi.php");
                        $sql = "select * from hoa_don ";
                        $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin hoá đơn" . mysqli_error());
                        while ($row = mysqli_fetch_array($kq)) {

                            $os = $row["ma_o"];
                            $sql2 = "SELECT * FROM o WHERE ma_o='" . $os . "'";
                            $kq2 = mysqli_query($conn, $sql2) or die("Không thể xuất thông tin " . mysqli_error());
                            $o = mysqli_fetch_array($kq2);

                            $khach_hangs = $row["ma_kh"];
                            $sql3 = "SELECT * FROM khach_hang WHERE ma_kh='" . $khach_hangs . "'";
                            $kq3 = mysqli_query($conn, $sql3) or die("Không thể xuất thông tin " . mysqli_error());
                            $khach_hang = mysqli_fetch_array($kq3);

                            $nhan_viens = $row["ma_nv"];
                            $sql3 = "SELECT * FROM nhan_vien WHERE ma_nv='" . $nhan_viens . "'";
                            $kq3 = mysqli_query($conn, $sql3) or die("Không thể xuất thông tin " . mysqli_error());
                            $nhan_vien = mysqli_fetch_array($kq3);
                            
                            echo "<td>" . $row["ma_o"] . "</td>";
                            $usern = $row["ma_o"];
                            echo "<td>" . $khach_hang["ho_ten"] . "</td>";
                            echo "<td>" . $nhan_vien["ho_ten"] . "</td>";
                            echo "<td>" . $row["ngay_lap_hoa_don"] . "</td>";
                            echo "<td>" . $row["thanh_tien"] . "</td>";
                            echo "<td>
                            <a href='suaQLHD.php?user=$usern'><button><ion-icon name='pencil'></ion-icon></button></a>
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
            "searching": false
        });
    });

</script>