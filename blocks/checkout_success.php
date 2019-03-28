<?php
$con = myConnect();
$CO_ID_User = $_SESSION['ID_User'];
$CO_tinhtrang = "Đang xử lý";
$CO_today = date("Ymd");
$CO_diachi = $_SESSION['Diachi'];
$CO_ship = $_SESSION['ship'];
$CO_total = $_SESSION['total'] + $_SESSION['ship'];

$qr = "
INSERT INTO donhang(`ID_User`,`Tinhtrang`,`Thoigian`,`Diachi`,`Shipping`,`Tongtien`) VALUES
($CO_ID_User,'$CO_tinhtrang',$CO_today,'$CO_diachi',$CO_ship,$CO_total);
";
$result = mysqli_query($con, $qr);

if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

$CO_ID_Donhang = mysqli_insert_id($con);

for ($i = 1; $i <= $_SESSION['indexs']; $i++) {
    $CO_ID_Sach = $_SESSION['cart'][$i][0];
    $CO_Soluong = $_SESSION['cart'][$i][1];
    $CO_price =  $_SESSION['cart'][$i][2];
    $qr2 = "
	INSERT INTO chitietdonhang(`ID_Donhang`,`ID_Sach`,`Soluong`,`Tongtien`) VALUES
($CO_ID_Donhang,$CO_ID_Sach,$CO_Soluong,$CO_price);
	";
    $result2 = mysqli_query($con, $qr2);
}
if (!$result2) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

// for ($i = 1; $i <= $_SESSION['indexs']; $i++) {
//         UpdateSoLuong($_SESSION['cart'][$i][0], $_SESSION['cart'][$i][1]);
//     }

if ($result == true && $result2 == true) {
    ?>
<div class="container" style="text-align: center">
    <i class="fas fa-check-circle" style="color: yellowgreen;font-size: 170px"></i>
</div>
<br>
<div class="container" style="background-color:yellowgreen;padding: 14px 20px;text-align: center;color:white">
    <b>Đặt hàng THÀNH CÔNG. Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi !</b>
</div>
<?php
unset($_SESSION['cart']);
unset($_SESSION['indexs']);
unset($_SESSION['ship']);
unset($_SESSION['total']);
} else { ?>
<div class="container" style="background-color:red;padding: 7px 105px;text-align: center;color:white">
    Đặt hàng <b>THẤT BẠI</b>. Xin hãy thử lại !
</div>
<?php

}
?> 