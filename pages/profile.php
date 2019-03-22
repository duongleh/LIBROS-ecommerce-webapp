<?php
if (isset($_POST["btnUpdate"])) {
    $Hoten = $_POST["Hoten"];
    $Diachi = $_POST["Diachi"];
    $SDT = $_POST["SDT"];
    $Ngaysinh = $_POST["Ngaysinh"];
    $Email = $_POST["Email"];
    $Gioitinh = $_POST["Gioitinh"];
    $ID_User = $_SESSION['ID_User'];
    $qr = "
         UPDATE users 
         SET
		Hoten='$Hoten',
		Diachi='$Diachi',
		SDT='$SDT',
		Ngaysinh='$Ngaysinh',
		Email='$Email',
		Gioitinh='$Gioitinh'
		where ID_User='$ID_User'
	";
    $con = myConnect();
    $user_info = mysqli_query($con, $qr);
    if ($user_info) {
            $_SESSION['Hoten'] = $Hoten;
            $_SESSION['Diachi'] = $Diachi;
        }
}
$user = check_username($_SESSION['Username']);
$row_user = mysqli_fetch_array($user);
?>

<!-- hr -->
<div class="container-fluid">
    <div class="row">
        <div class="col-10 mx-auto" style="margin-top: 10px">
            <hr>
        </div>
    </div>
</div>
<br>
<div class="container" style="background-color:#be2a2b;color: white;padding: 14px 20px;text-align: center">
    <b>THÔNG TIN CÁ NHÂN</b>
</div>
<br>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-4 text-center">
            <img src="img/img_avatar.png" width="280" height="auto" alt="book_preview" />
            <br>
            <br>
        </div>


        <div class="col-12 col-sm-8 text-center">
            <form name="editInfo" method="POST">
                <div class="form-group row">
                    <label for="Hoten" class="col-4 col-form-label" style="text-align: end; padding: 12px 20px;margin: 8px 0;">
                        <b>Họ và tên:</b></label>
                    <div class="col-6">
                        <input type="text" class="form-control-plaintext" name="Hoten" placeholder="Nhập họ và tên" value="<?php echo $row_user['Hoten'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Diachi" class="col-4 col-form-label" style="text-align: end; padding: 12px 20px;margin: 8px 0;">
                        <b>Địa chỉ:</b></label>
                    <div class="col-6">
                        <input type="text" class="form-control-plaintext" name="Diachi" placeholder="Nhập địa chỉ" value="<?php echo $row_user['Diachi'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="SDT" class="col-4 col-form-label" style="text-align: end; padding: 12px 20px;margin: 8px 0;">
                        <b>Số điện thoại:</b></label>
                    <div class="col-6">
                        <input type="number" class="form-control-plaintext" name="SDT" placeholder="Nhập số điện thoại" value="<?php echo $row_user['SDT'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Ngaysinh" class="col-4 col-form-label" style="text-align: end; padding: 12px 20px;margin: 8px 0;">
                        <b>Ngày sinh:</b></label>
                    <div class="col-6">
                        <input type="date" class="form-control-plaintext" name="Ngaysinh" placeholder="Nhập ngày sinh" value="<?php echo $row_user['Ngaysinh'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Email" class="col-4 col-form-label" style="text-align: end; padding: 12px 20px;margin: 8px 0;">
                        <b>Email:</b></label>
                    <div class="col-6">
                        <input type="email" class="form-control-plaintext" name="Email" placeholder="Nhập email" value="<?php echo $row_user['Email'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Gioitinh" class="col-4 col-form-label" style="text-align: end; padding: 12px 20px;margin: 8px 0;">
                        <b>Giới tính:</b></label>
                    <div class="col-6">
                        <input type="text" class="form-control-plaintext" name="Gioitinh" placeholder="Nhập giới tính" value="<?php echo $row_user['Gioitinh'] ?>">
                    </div>
                </div>
                <fieldset disabled>
                    <div class="form-group row">
                        <label for="disabledTextInput" class="col-4 col-form-label" style="text-align: end; padding: 12px 20px;margin: 8px 0;">
                            <b>Ngày đăng ký:</b></label>
                        <div class="col-6">
                            <input type="text" class="form-contro-plaintext" id="disabledTextInput" value="<?php echo $row_user['Ngaydangky'] ?>">
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <div class="col-12 col-sm-6" style="text-align: center;">
                        <button type="submit" name="btnUpdate" class="btn btn-success" style="text-align: center; padding: 8px 100px;margin: 20px 0;"><b>CẬP NHẬT</b></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <hr>
    <br>
</div>

<?php
if ($row_user['Groups'] == 1) {
    ?>
<a href="admin">
    <div style="text-align: center;">
        <button class="btn btn-danger" style="text-align: center; padding: 8px 100px;margin: 20px 0;"><b>ADMIN PANNEL</b></button>
    </div>
</a>
<?php

}
?>
</div> 