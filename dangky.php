<head><title>The Rose Hotel - Đăng ký tài khoản</title></head>
<style>
    h4 {
        color: #40679E;
        font-weight: 500;
        font-family: system-ui;
        margin-top: 30px;
        text-align: center;
        font-size: 40px;
    }

    .themtong {

        background: #F5F5F5;
        display: flex;
        flex-direction: column;
        /* align-items: center; */
        justify-content: center;
        /* border: 2px solid #F5F5F5; */
        width: 65%;
        margin: 50px auto;
        gap: 30px;
        padding: 30px 38px;
        border-radius: 5px;
    }

    .themmoi {

        display: flex;
        justify-content: center;
    }

    .themm {
        display: flex;
        flex-direction: column;
        gap: 40px;

    }

    .thema {
        display: flex;
        font-family: serif;
        flex-direction: column;
        gap: 5px;

    }

    input[type="text" i] {
        border-radius: 2px;
        height: 40px;
        border: 1px solid darkgray;
        color: darkslategrey;
        font-size: 18px;
        font-family: serif;
        width: 350px;
    }

    input[type="password" i] {
        border-radius: 2px;
        height: 40px;
        border: 1px solid darkgray;
        color: darkslategrey;
        font-size: 18px;
        font-family: serif;
        width: 350px;
    }

    .thema>select {
        border-radius: 2px;
        height: 40px;
        border: 1px solid darkgray;
        color: darkslategrey;
        font-size: 20px;
        font-family: serif;
        width: 350px;
    }

    .thema>span {
        font-family: serif;
        color: #40679E;
        /* font-weight: bolder; */
        font-size: 20px;
    }

    .luulai {
        display: flex;
        flex-direction: column;
        gap: 30px;
        justify-content: center;
        align-items: center;
        padding: 10px 20px;

    }

    .luulai input {
        letter-spacing: 1px;
        font-family: serif;
        height: 40px;
        margin-top: 5px;
        width: 800px;
        padding: 5px 10px;
        color: #fafafa;
        background-color: #40679E;
        border: 1px solid white;
        font-weight: bolder;
        border-radius: 3px;
        font-size: 23px;
    }

    .luulai>input:hover{
        box-shadow: 1px 1px 5px 1px yellow;
    }
    .luulai button {
        letter-spacing: 1px;
        font-family: serif;
        height: 40px;
        margin-top: 5px;
        width: 800px;
        padding: 5px 10px;
        color: #40679E;
        background-color: white;
        border: 1px solid #40679E;
        font-weight: bolder;
        border-radius: 3px;
        font-size: 23px;
    }

    .luulai>button:hover{
        box-shadow: 1px 1px 5px 1px yellow;
    }

    .luulai>a{
       color: #40679E;
       text-decoration: none;
    }

    .luulai>a:hover{
        color: #40679E;
        text-decoration: none;
        text-shadow: 2px 2px 2px yellow;
    }
</style>
<form enctype="multipart/form-data" action="xulydangky.php" name="xulydangky" method="post">
    <div class="form-tong">
        <h4>ĐĂNG KÝ TÀI KHOẢN</h4>
        <div class="themtong">
            <div class="themmoi">
                <div class="thema">
                    <span>Họ tên khách hàng</span>
                    <input style="width:800px" type="text" name="ho_ten" placeholder="Vui lòng nhập họ tên đầy đủ"/>
                </div>
            </div>

            <div class="themmoi">
                <div class="thema">
                    <span>Giới tính</span>
                    <select style="width:800px" name="gioi_tinh">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>
            </div>

            <div class="themmoi">
                <div class="thema">
                    <span>Căn cước công dân</span>
                    <input style="width:800px" type="text" name="cccd" placeholder="CCCD/CMND"/>
                </div>
            </div>

            <div class="themmoi">
                <div class="thema">
                    <span>Số điện thoại</span>
                    <input style="width:800px" type="text" name="sdtkh" placeholder="Số điện thoại" />
                </div>
            </div>

            <div class="themmoi">
                <div class="thema">
                    <span>Địa chỉ</span>
                    <input style="width:800px" type="text" name="dia_chi" placeholder="Địa chỉ"/>
                </div>
            </div>

            <div class="themmoi">
                <div class="thema">
                    <span>Email</span>
                    <input style="width:800px" type="text" name="emailkh" placeholder="Tài khoản đăng nhập" />
                </div>
            </div>

            <div class="themmoi">
                <div class="thema">
                    <span>Mật khẩu</span>
                    <input style="width:800px" type="password" name="matkhaukh" placeholder="Mật khẩu đăng nhập"/>
                </div>
            </div>


            <div class="luulai">
                <input type="submit" name="luu" value="Đăng ký" />
                <button type="button" onclick="window.location.href='dangnhap.php'">Trở về</button>
                <a href="dangnhap.php">Tôi đã có tài khoản!</a>
            </div>
        </div>


    </div>
</form>
</body>

</html>