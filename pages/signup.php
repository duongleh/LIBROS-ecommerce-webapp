<form name="Signup" method="POST">
    <div class="container" style="background-color:#f1f1f1;padding: 14px 20px;text-align: center">
        <b> ĐĂNG KÝ </b>
    </div>
    <br>

    <?php
    if (isset($_POST["btnSignup"]) && ($register == false)) {
            $check_username = check_uniqueuser($_POST["uname"]);
            ?>
    <div class="container" style="background-color:red;padding: 14px 20px;text-align: center;color:white">
        Đăng ký <b>THẤT BẠI</b>. Xin vui lòng thử lại !<br>
        <?php
        if (mysqli_num_rows($check_username) == 1) {
                echo "<b>Lỗi:</b> Username đã được sử dụng";
            }
        ?>
    </div>
    <br>
    <?php

}   ?>


    <div class="container">
        <label for="Hoten"><b>Họ tên *</b></label>
        <input type="text" placeholder="Nhập họ và tên" name="Hoten" required>
        <br><br>
        <label for="Diachi"><b>Địa chỉ *</b></label>
        <input type="text" placeholder="Nhập địa chỉ" name="Diachi" required>
        <br><br>
        <label for="sdt"><b>Số điện thoại *</b></label>
        <input type="number" placeholder="Nhập số điện thoại" name="sdt" required>
        <br><br>
        <label for="Ngaysinh"><b>Ngày sinh</b></label>
        <input type="date" data-date="" data-date-format="YYYYMMDD" placeholder="Nhập ngày sinh" name="Ngaysinh">
        <br><br>
        <label for="email"><b>Email *</b></label>
        <input type="email" placeholder="Nhập email" name="email" required>
        <br><br>
        <label for="Gioitinh"><b>Giới tính</b></label>
        <input type="text" placeholder="Nhập giới tính" name="Gioitinh">
        <br><br>
        <label for="uname"><b>Username * </b></label>
        <input type="text" placeholder="Nhập Username" name="uname" required>
        <br><br>
        <label for="psw"><b>Password *</b></label>
        <input type="password" placeholder="Nhập Password" name="psw" required>

        <button type="submit" name="btnSignup" style="margin-top: 25px" class="loginbtn">SIGN UP</button>
    </div>
</form> 