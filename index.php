<?php
session_start();
require "lib/dbCon.php";
require "lib/function.php";
require("lib/quantri.php");
?>
<?php
if (isset($_GET["p"])) $p = $_GET["p"];
else $p = "";
if (isset($_GET["ID_TheLoai"])) $IDTL = $_GET["ID_TheLoai"];
else $IDTL = "";
if (isset($_GET["ID_Sach"])) $IDS = $_GET["ID_Sach"];
else $IDS = "";
if (isset($_GET["page"])) $page = $_GET["page"];
else $page = 1;
?>

<!-- signup -->
<?php
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
}
?>

<!-- login -->
<?php
if (isset($_POST["btnLogin"])) {
    $un = $_POST["uname"];
    $pa = $_POST["psw"];
    $pa = md5($pa);

    $qr = "
        SELECT * FROM users 
        WHERE Username = '$un'
        AND Passwords = '$pa'   
    ";
    $con = myConnect();
    $user = mysqli_query($con, $qr);
    if (mysqli_num_rows($user) == 1) {
        $row_user = mysqli_fetch_array($user);
        $_SESSION['ID_User'] = $row_user['ID_User'];
        $_SESSION['Username'] = $row_user['Username'];
        $_SESSION['Hoten'] = $row_user['Hoten'];
        $_SESSION['Groups'] = $row_user['Groups'];
        $_SESSION['Diachi'] = $row_user['Diachi'];
    }
}
?>

<!-- logout -->
<?php
if (isset($_POST["btnLogout"])) {
    unset($_SESSION['ID_User']);
    unset($_SESSION['Username']);
    unset($_SESSION['Hoten']);
    unset($_SESSION['Groups']);
    unset($_SESSION['Diachi']);
}
?>

<!-- buy -->
<?php
if (!isset($_SESSION['cart'])) {
    $_SESSION['indexs'] = 0;
    $shop = array(
        array("0", "0", "0")
    );
    $_SESSION['cart'] = $shop;
}

if (isset($_POST["btnBuy"])) {
    $_SESSION['indexs'] += 1;
    $shopitem =  $_POST["item"];
    $shopnum =  $_POST["num"];
    $shopprice = SanPhamSach($shopitem);
    $row_shopprice = mysqli_fetch_array($shopprice);
    $itemTotalPrice =   $row_shopprice["Giasach"] * $shopnum;
    array_push($_SESSION['cart'], array("$shopitem", "$shopnum", "$itemTotalPrice"));
}
?>

<!-- delete cart-->
<?php
if (isset($_POST["btnCancel"])) {
    unset($_SESSION['cart']);
    unset($_SESSION['indexs']);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LIBROS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/layout.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>

<body>

    <?php
    require "blocks/header.php";

    $arr = array("danhmucsach", "product", "signup", "timkiem", "giohang", "checkout", "profile", "aboutus", "order");
    foreach ($arr as &$value) {
        if ($p == $value) require "blocks/hr.php";
    }

    switch ($p) {
        case "danhmucsach":
            require "pages/danhmucsach.php";
            break;
        case "product":
            require "pages/product.php";
            break;
        case "login":
            {
                if (!isset($_SESSION['ID_User'])) {
                    require "pages/login.php";
                } else {
                    require "pages/homepage.php";
                }
                break;
            }
        case "signup":
            {
                if (!isset($_SESSION['ID_User'])) {
                    if (isset($_POST["btnSignup"]) && ($register == true)) {
                        require "blocks/signupsuccess.php";
                    } else {
                        require "pages/signup.php";
                    }
                } else {
                    require "pages/homepage.php";
                }
                break;
            }
        case "timkiem":
            require "pages/timkiem.php";
            break;
        case "giohang":
            require "pages/giohang.php";
            break;
        case "checkout":
            require "pages/checkout.php";
            break;
        case "profile":
            {
                if (!isset($_SESSION['ID_User'])) {
                    require "pages/login.php";
                } else require "pages/profile.php";
                break;
            }
        case "aboutus":
            require "pages/aboutus.php";
            break;
        case "order":
            {
                if (!isset($_SESSION['ID_User'])) {
                    require "pages/login.php";
                } else require "pages/order.php";
                break;
            }
        default:
            require "pages/homepage.php";
    }

    require "blocks/footer.php";
    ?>

</body>

</html> 