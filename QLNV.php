<?php include ("header.php"); 
include("ketnoi.php");
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
                <h6>QUẢN LÝ NHÂN VIÊN</h6>
            </div>
            <a href="themQLNV.php"><button>+ Thêm</button></a>

            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>STT</th>
                            <th>Họ tên</th>
                            <th>Liên lạc</th>
                            <th>Địa chỉ</th>
                            <th>Tài khoản</th>
                            <th>Trạng thái</th>
                            <th>Tuỳ chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    include("ketnoi.php");
                    $sql="select * from nhan_vien";
                    $kq=mysqli_query($conn,$sql) or die ("Không thể xuất thông tin nhân viên ".mysqli_error());
                    while($row=mysqli_fetch_array($kq)){
            echo "<tr>";
            echo "<td>" . $row["ma_nv"] . "</td>";
            $usern = $row["ma_nv"]; // Gán dữ liệu cột username vào biến $usern
            echo "<td>" . $row["ho_ten"] . "</td>";
            // echo "<td>" . $row["gioi_tinh"] . "</td>";
            // echo "<td>" . $row["cccd"] . "</td>";
            // echo "<td>" . $row["ngay_sinh"] . "</td>";
            echo "<td>" . $row["sdtnv"] . "</td>";
            echo "<td>" . $row["dia_chi"] . "</td>";
            echo "<td>" . $row["user"] . "</td>";
            // echo "<td>" . $row["pass"] . "</td>";
            echo "<td>" . $row["tinh_trang"] . "</td>";
            echo "<td>
                    <a href='suaQLNV.php?user=$usern'><button><ion-icon name='pencil'></ion-icon></button></a>
                    <a href='suaQLNV.php?user=$usern'><button><ion-icon name='eye'></ion-icon></button></a>
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
			"searching":false
		});
	});

</script>