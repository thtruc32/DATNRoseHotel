<?php include ("header.php");
include ("ketnoi.php");
?>

<style>
    a>button {
        color: #D71313;
        font-weight: bolder;
        border: none;
        background-color: #BAD7E9;
        border-radius: 3px;
        margin-left: 30px;
    }
    h6 {
        font-size: 1.5rem;
        font-family: Tahoma;
        color: #40679E;
        font-weight: 600; 
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
                <h6>QUẢN LÝ PHÒNG</h6>
            </div>
            <a href="themQLP.php"><button>+ Thêm</button></a>

            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Mã phòng</th>
                            <th>Loại phòng</th>
                            <th>Tên phòng</th>
                            <!-- <th>Diện tích</th>
                            <th>Thông tin phòng</th> -->
                            <th>Tuỳ chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        include ("ketnoi.php");
                        $sql="select * from phong";
                        $kq=mysqli_query($conn,$sql) or die ("Không thể xuất thông tin nhân viên ".mysqli_error());

                        while ($row = mysqli_fetch_array($kq)) {
                            $loai_phongs = $row["ma_loai"];
                            $sql2 = "SELECT * FROM loai_phong WHERE ma_loai='" . $loai_phongs . "'";
                            $kq2 = mysqli_query($conn, $sql2) or die("Không thể xuất thông tin" . mysqli_error());
                            $loai_phong = mysqli_fetch_array($kq2);
                            echo "<tr>";
                            
                            echo "<td>" . $row["ma_phong"] . "</td>";
                            $usern = $row["ma_phong"];
                            echo "<td>" . $loai_phong["ten_loai"] . "</td>";
                            echo "<td>" . $row["ten_phong"] . "</td>";
                            // echo "<td>" . $row["dien_tich"] . "</td>";
                            // echo "<td>" . $row["chi_tiet_phong"] . "</td>";
                            echo "<td>
                    <a href='suaQLP.php?user=$usern'><button><ion-icon name='pencil'></ion-icon></button></a>
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
