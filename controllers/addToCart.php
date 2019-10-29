<?php
session_start();

require "function.php";
require "dbCon.php";

if (!isset($_SESSION['cart'])) {
    $_SESSION['indexs'] = 0;
    $shop = array(
        array("0", "0", "0")
    );
    $_SESSION['cart'] = $shop;
}

if (isset($_POST["btnAddToCart"])) {
    $_SESSION['indexs'] += 1;
    $shopitem =  $_POST["id"];
    $shopnum =  $_POST["num"];
    $shopprice = SanPhamSach($shopitem);
    $row_shopprice = mysqli_fetch_array($shopprice);
    $itemTotalPrice =   $row_shopprice["Giasach"] * $shopnum;
    array_push($_SESSION['cart'], array("$shopitem", "$shopnum", "$itemTotalPrice"));
}
header("Location: ../index.php?p=product&ID_Sach=" . $_POST["id"]);
exit();
