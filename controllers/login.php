<?php
session_start();

require "function.php";
require "dbCon.php";

if (isset($_POST["btnLogin"])) {
    $un = $_POST["uname"];
    $pa = $_POST["psw"];
    $pa = md5($pa);

    $qr = " SELECT * FROM users
            WHERE Username = '$un'
            AND Passwords = '$pa'";

    $con = myConnect();
    $user = mysqli_query($con, $qr);
    if (mysqli_num_rows($user) == 1) {
        $row_user = mysqli_fetch_array($user);
        $_SESSION['ID_User'] = $row_user['ID_User'];
        $_SESSION['Username'] = $row_user['Username'];
        $_SESSION['Hoten'] = $row_user['Hoten'];
        $_SESSION['Groups'] = $row_user['Groups'];
        $_SESSION['Diachi'] = $row_user['Diachi'];
    } elseif (mysqli_num_rows($user) == 0) {
        $_SESSION["error"] = "Đăng nhập <b>thất bại</b>. Xin vui lòng thử lại !";
        $check_usernames = check_username($un);
        $check_passwords = check_password($pa);
        if (mysqli_num_rows($check_usernames) == 0) {
            $_SESSION["error"] = "Username không tồn tại. Xin vui lòng thử lại !";
        } else if (mysqli_num_rows($check_usernames) == 1 && mysqli_num_rows($check_passwords) == 0) {
            $_SESSION["error"] = "Password không chính xác. Xin vui lòng thử lại !";
        }
    }
}

header("Location: ../index.php?p=login");
exit();
