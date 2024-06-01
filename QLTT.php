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
                <h6>QUẢN LÝ TIN TỨC</h6>
            </div>
            <a href="themQLTT.php"><button> + Thêm</button></a>
           
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th width="2%">STT</th>
                            <th width="20%">Người đăng</th>
                            <th>Chủ đề</th>
                            <th>Nội dung</th>
                            <th>Hình ảnh</th>
                            <th>Ngày đăng</th>
                            <th>Trạng thái</th>
                            <th>Tuỳ chọn</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        include ("ketnoi.php");
                        $sql = "select * from tin_tuc";
                        $kq = mysqli_query($conn, $sql) or die("Không thể xuất thông tin " . mysqli_error());

                        while ($row = mysqli_fetch_array($kq)) {
                            $nhan_viens = $row["ma_nv"];
                            $sql2 = "SELECT * FROM nhan_vien WHERE ma_nv='" . $nhan_viens . "'";
                            $kq2 = mysqli_query($conn, $sql2) or die("Không thể xuất thông tin" . mysqli_error());
                            $nhan_vien = mysqli_fetch_array($kq2);
                            echo "<tr>";

                            echo "<td>" . $row["ma_tin_tuc"] . "</td>";
                            $usern = $row["ma_tin_tuc"]; // Gán dữ liệu cột username vào biến $usern
                            echo "<td>" . $nhan_vien["ho_ten"] . "</td>";
                            echo "<td>" . $row["ten_tin_tuc"] . "</td>";
                            echo "<td>" . $row["noi_dung"] . "</td>";
                            echo "<td><img src= '" . $row["hinh_anh"] . "' height='50' width='50'></td>";
                            echo "<td>" . $row["ngay_dang"] . "</td>";
                            echo "<td>" . $row["trang_thai"] . "</td>";
                            echo "<td>
                        <a href='suaQLTT.php?user=$usern'><button><ion-icon name='pencil'></ion-icon></button></a>
                        <a href='suaQLTT.php?user=$usern'><button><ion-icon name='trash'></ion-icon></button></a>
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