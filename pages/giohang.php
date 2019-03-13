<!-- hr -->
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
        <b>GIỎ HÀNG</b>
    </div>
    <br>

    <?php
    if (!isset($_SESSION['cart']) || $_SESSION['indexs'] == 0) { ?>
    <div class="container" style="background-color:red;padding: 14px 20px;text-align: center;color:white">
        Giỏ hàng rỗng. Hãy tiếp tục mua sắm !<br>
    </div>
    <?php

} else if (isset($_SESSION['cart']) && $_SESSION['indexs'] > 0) {
    ?>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 col-sm-2 text-center">
                <p style="font-size: 20px"><b>HÌNH ẢNH</b></p>
            </div>
            <div class="col-6 col-sm-4 text-center">
                <p style="font-size: 20px"><b>SẢN PHẨM</b></p>
            </div>
            <div class="col-4 col-sm-2 text-center">
                <p style="font-size: 20px"><b>ĐƠN GIÁ</b></p>
            </div>
            <div class="col-4 col-sm-2 text-center">
                <p style="font-size: 20px"><b>SỐ LƯỢNG</b></p>
            </div>
            <div class="col-4 col-sm-2 text-center">
                <p style="font-size: 20px"><b>THÀNH TIỀN</b></p>
            </div>
        </div>
        <div class="row">
            <div class="col-10 mx-auto">
                <hr>
            </div>
        </div>
        <br>

        <?php
        $tongtien = 0;
        for ($i = 1; $i <= $_SESSION['indexs']; $i++) {
            $sach1 = GetSach($_SESSION['cart'][$i][0]);
            $row_sachh1 = mysqli_fetch_array($sach1);
            $tongtien += $_SESSION['cart'][$i][1] * $row_sachh1['Giasach'];
            ?>

        <div class="row justify-content-center">
            <div class="col-6 col-sm-2 text-center">
                <img src="upload/images/<?php if ($row_sachh1['ID_Sach'] <= 273) {
                                                    echo $row_sachh1['Hinhanh'];
                                                } else {
                                                    echo "new/";
                                                    echo $row_sachh1['Hinhanh'];
                                                } ?>" alt="book_preview" width="auto" height="150">
            </div>
            <div class="col-6 col-sm-4 text-center align-self-center">
                <a href="index.php?p=product&ID_Sach=<?php echo $row_sachh1['ID_Sach'] ?>">
                    <p style="font-size: 20px"><?php echo $row_sachh1['Tensach']; ?></p>
                </a>
            </div>
            <div class="col-4 col-sm-2 text-center align-self-center">
                <p style="font-size: 20px"><?php echo number_format($row_sachh1['Giasach']); ?> đ</p>
            </div>
            <div class="col-4 col-sm-2 text-center align-self-center">
                <p style="font-size: 20px"><?php echo $_SESSION['cart'][$i][1]; ?></p>
            </div>
            <div class="col-4 col-sm-2 text-center align-self-center">
                <p style="font-size: 20px"><?php echo number_format($_SESSION['cart'][$i][1] * $row_sachh1['Giasach']); ?> đ</p>
            </div>
        </div>
        <div class="row">
            <div class="col-10 mx-auto" style="margin-top: 10px">
                <hr>
            </div>
        </div>
        <br>
        <?php

    }
    ?>
    </div>
    <div class="container" style="background-color:#f1f1f1;padding: 30px 20px;text-align: center">
        <div class="row">
            <div class="col-6" style="text-align: center">
                <b style="font-size: 25px">TỔNG CỘNG:</b>
            </div>
            <div class="col-6" style="text-align: center">
                <b style="font-size: 25px"><?php echo number_format($tongtien); ?> đ</b>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col" style="text-align: start">
                <form name="cancel" method="POST">
                    <button type="submit" name="btnCancel" class="btn btn-danger"><i class="fas fa-chevron-left" style="margin-right: 10px"></i>Hủy giỏ hàng</button>
                </form>
            </div>
            <div class="col" style="text-align: end">
                <a href="index.php?p=checkout">
                    <button type="submit" name="btnPay" class="btn btn-success">Thanh toán giỏ hàng<i class="fas fa-chevron-right" style="margin-left: 10px"></i></button>
                </a>
            </div>
        </div>
    </div>
</div>

<?php

}
?>
</div> 