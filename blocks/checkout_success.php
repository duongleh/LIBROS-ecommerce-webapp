
<?php
$CO_ID_Sach = "";
$CO_Soluong = "";
for ($i = 1; $i <= $_SESSION['indexs']; $i++)
{
    $CO_ID_Sach = $CO_ID_Sach.$_SESSION['cart'][$i][0].",";
    $CO_Soluong = $CO_Soluong.$_SESSION['cart'][$i][1].",";

}
$CO_ID_User = $_SESSION['ID_User'];
$CO_Tinhtrang = "Đang xử lý";
$CO_today = date("Ymd");
$CO_ship = $_SESSION['ship'];
$CO_total = $_SESSION['total']+$_SESSION['ship'];

$con = myConnect();
$qr = "
	INSERT INTO donhang(`ID_User`,`ID_Sach`,`Soluong`,`Tinhtrang`,`Thoigian`,`Shipping`,`Tongtien`) VALUES
($CO_ID_User,'$CO_ID_Sach','$CO_Soluong','$CO_Tinhtrang',$CO_today,$CO_ship,$CO_total);
	";
$result = mysqli_query($con, $qr);
for ($i = 1; $i <= $_SESSION['indexs']; $i++)
{
    UpdateSoLuong($_SESSION['cart'][$i][0],$_SESSION['cart'][$i][1]);
}

if ($result == TRUE)
{
?>
    <div class="container" style="text-align: center">
        <i class="fas fa-check-circle" style="color: green;font-size: 170px"></i>
    </div>
    <br>
    <div class="container" style="background-color:green;padding: 7px 105px;text-align: center;color:white">
        Đặt hàng <b>THÀNH CÔNG</b>. Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi !
    </div>
    <?php
    unset($_SESSION['cart']);
    unset($_SESSION['indexs']);
    unset($_SESSION['ship']);
    unset($_SESSION['total']);
}
else if ($result == FALSE)
{?>
    <div class="container" style="background-color:green;padding: 7px 105px;text-align: center;color:white">
        Đặt hàng <b>THẤT BẠI</b>. Xin hãy thử lại !
    </div>
    <?php
}
?>


