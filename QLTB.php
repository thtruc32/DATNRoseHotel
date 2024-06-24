<?php include ("header.php"); 
include("ketnoi.php");
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

    h6 {
        font-size: 1.5rem;
        font-family: Tahoma;
        color: #40679E;
        font-weight: 600;
        margin: 2px;
    }
    .pencil {
        color: white;
        border: none;
        background-color: #FFC100;
        border-radius: 3px;
    }

    .trash{
        color: white;
        border: none;
        background-color: #65B741;
        border-radius: 3px;
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
                <h6>QUẢN LÝ THIẾT BỊ</h6>
            </div>
            <a class="btthem" href="themQLTB.php">
                <button>
                <ion-icon name="add-circle"></ion-icon>
                    Thêm</button></a>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>Mã thiết bị</th>
                            <th>Tên thiết bị</th>
                            <th>Tổng số lượng</th>
                            <th>Số lượng tồn</th>
                            <th>Tuỳ chọn</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                    <?php
                    
                    include("ketnoi.php");
                    $sql="select * from thiet_bi";
                    $kq=mysqli_query($conn,$sql) or die ("Không thể xuất thông tin thiết bị ".mysqli_error());
                    while($row=mysqli_fetch_array($kq)){
            echo "<tr>";
            echo "<td>" . $row["ma_thiet_bi"] . "</td>";
            $usern = $row["ma_thiet_bi"]; // Gán dữ liệu cột username vào biến $usern
            echo "<td>" . $row["ten_thiet_bi"] . "</td>";
            echo "<td>" . $row["so_luong_tong"] . "</td>";
            echo "<td>" . $row["so_luong_ton"] . "</td>";
            echo "<td>
                    <a href='suaQLTB.php?user=$usern'><button class='pencil'><ion-icon name='pencil'></ion-icon></button></a>
                    <a href='xoaQLTB.php?user=$usern'><button class='trash'><ion-icon name='trash'></button></ion-icon></a>
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