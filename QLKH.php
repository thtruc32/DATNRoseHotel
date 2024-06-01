<?php include ("header.php"); 
include("ketnoi.php");
?>

<style>
       .pencil{
    color: white;
    border: none;
    background-color: #FFC100;
    border-radius: 3px;
    }

    .eye{
    color: white;
    border: none;
    background-color: #C40C0C;
    border-radius: 3px;
    }

    a>button{
        color:#D71313;
        font-weight:bolder;
        border:none;
        background-color: #BAD7E9;
        border-radius: 3px;
        /* margin-left: 30px; */
    }
    h6{
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
                <h6>QUẢN LÝ KHÁCH HÀNG</h6>
            </div>
            <a style="margin-left:30px; margin-top: 30px;" href="themQLKH.php"><button>+ Thêm</button></a>

            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">STT</th>
                            <th width="30%">Họ tên khách hàng</th>
                            <th width="17%">Giới tính</th>
                            <th width="17%">CCCD/CMND</th>
                            <th width="17%">Số điện thoại</th>
                            <!-- <th>Email</th> -->
                            <!-- <th>Địa chỉ</th> -->
                            <th width="14%">Tuỳ chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    include("ketnoi.php");
                    $sql="select * from khach_hang";
                    $kq=mysqli_query($conn,$sql) or die ("Không thể xuất thông tin khách hàng ".mysqli_error());
                    while($row=mysqli_fetch_array($kq)){
            echo "<tr>";
            echo "<td>" . $row["ma_kh"] . "</td>";
            $usern = $row["ma_kh"]; // Gán dữ liệu cột username vào biến $usern
            echo "<td>" . $row["ho_ten"] . "</td>";
            echo "<td>" . $row["gioi_tinh"] . "</td>";
            echo "<td>" . $row["cccd"] . "</td>";
            echo "<td>" . $row["sdtkh"] . "</td>";
            // echo "<td>" . $row["emailkh"] . "</td>";
            // echo "<td>" . $row["dia_chi"] . "</td>";
            echo "<td style='display: flex;gap: 10px;justify-content: center;'>
                    <a style='display: flex; align-items: center;' href='suaQLKH.php?user=$usern'><button style='display: flex;padding: 5px;' class='pencil'><ion-icon name='pencil'></ion-icon></button></a>
                   
                    <button style='display: flex;padding: 5px;' class='eye' data-user='$usern'><ion-icon name='eye'></ion-icon></button>
            
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
<!-- Modal -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="customerModalLabel">Thông tin khách hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Nội dung thông tin khách hàng sẽ được tải vào đây -->
        <div id="customer-info"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
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
<script>
$(document).ready(function() {
    $('.eye').on('click', function(e) {
        e.preventDefault();
        var user = $(this).data('user');
        
        // Gửi yêu cầu AJAX để lấy thông tin khách hàng
        $.ajax({
            url: 'infokh.php', // Tạo tệp getCustomerInfo.php để xử lý yêu cầu này
            type: 'GET',
            data: { user: user },
            success: function(response) {
                // Hiển thị thông tin khách hàng trong modal
                $('#customer-info').html(response);
                // Hiển thị modal
                $('#customerModal').modal('show');
            },
            error: function() {
                alert('Không thể tải thông tin khách hàng.');
            }
        });
    });
});
</script>

