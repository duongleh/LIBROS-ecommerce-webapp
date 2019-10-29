<div class="container">
    <div class="container" style="background-color:#be2a2b;color: white;padding: 14px 20px;text-align: center">
        <b>QUẢN LÝ ĐƠN HÀNG</b>
    </div>
    <br>
    <div class="table-responsive-xl table-hover">
        <table class="table text-nowrap ">
            <thead class="thead-dark table-bordered">
                <tr>
                    <th scope="col" style="text-align: center;">MÃ ĐƠN HÀNG</th>
                    <th scope="col" style="text-align: center;">SẢN PHẨM</th>
                    <th scope="col" style="text-align: center;">NGÀY MUA</th>
                    <th scope="col" style="text-align: center;">TỔNG TIỀN</th>
                    <th scope="col" style="text-align: center;">TÌNH TRẠNG</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $order = GetOrderInfo($_SESSION['ID_User']);
                while ($row_order = mysqli_fetch_array($order)) {
                    ?>
                    <tr>
                        <td scope="col" style="text-align: center;"><?php echo $row_order['ID_Donhang']; ?></td>
                        <td scope="col">
                            <?php
                                $listOrder = GetOrderDetail($row_order['ID_Donhang']);
                                while ($row_listOrder = mysqli_fetch_array($listOrder)) {
                                    echo $row_listOrder['Soluong'] . " <strong>x</strong> ";
                                    echo $row_listOrder['Tensach'] . "<br>";
                                }
                                ?>
                        </td>
                        <td scope="col" style="text-align: center;"><?php echo $row_order['Thoigian']; ?></td>
                        <td scope="col" style="text-align: center;"><?php echo number_format($row_order['Tongtien']); ?> đ</td>
                        <td scope="col" style="text-align: center;"><?php echo $row_order['Tinhtrang']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>