<?php
if (isset($_GET["search"])) {
    $Tukhoa = $_GET["search"];
    $numperpage = 12;
    $from = ($page - 1) * $numperpage;
    $phantrang = TimKiemSach($Tukhoa, $from, $numperpage);
    if (mysqli_num_rows($phantrang) == 0) { ?>
<a href="index.php?p=search">
    <div class="container" style="background-color:#be2a2b;color: white;padding: 14px 20px;text-align: center">
        <b>SEARCH</b>
    </div>
</a>
<br>
<div class="container" style="background-color:red;padding: 14px 20px;text-align: center;color:white">
    Không tìm thấy kết quả phù hợp. Xin vui lòng thử lại. !<br>
</div>

<br>
<?php

} else {
    ?>

<br>
<div class="container-fluid">
    <div class="row" style="margin-left: 20px;margin-right: 20px">
        <div class="col-12 col-sm-3">
            <div style="margin-left:10px">
                <?php
                $phanloaisach = PhanLoaiDanhMuc($Tukhoa);
                $sum_phanloaisach = 0;
                while ($row_phanloaisach = mysqli_fetch_array($phanloaisach)) {
                        $sum_phanloaisach += $row_phanloaisach['COUNT(sach.ID_Theloai)'];
                    }
                ?>
                <h3> DANH MỤC (<?php echo $sum_phanloaisach; ?> kết quả)</h3>
                <br>
                <?php
                mysqli_data_seek($phanloaisach, 0);
                while ($row_phanloaisach = mysqli_fetch_array($phanloaisach)) {
                    ?>
                <p>
                    <a href="index.php?p=danhmucsach&ID_TheLoai=<?php echo $row_phanloaisach['ID_Theloai'] ?>">
                        <?php echo $row_phanloaisach['Theloai']; ?> </a>
                    (<?php echo $row_phanloaisach['COUNT(sach.ID_Theloai)']; ?>)
                    <br>
                </p>
                <?php 
            } ?>
            </div>
        </div>

        <div class="col-12 col-sm-9">
            <div class="row">
                <?php
                while ($row_phantrang = mysqli_fetch_array($phantrang)) {
                    ?>
                <div class="col-4 col-xl-3 text-center" style="margin-top:30px">
                    <a href="index.php?p=product&ID_Sach=<?php echo $row_phantrang['ID_Sach'] ?>">
                        <img src="upload/images/<?php if ($row_phantrang['ID_Sach'] == null) {
                                                    echo "book_preview.png";
                                                } else {
                                                    echo $row_phantrang['Hinhanh'];
                                                } ?>" alt="book_preview" width="70" height="auto">
                        <h6 style="margin-top:10px"><?php echo $row_phantrang['Tensach'] ?></h6>
                    </a>
                    <b><?php echo number_format($row_phantrang['Giasach']) ?> đ</b>
                </div>
                <?php

            }
            ?>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-8 ml-auto" style="margin-right: 90px">
            <hr>
        </div>
    </div>
</div>
<br>

<!-- Pagination -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php
        $tongsach = Count_sach($Tukhoa);
        $row_tongsach = mysqli_fetch_array($tongsach);
        $tongpage = ceil($row_tongsach['COUNT(Tensach)'] / $numperpage);
        if ($page > 1 && $page <= $tongpage) { ?>
        <li class="page-item"><a class="page-link" href="index.php?p=timkiem&search=<?php echo $Tukhoa ?>&page=<?php echo $i = $page - 1 ?>">Previous</a>
        </li>
        <?php 
    } else { ?>
        <li class="page-item disabled"><a class="page-link" href="#">Previous</a>
        </li>
        <?php 
    }
    for ($i = 1; $i <= $tongpage; $i++) {
        if ($i == $page) { ?>
        <li class="page-item active"><a class="page-link" href="index.php?p=timkiem&search=<?php echo $Tukhoa ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
        </li>

        <?php 
    } else { ?>
        <li class="page-item"><a class="page-link" href="index.php?p=timkiem&search=<?php echo $Tukhoa ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
        </li>
        <?php 
    }
}

if ($page >= 1 && $page < $tongpage) { ?>
        <li class="page-item"><a class="page-link" href="index.php?p=timkiem&search=<?php echo $Tukhoa ?>&page=<?php echo $i = $page + 1 ?>">Next</a>
        </li>
        <?php 
    } else { ?>
        <li class="page-item disabled"><a class="page-link" href="#">Next</a>
        </li>
        <?php 
    } ?>
    </ul>
</nav>
<br>
<?php

}
}
?> 