<?php
session_start();

require "function.php";
require "dbCon.php";

if (isset($_POST["btnSignup"])) {
    $Hoten = $_POST["Hoten"];
    $Diachi = $_POST["Diachi"];
    $sdt = $_POST["sdt"];
    $date = date_create_from_format('Y-m-d', $_POST["Ngaysinh"]);
    $Ngaysinh = date_format($date, 'Ymd');
    $email = $_POST["email"];
    $Gioitinh = $_POST["Gioitinh"];
    $today = date("Ymd");
    $un = $_POST["uname"];
    $pa = $_POST["psw"];
    $pa = md5($pa);
    $gr = 0;
    $qr = "
        INSERT INTO users(Hoten,Diachi,SDT,Ngaysinh,Email,Gioitinh,Ngaydangky,Username,Passwords,Groups) 
        VALUES ('$Hoten','$Diachi',$sdt,$Ngaysinh,'$email','$Gioitinh',$today,'$un','$pa',$gr);
    ";
    $con = myConnect();
    $register = mysqli_query($con, $qr);

    if (!$register) {
        $_SESSION["error"] = "Đăng ký <b>thất bại</b>. Xin vui lòng thử lại !";
        $check_username = check_uniqueuser($_POST["uname"]);
        if (mysqli_num_rows($check_username) == 1) {
            $_SESSION["error"] = "<b>Lỗi:</b> Username đã được sử dụng";
        }
    }

    header("Location: ../index.php?p=signup");
    exit();
}
