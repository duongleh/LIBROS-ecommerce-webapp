<div class="container-fluid">
    <div class="row">
        <div class="col-10 mx-auto" style="margin-top: 10px">
            <hr>
        </div>
    </div>
</div>
<br>

<div class="container">
    <div class="container" style="background-color:#be2a2b;color: white;padding: 14px 20px;text-align: center">
        <b>QUẢN LÝ ĐƠN HÀNG</b>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-6 col-sm-2 text-center">
            <p style="font-size: 20px"><b>MÃ ĐƠN HÀNG</b></p>
        </div>
        <div class="col-6 col-sm-4 text-center">
            <p style="font-size: 20px"><b>SẢN PHẨM</b></p>
        </div>
        <div class="col-4 col-sm-2 text-center">
            <p style="font-size: 20px"><b>NGÀY MUA</b></p>
        </div>
        <div class="col-4 col-sm-2 text-center">
            <p style="font-size: 20px"><b>TỔNG TIỀN</b></p>
        </div>
        <div class="col-4 col-sm-2 text-center">
            <p style="font-size: 20px"><b>TÌNH TRẠNG</b></p>
        </div>
    </div>

    <div class="row">
        <div class="col-10 mx-auto">
            <hr>
            <br>
        </div>
    </div>
    <?php
    $order = GetOrderInfo($_SESSION['ID_User']);
    while ($row_order = mysqli_fetch_array($order)) {
        ?>
    <div class="row">
        <div class="col-6 col-sm-2 text-center">
            <p style="font-size: 20px"><?php echo $row_order['ID_Donhang']; ?></p>
        </div>
        <div class="col-6 col-sm-4 text-center">
            <p style="font-size: 20px">
                <?php
                $listOrder = GetOrderDetail($row_order['ID_Donhang']);
                while ($row_listOrder = mysqli_fetch_array($listOrder)) {
                    echo $row_listOrder['Tensach'] . "<br>";
                }
                ?>
            </p>
        </div>
        <div class="col-4 col-sm-2 text-center">
            <p style="font-size: 20px"><?php echo $row_order['Thoigian']; ?></p>
        </div>
        <div class="col-4 col-sm-2 text-center">
            <p style="font-size: 20px"><?php echo number_format($row_order['Tongtien']); ?> đ</p>
        </div>
        <div class="col-4 col-sm-2 text-center">
            <p style="font-size: 20px"><?php echo $row_order['Tinhtrang']; ?></p>
        </div>
    </div>
    <?php

}
?> 