<?php
if (isset($_POST["Checkoutbtn"])) {
    require "blocks/checkout_success.php";
} else {
    ?>

<div class="container">
    <div class="container" style="background-color:#be2a2b;color: white;padding: 14px 20px;text-align: center">
        <b>THANH TOÁN</b>
    </div>
    <br>
    <?php
    if ($_SESSION['indexs'] == 0) {
        ?>
    <div class="container" style="background-color:red;color:white;padding: 14px 20px;text-align: center">
        Giỏ hàng rỗng. Hãy tiếp tục mua sắm !
    </div>
    <?php

} else if (!isset($_SESSION["ID_User"])) { ?>
    <div class="container" style="background-color:red;color:white;padding: 14px 20px;text-align: center">
        Qúy khách chưa đăng nhập. Hãy <a href="index.php?p=login">đăng nhập</a> để tiếp tục thanh toán !
    </div>
    <?php

} else {
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <br><b style="font-size: 20px">THÔNG TIN KHÁCH HÀNG</b>
                <?php
                $user = check_username($_SESSION['Username']);
                $row_user = mysqli_fetch_array($user);
                echo "<br><b>Tên: </b> ";
                echo $row_user['Hoten'];
                echo "<br><b>Địa chỉ: </b>";
                echo $row_user['Diachi'];
                echo "<br><b>Số điện thoại:   </b>";
                echo $row_user['SDT'];
                ?>
                <br>
                <br>
                <div class="row">
                    <div class="col-10 mx-auto">
                        <hr>
                    </div>
                </div>
                <br>
                <?php
                if (isset($_POST["Shipbtn"])) {
                    if ($_POST['ship'] == 2) {
                        $_SESSION['ship'] = 30000;
                        ?>
                <form name="ship" method="POST">
                    <b style="font-size: 20px">CHỌN HÌNH THỨC GIAO HÀNG</b>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ship" id="ship1" value="1">
                        <label class="form-check-label" for="ship1">
                            Giao hàng tiêu chuẩn: miễn phí
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ship" id="ship2" value="2" checked>
                        <label class="form-check-label" for="ship2">
                            Giao hàng nhanh: 30,000 đ
                        </label>
                    </div>
                    <button type="submit" name="Shipbtn" class="confirmbtn">CẬP NHẬT</button>
                </form>
                <div class="row">
                    <div class="col-10 mx-auto">
                        <hr>
                    </div>
                </div>
                <br>

                <?php

            } else {
                $_SESSION['ship'] = 0;
                ?>
                <form name="ship" method="POST">
                    <b style="font-size: 20px">CHỌN HÌNH THỨC GIAO HÀNG</b>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ship" id="ship1" value="1" checked>
                        <label class="form-check-label" for="ship1">
                            Giao hàng tiêu chuẩn: miễn phí
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ship" id="ship2" value="2">
                        <label class="form-check-label" for="ship2">
                            Giao hàng nhanh: 30,000 đ
                        </label>
                    </div>
                    <button type="submit" name="Shipbtn" class="confirmbtn">CẬP NHẬT</button>
                </form>
                <?php

            }
        } else {
            $_SESSION['ship'] = 0;
            ?>
                <form name="ship" method="POST">
                    <b style="font-size: 20px">CHỌN HÌNH THỨC GIAO HÀNG</b>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ship" id="ship1" value="1" checked>
                        <label class="form-check-label" for="ship1">
                            Giao hàng tiêu chuẩn: miễn phí
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ship" id="ship2" value="2">
                        <label class="form-check-label" for="ship2">
                            Giao hàng nhanh: 30,000 đ
                        </label>
                    </div>
                    <button type="submit" name="Shipbtn" class="confirmbtn">CẬP NHẬT</button>
                </form>
                <?php

            }
            ?>


                <div class="row">
                    <div class="col-10 mx-auto">
                        <hr>
                    </div>
                </div>
                <br>
                <form name="money" method="POST">
                    <b style="font-size: 20px">CHỌN HÌNH THỨC THANH TOÁN</b>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="money" id="money1" value="1" checked>
                        <label class="form-check-label" for="money1">
                            Thanh toán tiền mặt khi nhận hàng
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="money" id="money2" value="2" disabled>
                        <label class="form-check-label" for="ship2">
                            Thanh toán bằng thẻ ATM nội địa/Internet Banking
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="money" id="money3" value="3" disabled>
                        <label class="form-check-label" for="ship2">
                            Thanh toán bằng thẻ quốc tế Visa, Master
                        </label>
                    </div>
                    <!--<button type="submit" name="Moneybtn" class="confirmbtn">CẬP NHẬT</button>-->
                </form>

                <div class="row">
                    <div class="col-10 mx-auto">
                        <hr>
                    </div>
                </div>
                <br>

            </div>

            <div class="col">
                <br>
                <div class="row">
                    <b style="font-size: 20px">ĐƠN HÀNG</b><br>
                </div>
                <?php
                $tongtien = 0;
                for ($i = 1; $i <= $_SESSION['indexs']; $i++) {
                    $cartItem = SanPhamSach(($_SESSION['cart'][$i][0]));
                    $row_cartItem = mysqli_fetch_array($cartItem);
                    $tongtien += $_SESSION['cart'][$i][2];
                    ?>
                <div class="row">
                    <div class="col">
                        <br><br><b><?php echo $_SESSION['cart'][$i][1] ?></b> x <?php echo $row_cartItem['Tensach'] ?>

                    </div>
                    <div class="col">
                        <br><br><b><?php echo number_format($_SESSION['cart'][$i][2]); ?> đ</b>
                    </div>
                </div>
                <?php

            }
            $_SESSION['total'] = $tongtien;
            ?>
                <br>
                <div class="row">
                    <div class="col mx-auto">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <b>TẠM TÍNH:</b>

                    </div>
                    <div class="col">
                        <b><?php echo number_format($_SESSION['total']); ?> đ</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <b>PHÍ VẬN CHUYỂN:</b>

                    </div>
                    <div class="col">
                        <b><?php echo number_format($_SESSION['ship']); ?> đ</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col mx-auto">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <b>THÀNH TIỀN:</b>
                    </div>
                    <div class="col">
                        <b><?php echo number_format($_SESSION['total'] + $_SESSION['ship']); ?> đ</b>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="justify-content: center">
            <form name="checkout" method="POST">
                <button type="submit" name="Checkoutbtn" class="checkoutbtn"><b>ĐẶT MUA</b></button>
            </form>
        </div>
        <br>
    </div>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" style="width:100%"></div>
    </div>
</div>
<?php

}
}
?> 