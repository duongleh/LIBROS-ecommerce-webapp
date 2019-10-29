<div class="container">
    <nav class="navbar navbar-expand-xl navbar-light">
        <!-- navbar-toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars" style="font-size:15px"></i>
        </button>
        <!-- logo -->
        <a class="nav-link" href="index.php">
            <img class="logo" src="assets/img/logo.png" alt="logo" width="115" height="46">
        </a>
        <!-- button shopping cart for mobile -->
        <div class="d-block d-xl-none">
            <a href="index.php?p=giohang">
                <button type="button" class="btn btn-outline-danger">
                    <i class="fas fa-shopping-cart"></i>
                </button>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <!-- block Books, About Us and Search bar -->
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item dropdown active" style="margin:0px 0px 0px 10px;">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <b>BOOKS</b>
                    </a>

                    <div class="dropdown-menu" style="width:470px" aria-labelledby="navbarDropdownMenuLink">
                        <div class="row">
                            <div class="col-xl">
                                <?php
                                $theloai = theLoaiSach();
                                $i = 0;
                                while ($row_theloai = mysqli_fetch_array($theloai)) {
                                    ?>
                                    <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=<?php echo $row_theloai['ID_Theloai'] ?>&page=1">
                                        <?php echo $row_theloai['Theloai'] ?></a>
                                <?php
                                    $i++;
                                    if ($i > 10) break;
                                }
                                ?>
                            </div>

                            <div class="col-xl">
                                <?php
                                while ($row_theloai = mysqli_fetch_array($theloai)) {
                                    ?>
                                    <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=<?php echo $row_theloai['ID_Theloai'] ?>&page=1">
                                        <?php echo $row_theloai['Theloai'] ?></a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item active" style="margin:0px 10px 0px 10px;">
                    <a class="nav-link" href="index.php?p=aboutus"><b>ABOUT US</b></a>
                </li>

                <!-- search bar on web -->
                <form class="form-inline d-flex flex-nowrap" name="Search" method="GET">
                    <input type="hidden" name="p" value="timkiem" required>
                    <div class="form-group">
                        <input class="form-control py-0 border-0 d-none d-xl-block" placeholder="Nhập tên sách..." name="search">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-danger border-0 d-none d-xl-block" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>

                <!-- search bar on mobile -->
                <form class="form-inline d-flex flex-nowrap" name="Search" method="GET">
                    <input type="hidden" name="p" value="timkiem" required>
                    <div class="form-group">
                        <input class="form-control py-0 border-danger d-block d-xl-none" placeholder="Nhập tên sách..." name="search">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-danger border-0 d-block d-xl-none" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>

            </ul>
            <!-- block Profile and Shopping cart -->
            <ul class="navbar-nav ml-auto">
                <?php
                if (isset($_SESSION['ID_User'])) { ?>

                    <!-- profile block if account loged in -->
                    <li class="nav-item d-flex align-items-center active">
                        <!-- profile icon on web -->
                        <div class="d-none d-xl-block">
                            <div class="dropdown">
                                <button type="button" class="btn btn-default dropdown-toggle d-flex align-items-center" data-toggle="dropdown" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-circle" style="font-size:30px;color:#dc3545;margin-right:5px"></i>
                                    <b><?php echo mb_substr($_SESSION['Hoten'], 0, 20); ?></b>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="index.php?p=order">Quản lý đơn hàng</a>
                                    <a class="dropdown-item" href="index.php?p=profile">Tài khoản của tôi</a>
                                    <div class="dropdown-divider"></div>

                                    <form name="Logout" class="dropdown-item" method="POST" action="controllers/logout.php">
                                        <button type="submit" name="btnLogout" class="btn btn-danger"><b>Đăng xuất</b>
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <!-- profile icon on mobile -->
                        <div class="d-block d-xl-none ">
                            <div class="dropdown-divider" style="margin-top:0px"></div>
                            <i class="fas fa-user-circle" style="color:#dc3545;margin-top:5px"></i>
                            <b><?php echo $_SESSION['Hoten']; ?></b>
                            <a class="nav-link active" href="index.php?p=order">Quản lý đơn hàng</a>
                            <a class="nav-link active" href="index.php?p=profile">Tài khoản của tôi</a>

                            <form name="Logout" method="POST" action="controllers/logout.php">
                                <button type="submit" name="btnLogout" class="btn btn-danger"><b>Đăng xuất</b>
                                </button>
                            </form>

                        </div>

                    </li>

                <?php
                } else { ?>

                    <!-- profile block if account not log in -->
                    <li class="nav-item d-flex align-items-center active">
                        <i class="fas fa-user-circle d-none d-xl-block" style="font-size:30px;color:#dc3545"></i>
                        <i class="fas fa-user-circle d-block d-xl-none" style="font-size:25px;color:#dc3545;margin-right:10px"></i>
                        <a class="nav-link" href="index.php?p=login"><b style="margin-right:10px">ĐĂNG NHẬP</b></a>
                    </li>
                <?php

                } ?>

                </li>
                <li class="nav-item d-flex align-items-center active">
                    <a href="index.php?p=giohang">
                        <button type="button" class="btn btn-danger d-none d-xl-block">
                            <i class="fas fa-shopping-cart" style="color:white"></i>
                            <b style="color:white">GIỎ HÀNG</b>
                        </button>
                    </a>
                </li>
            </ul>

        </div>

    </nav>
</div>