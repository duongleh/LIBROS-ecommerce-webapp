<?php
require("views/blocks/slider.php")
?>

<h3 id="homepage"><b>SÁCH BÁN CHẠY</b></h3>

<div class="container">
    <div class="row">
        <?php
        $sachBanChay = sachBanChay();
        while ($row_sachBanChay = mysqli_fetch_array($sachBanChay)) {
            ?>
            <div class="col-4 col-xl-2 text-center">
                <a href="index.php?p=product&ID_Sach=<?php echo $row_sachBanChay['ID_Sach'] ?>">
                    <img src="assets/upload/<?php echo ($row_sachBanChay['Hinhanh']) ? $row_sachBanChay['Hinhanh'] : "book_preview.png"; ?>" alt="book_preview" width="auto" height="150">
                    <p style="margin-top:10px"><?php echo $row_sachBanChay['Tensach'] ?></p>
                </a>
                <b><?php echo number_format($row_sachBanChay['Giasach']) ?> đ</b>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<h3 id="homepage"><b>SÁCH MỚI NHẤT</b></h3>

<div class="swiper-container">
    <div class="swiper-wrapper">
        <?php
        $IDTL = "NNLTJ";
        $sachMoiNhat = sachMoiNhat();
        while ($row_sachMoiNhat = mysqli_fetch_array($sachMoiNhat)) {
            ?>
            <div class="swiper-slide">
                <a href="index.php?p=product&ID_Sach=<?php echo $row_sachMoiNhat['ID_Sach'] ?>">
                    <img src="assets/upload/<?php echo ($row_sachMoiNhat['Hinhanh']) ? $row_sachMoiNhat['Hinhanh'] : "book_preview.png"; ?>" alt="book" width="auto" height="150">
                    <p style="margin-top:15px"><?php echo $row_sachMoiNhat['Tensach'] ?></p>
                    <b><?php echo number_format($row_sachMoiNhat['Giasach']) ?> đ</b>
                </a>
            </div>
        <?php
        }
        ?>
    </div>
    <!-- <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div> -->
    <!-- Add Pagination -->
    <!-- <div class="swiper-pagination"></div> -->
</div>



<!-- Swiper JS -->
<script src="assets/js/swiper.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 7,
        spaceBetween: 10,
        // pagination: {
        //     el: '.swiper-pagination',
        //     clickable: true,
        // },
        // navigation: {
        //     nextEl: '.swiper-button-next',
        //     prevEl: '.swiper-button-prev',
        // },
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        breakpoints: {
            1024: {
                slidesPerView: 5,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 10,
            }
        }

    });
</script>