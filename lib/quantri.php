<?php
// update dữ liệu từ bảng 
function updateSach() {
	$qr = "
UPDATE sach
SET CheckS = (SELECT Tinhtrang
          FROM soluong
          WHERE sach.ID_Sach = soluong.ID_Sach)";
	$res=mysqli_query(myConnect(),$qr);
	if (!$res) {
    printf("Error: 1 %s\n", mysqli_error(myConnect()));
    exit();
}
return mysqli_query(myConnect(),$qr);
}
// quan tri book
function DanhSachBook() {
	
	$qr = "
	Select sach.*, Theloai, Ten_NXB, soluong.SLTon 
	from sach, theloai, nxb, soluong
	where sach.ID_Theloai=theloai.ID_Theloai
	and sach.ID_NXB=nxb.ID_NXB
	and sach.ID_Sach=soluong.ID_Sach
	order by sach.ID_Sach DESC
	";
	$res=mysqli_query(myConnect(),$qr);
	if (!$res) {
    printf("Error: 1 %s\n", mysqli_error(myConnect()));
    exit();
}
	return mysqli_query(myConnect(),$qr);
}
// phan trang
function DanhSachBook_page($from,$sosach1trang) {
	$qr = "
	Select sach.*, Theloai, Ten_NXB ,soluong.SLTon 
	from sach, theloai, nxb, soluong
	where sach.ID_Theloai=theloai.ID_Theloai
	and sach.ID_NXB=nxb.ID_NXB
	and sach.ID_Sach=soluong.ID_Sach
	order by ID_Sach ASC
	limit $from,$sosach1trang
	";
	$res=mysqli_query(myConnect(),$qr);
	if (!$res) {
    printf("Error: 1 %s\n", mysqli_error(myConnect()));
    exit();
}
	return mysqli_query(myConnect(),$qr);
}
//search tong
function DanhSachBook_search($tukhoa) {
	$qr = "
	Select sach.*, Theloai, Ten_NXB ,soluong.SLTon 
	from sach, theloai, nxb,soluong
	where sach.ID_Theloai=theloai.ID_Theloai
	and sach.ID_NXB=nxb.ID_NXB
	and Tensach REGEXP '$tukhoa'
	and sach.ID_Sach=soluong.ID_Sach
	order by sach.ID_Sach ASC
	";
	$res=mysqli_query(myConnect(),$qr);
	if (!$res) {
    printf("Error: 1 %s\n", mysqli_error(myConnect()));
    exit();
}
	return mysqli_query(myConnect(),$qr);
}
//search phan trang
function DanhSachBook_searchpage($from,$sosach1trang,$tukhoa) {
	
	$qr = "
	Select sach.*, Theloai, Ten_NXB ,soluong.SLTon 
	from sach, theloai, nxb,soluong
	where sach.ID_Theloai=theloai.ID_Theloai
	and sach.ID_NXB=nxb.ID_NXB
	and Tensach REGEXP '$tukhoa'
	and sach.ID_Sach=soluong.ID_Sach
	order by sach.ID_Sach ASC
	limit $from,$sosach1trang
	";
	$res=mysqli_query(myConnect(),$qr);
	if (!$res) {
    printf("Error: 1 %s\n", mysqli_error(myConnect()));
    exit();
}
	return mysqli_query(myConnect(),$qr);
}
// quan ly user_page
function DanhSachUser_page($from,$sosach1trang) {
	$qr = "
	Select * 
	from users
	order by ID_USER ASC
	limit $from,$sosach1trang
	";
	$res=mysqli_query(myConnect(),$qr);
	if (!$res) {
    printf("Error: 1 %s\n", mysqli_error(myConnect()));
    exit();
}
	return mysqli_query(myConnect(),$qr);
}
//quan ly user
function DanhSachUser() {
	$qr = "
	Select * 
	from users
	order by ID_USER ASC
	";
	$res=mysqli_query(myConnect(),$qr);
	if (!$res) {
    printf("Error: 1 %s\n", mysqli_error(myConnect()));
    exit();
}
	return mysqli_query(myConnect(),$qr);
}
// quan ly the loai
function DanhSachTheLoai (){
	$qr="Select * from theloai
	order by ID_Theloai DESC";
	return mysqli_query(myConnect(),$qr);
	$res=mysqli_query(myConnect(),$qr);
	if (!$res) {
    printf("Error: 1 %s\n", mysqli_error(myConnect()));
    exit();
}}
//quanlyNXB
function DanhSachNXB (){
	$qr="Select * from nxb
	order by ID_NXB DESC";
	return mysqli_query(myConnect(),$qr);
	$res=mysqli_query(myConnect(),$qr);
	if (!$res) {
    printf("Error: 1 %s\n", mysqli_error(myConnect()));
    exit();
}}
//chitietSach
function ChiTietSach($idSach){
	$qr="select sach.*,soluong.Tong,soluong.SLTon from sach,soluong where sach.ID_Sach=soluong.ID_Sach and sach.ID_Sach='$idSach'";
	$row=mysqli_query(myConnect(),$qr);
	return mysqli_fetch_array($row);
	$res=mysqli_fetch_array($row);
	/*if (!$res) {
    printf("Error: 1 %s\n", mysqli_error(myConnect()));
    exit();;*/
}
//chitietUser
function ChiTietUser($idUser){
	$qr="select * from users
	where ID_User='$idUser'";
	$row=mysqli_query(myConnect(),$qr);
	return mysqli_fetch_array($row);
	$res=mysqli_fetch_array($row);
	/*if (!$res) {
    printf("Error: 1 %s\n", mysqli_error(myConnect()));
    exit();;*/
}
// quan tri book
function DanhSachKho() {
	$qr = "
	Select sach.Tensach, soluong.*, sach.an_hien 
	from sach, soluong
	where sach.ID_Sach=soluong.ID_Sach
	order by sach.ID_Sach ASC
	";
	$res=mysqli_query(myConnect(),$qr);
	if (!$res) {
    printf("Error: 1 %s\n", mysqli_error(myConnect()));
    exit();
}
	return mysqli_query(myConnect(),$qr);
}
// phan trang
function DanhSachKho_page($from,$sosach1trang) {
	$qr = "
	Select sach.Tensach, soluong.*,sach.an_hien 
	from sach, soluong
	where sach.ID_Sach=soluong.ID_Sach
	order by sach.ID_Sach ASC
	limit $from,$sosach1trang
	";
	$res=mysqli_query(myConnect(),$qr);
	if (!$res) {
    printf("Error: 1 %s\n", mysqli_error(myConnect()));
    exit();
}
	return mysqli_query(myConnect(),$qr);
}

//danhsachDon 
function DanhSachDon() {
	
	$qr = "
	Select donhang.*,users.Hoten 
	from donhang, users
	where users.ID_User=donhang.ID_User
	order by ID_Donhang ASC
	";
	$res=mysqli_query(myConnect(),$qr);
	if (!$res) {
    printf("Error: 1 %s\n", mysqli_error(myConnect()));
    exit();
}
	return mysqli_query(myConnect(),$qr);
}
//danhsachDon 
function DanhSachDon_u($user) {
	
	$qr = "
	Select donhang.*,users.Hoten 
	from donhang, users
	where users.ID_User=donhang.ID_User
	and users.ID_User='$user'
	order by ID_Donhang ASC
	";
	$res=mysqli_query(myConnect(),$qr);
	if (!$res) {
    printf("Error: 1 %s\n", mysqli_error(myConnect()));
    exit();
}
	return mysqli_query(myConnect(),$qr);
}
?>