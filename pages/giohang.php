<div class="container">
    <div class="container" style="background-color:#be2a2b;color: white;padding: 14px 20px;text-align: center">
        <b>GIỎ HÀNG</b>
    </div>
    <br>

    <?php
    if (!isset($_SESSION['cart']) || $_SESSION['indexs'] == 0) { ?>
        <div class="container" style="background-color:yellowgreen;padding: 14px 20px;text-align: center;color:white">
            <b>Giỏ hàng rỗng. Hãy tiếp tục mua sắm !</b><br>
        </div>
    <?php

} else if (isset($_SESSION['cart']) && $_SESSION['indexs'] > 0) {
    ?>
        <div class="table-responsive-xl table-hover">
            <table class="table text-nowrap ">
                <thead class="thead-dark table-bordered">
                    <tr>
                        <th scope="col" style="text-align: center;">HÌNH ẢNH</th>
                        <th scope="col" style="text-align: center;">SẢN PHẨM</th>
                        <th scope="col" style="text-align: center;">ĐƠN GIÁ</th>
                        <th scope="col" style="text-align: center;">SỐ LƯỢNG</th>
                        <th scope="col" style="text-align: center;">THÀNH TIỀN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tongtien = 0;
                    for ($i = 1; $i <= $_SESSION['indexs']; $i++) {
                        $cartItem = SanPhamSach(($_SESSION['cart'][$i][0]));
                        $row_cartItem = mysqli_fetch_array($cartItem);
                        $tongtien += $_SESSION['cart'][$i][2];
                        ?>
                        <tr>
                            <td scope="col" style="text-align: center;">
                                <img src="upload/images/<?php if ($row_cartItem['Hinhanh'] == null) {
                                                            echo "book_preview.png";
                                                        } else {
                                                            echo $row_cartItem['Hinhanh'];
                                                        } ?>" alt="book_preview" width="auto" height="150">
                            </td>

                            <td scope="col" style="text-align: center;">
                                <a href="index.php?p=product&ID_Sach=<?php echo $row_cartItem['ID_Sach'] ?>">
                                    <p style="font-size: 20px"><?php echo $row_cartItem['Tensach']; ?></p>
                                </a>
                            </td>

                            <td scope="col" style="text-align: center;"><?php echo number_format($row_cartItem['Giasach']); ?> đ</td>
                            <td scope="col" style="text-align: center;"><?php echo $_SESSION['cart'][$i][1]; ?></td>
                            <td scope="col" style="text-align: center;"><?php echo number_format($_SESSION['cart'][$i][2]); ?> đ</td>
                        </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
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

    <?php

}
?>
</div>