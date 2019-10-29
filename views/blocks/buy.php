<?php
$checkSLT = CheckSLTon($row_sp['ID_Sach']);
$row_checkSLT = mysqli_fetch_array($checkSLT);
if ($row_checkSLT['SLTon'] != 0) {
    ?>
    <div class="container" style="margin-top:25px">
        <div class="btn btn-success">CÒN HÀNG</div>
        <br>
        <form name="Buy" method="POST">
            <div class="container">
                <input type="hidden" name="item" value="<?php echo $row_sp['ID_Sach'] ?>" required>
                <input style="width: 80px" type="number" placeholder="" name="num" min="1" value="1" required>
                <button type="submit" name="btnBuy" class="btn bg-info text-white"><i class="fas fa-cart-plus"></i>
                    Thêm vào giỏ hàng
                </button>
            </div>
        </form>
    </div>

<?php

} else if ($row_checkSLT['SLTon'] == 0) {
    ?>
    <div class="container" style="margin-top:25px">
        <div class="btn btn-danger">HẾT HÀNG</div>
        <br>
        <br>

        <div class="container">
            <button type="submit" name="" class="btn btn-dark">
                <i class="fas fa-bell" style="margin-right: 10px"></i>
                Nhận thông báo
            </button>
        </div>

    </div>
<?php

}
?>
<br>