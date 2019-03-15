<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars" style="font-size:15px"></i>
        </button>


        <a class="nav-link" href="index.php">
            <img class="logo" src="img/logo.png" alt="logo" width="115" height="46">
        </a>


        <div class="d-block d-sm-none">
            <?php
            if (!isset($_SESSION['cart']) || $_SESSION['indexs'] == 0) {
                ?>
            <a href="index.php?p=giohang"><i class="fas fa-shopping-cart" style="font-size:18px"></i></a>
            <?php

        } else { ?>
            <a href="index.php?p=giohang"><i class="fas fa-shopping-cart" style="color:red;font-size:18px"></i></a>
            <?php

        }
        ?>
        </div>

        <div class="collapse navbar-collapse" id="navbarNavDropdown" style="margin-top: 5px">
            <ul class="nav navbar-nav mx-auto mr-5" style="margin-bottom: 10px">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php"><b style="font-size: 22px;margin-right: 25px">HOME</b><span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active dropdown">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <b style="font-size: 22px;margin-right: 25px">BOOK</b><span class="sr-only">(current)</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=THCS&page=1">Tin học cơ sở</a>
                        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=Hardware&page=1">Hardware</a>
                        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=Software&page=1">Software</a>
                        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=TT&page=1">Thuật Toán</a>
                        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=TCTH&page=1">Toán cho tin học</a>
                        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=CTD&page=1">Chương trình dịch</a>
                        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=LTCS&page=1">Lập trình cơ sở</a>
                        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=NNLTC&page=1">Ngôn ngữ lập trình C/C++/C#</a>
                        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=NNLTJ&page=1">Ngôn ngữ lập trình Java</a>
                        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=LTUD&page=1">Lập trình ứng dụng</a>
                        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=CSDL&page=1">Cơ sở dữ liệu</a>
                        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=QTHT&page=1">Quản trị hệ thống</a>
                        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=W&page=1">Web</a>
                        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=M&page=1">Mạng</a>
                        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=AI&page=1">AI</a>
                        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=B&page=1">Blockchain</a>
                        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=BM&page=1">Bảo mật</a>
                        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=DH&page=1">Đồ họa</a>
                        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=UD&page=1">Ứng dụng</a>

                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#"><b style="font-size: 22px;margin-right: 25px">ACCESSORY</b><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?p=aboutus"><b style="font-size: 22px;margin-right: 25px">ABOUT US</b><span class="sr-only">(current)</span></a>
                </li>

            </ul>

            <div class="mr-sm-2 d-none d-sm-block">
                <?php
                if (isset($_SESSION['ID_User'])) { ?>
                <a href="index.php?p=profile"><i class="fas fa-user" style="color:red"></i></a>
                <?php 
            } else { ?>
                <a href="index.php?p=login"><i class="fas fa-sign-in-alt" style="color:red;font-size: 20px"></i></a>
                <?php 
            } ?>

                <a href="index.php?p=search"><i class="fas fa-search" style="margin-left: 10px;"></i></a>

                <?php
                if (!isset($_SESSION['cart']) || $_SESSION['indexs'] == 0) {
                    ?>
                <a href="index.php?p=giohang"><i class="fas fa-shopping-cart" style="margin-left: 10px;"></i></a>
                <?php

            } else { ?>
                <a href="index.php?p=giohang"><i class="fas fa-shopping-cart" style="margin-left: 10px;color:red"></i></a>
                <?php

            }
            if (isset($_SESSION['ID_User']))
            {
                ?>
      <form name="Logout" method="POST" style="display: inline-block">
            <button type="submit" name="btnLogout" class="logoutbtn"><i class="fas fa-sign-out-alt"></i></button>
        </form>
            <?php
                  }
            ?>
            </div>
        </div>

    </nav>
</div> 