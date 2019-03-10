<!-- Icon bar -->
<div class="d-flex">
<div class="ml-auto" style="margin-right: 20px;margin-top: -20px;margin-bottom: 20px;font-size: 20px">
<div>
    <?php
    if (!isset($_SESSION['ID_User']))
        { ?>
    <a href="index.php?p=login"><i class="fas fa-user" style="color:red"></i></a>
    <?php }
    else
        {
        require "blocks/formWelcome.php";
        }
    ?>
	<i class="fas fa-search" style="margin-left: 10px"></i>
	<i class="fas fa-shopping-cart" style="margin-left: 10px"></i>
</div>
</div>
</div>

  <!--  Logo -->
<div class="text-center" style="margin-bottom: 15px">
	<a href="index.php">
		<img src="img/logo.png" alt="logo" width="190" height="80">
	</a>
</div


<!-- Nav Bar -->
<nav class="navbar navbar-expand-xl navbar-light">
  <!-- Collapes Menu -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContentXL" aria-controls="navbarSupportedContentXL" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars" style="font-size:15px"></i>
 </button>

 <!-- Nav Bar Items -->
		
<div class="collapse navbar-collapse" id="navbarSupportedContentXL">
 
  <ul class="navbar-nav mx-auto">
  
    <li class="nav-item active px-lg-4">
      <a class="nav-link text-uppercase text-expanded" href="index.php?p=danhmucsach&ID_TheLoai=Hardware&page=1"><b>HARDWARE</b></a>
    </li>
    <li class="nav-item active px-lg-4">
      <a class="nav-link text-uppercase text-expanded" href="index.php?p=danhmucsach&ID_TheLoai=Software&page=1"><b>SOFTWARE</b></a>
    </li>
    <li class="nav-item active px-lg-4">
      <a class="nav-link text-uppercase text-expanded" href="index.php?p=danhmucsach&ID_TheLoai=TT&page=1"><b>THUẬT TOÁN</b></a>
    </li>
      <!-- Dropdown -->
     <li class="nav-item text-uppercase dropdown active px-lg-4">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
       <b>NGÔN NGỮ LẬP TRÌNH</b>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=NNLTC&page=1">C/C++/C#</a>
        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=QTHT&page=1">PHP &amp MySQL</a>
        <a class="dropdown-item" href="index.php?p=danhmucsach&ID_TheLoai=NNLTJ&page=1">JAVA</a>
      </div>
    </li>
    
    <li class="nav-item active px-lg-4">
      <a class="nav-link text-uppercase text-expanded" href="index.php?p=danhmucsach&ID_TheLoai=CSDL&page=1"><b>CƠ SỞ DỮ LIỆU</b></a>
    </li>
    <li class="nav-item active px-lg-4">
      <a class="nav-link text-uppercase text-expanded" href="index.php?p=danhmucsach&ID_TheLoai=W&page=1"><b>MẠNG</b></a>
    </li>
    <li class="nav-item active px-lg-4">
      <a class="nav-link text-uppercase text-expanded" href="index.php?p=danhmucsach&ID_TheLoai=AI&page=1"><b>AI</b></a>
    </li>
  <li class="nav-item active px-lg-4">
      <a class="nav-link text-uppercase text-expanded" href="index.php?p=danhmucsach&ID_TheLoai=B&page=1"><b>BLOCKCHAIN</b></a>
    </li>
 <li class="nav-item active px-lg-4">
      <a class="nav-link text-uppercase text-expanded" href="index.php?p=danhmucsach&ID_TheLoai=BM&page=1"><b>BẢO MẬT</b></a>
    </li>

  
</ul>
</div>
</nav>


