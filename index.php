<?php
session_start();
require "controllers/dbCon.php";
require "controllers/function.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LIBROS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/layout.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/slider.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/swiper.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/swiper.min.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,700,900&amp;subset=vietnamese" rel="stylesheet">
</head>

<body>
    <?php
    if (isset($_GET["p"])) $p = $_GET["p"];
    else $p = "";
    if (isset($_GET["ID_TheLoai"])) $IDTL = $_GET["ID_TheLoai"];
    else $IDTL = "";
    if (isset($_GET["ID_Sach"])) $IDS = $_GET["ID_Sach"];
    else $IDS = "";
    if (isset($_GET["page"])) $page = $_GET["page"];
    else $page = 1;

    require "views/blocks/header.php";

    $arr = array("danhmucsach", "product", "signup", "timkiem", "cart", "checkout", "profile", "aboutus", "order");
    foreach ($arr as &$value) {
        if ($p == $value) require "views/blocks/hr.php";
    }

    switch ($p) {
        case "danhmucsach":
            require "views/pages/danhmucsach.php";
            break;
        case "product":
            require "views/pages/product.php";
            break;
        case "login": {
                if (!isset($_SESSION['ID_User'])) {
                    require "views/pages/login.php";
                } else {
                    require "views/pages/homepage.php";
                }
                break;
            }
        case "signup": {
                if (!isset($_SESSION['ID_User'])) {
                    if (isset($_POST["btnSignup"]) && ($register == true)) {
                        require "views/blocks/signupsuccess.php";
                    } else {
                        require "views/pages/signup.php";
                    }
                } else {
                    require "views/pages/homepage.php";
                }
                break;
            }
        case "timkiem":
            require "views/pages/timkiem.php";
            break;
        case "cart":
            require "views/pages/cart.php";
            break;
        case "checkout":
            require "views/pages/checkout.php";
            break;
        case "profile": {
                if (!isset($_SESSION['ID_User'])) {
                    require "views/pages/login.php";
                } else require "views/pages/profile.php";
                break;
            }
        case "aboutus":
            require "views/pages/aboutus.php";
            break;
        case "order": {
                if (!isset($_SESSION['ID_User'])) {
                    require "views/pages/login.php";
                } else require "views/pages/order.php";
                break;
            }
        default:
            require "views/pages/homepage.php";
    }

    require "views/blocks/footer.php";
    ?>

</body>

</html>