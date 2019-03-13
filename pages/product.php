<!-- hr -->
<div class="container-fluid">
    <div class="row">
        <div class="col-10 mx-auto" style="margin-top: 10px">
            <hr>
        </div>
    </div>
</div>
<br>
<br>
<!-- Content -->
<?php
$sp = SanPhamSach($IDS);
$row_sp = mysqli_fetch_array($sp);
?>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-6 text-center" style="margin-top: 40px;margin-bottom: 40px">
            <img src="upload/sach/images/<?php if ($row_sp['ID_Sach'] <= 273) {
                                                echo $row_sp['Hinhanh'];
                                            } else {
                                                echo "new/";
                                                echo $row_sp['Hinhanh'];
                                            } ?>" alt="book_preview" width="280" height="auto">
        </div>
        <div class="col-12 col-sm-6 text-center">

            <h1 class="product_title"><?php echo $row_sp['Tensach'] ?></h1>
            <b class="price" style="font-size: 35px"><?php echo number_format($row_sp['Giasach']) ?> đ</b>
            <?php require "blocks/buy.php" ?>
            <p class="author" style="font-size: 20px"><b>Tác giả:</b> <?php echo $row_sp['Tacgia'] ?></p>
            <p class="NXB" style="font-size: 20px"><b>Năm xuất bản:</b> <?php echo $row_sp['NamXB'] ?></p>
            <p class="Date" style="font-size: 20px"><b>Nhà xuất bản:</b>
                <?php
                $nxb = GetNXB($row_sp['ID_NXB']);
                $row_nxb = mysqli_fetch_array($nxb);

                echo $row_nxb['Ten_NXB'];
                ?>
            </p>

        </div>
    </div>
</div>
<br>

<!-- hr -->
<div class="container-fluid">
    <div class="row">
        <div class="col-10 mx-auto" style="margin-top: 20px">
            <hr>
        </div>
    </div>
</div>
<br>
<br>

<!-- Lien Quan -->
<div class="container">
    <div class="row ">
        <div class="col-12 text-center">
            <h4 style="margin-bottom: 40px">SẢN PHẨM LIÊN QUAN</h4>
        </div>
    </div>

    <div class="row">
        <?php
        $splq = SPlienquan($row_sp['ID_Theloai'], $row_sp['ID_Sach']);
        while ($row_splq = mysqli_fetch_array($splq)) {
            ?>
        <div class="col-6 col-xl-3 text-center">
            <a href="index.php?p=product&ID_Sach=<?php echo $row_splq['ID_Sach'] ?>">
                <img src="upload/sach/images/<?php if ($row_splq['ID_Sach'] <= 273) {
                                                    echo $row_splq['Hinhanh'];
                                                } else {
                                                    echo "new/";
                                                    echo $row_splq['Hinhanh'];
                                                } ?>" alt="book_preview" width="auto" height="110">
                <h6 style="margin-top:10px"><?php echo $row_splq['Tensach'] ?></h6>
            </a>
            <b><?php echo number_format($row_splq['Giasach']) ?> đ</b>
        </div>
        <?php 
    } ?>
    </div>
</div>

<br> 