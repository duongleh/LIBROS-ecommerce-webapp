<?php

function SachMoiNhat($ID_TheLoai)
{
    $con = myConnect();
    $qr = "
		SELECT * FROM sach
		WHERE ID_Theloai = '$ID_TheLoai' AND an_hien = 1
		ORDER BY ID_Sach ASC
		LIMIT 0,6
	";
    $result = mysqli_query($con, $qr);
    return $result;
}

function DanhMucSach($ID_TheLoai, $from, $numperpage)
{
    $con = myConnect();
    $qr = "
		SELECT * FROM sach
		WHERE ID_Theloai = '$ID_TheLoai' AND an_hien = 1
		ORDER BY ID_Sach ASC
		LIMIT $from,$numperpage
	";
    $result = mysqli_query($con, $qr);
    return $result;
}


function TimKiemSach($Tukhoa, $from, $numperpage)
{
    $con = myConnect();
    $qr = "
		SELECT * FROM sach
		WHERE Tensach REGEXP '$Tukhoa' AND an_hien = 1
		ORDER BY ID_Sach ASC
		LIMIT $from,$numperpage
	";
    $result = mysqli_query($con, $qr);
    return $result;
}

function TimTatcaSach($Tukhoa)
{
    $con = myConnect();
    $qr = "
        SELECT ID_Theloai,COUNT(ID_Theloai) FROM sach
        WHERE Tensach REGEXP '$Tukhoa' AND an_hien = 1
        GROUP BY ID_Theloai
        ORDER BY COUNT(ID_Theloai) DESC
	";
    $result = mysqli_query($con, $qr);
    return $result;
}

function TimSLTatcaSach($Tukhoa)
{
    $con = myConnect();
    $qr = "
        SELECT * FROM sach
        WHERE Tensach REGEXP '$Tukhoa' AND an_hien = 1        
	";
    $result = mysqli_query($con, $qr);
    return $result;
}

function SanPhamSach($ID_Sach)
{
    $con = myConnect();
    $qr = "
		SELECT * FROM sach
		WHERE ID_Sach = '$ID_Sach' AND an_hien = 1
	";
    $result = mysqli_query($con, $qr);
    return $result;
}

function GetNXB($ID_NXB)
{
    $con = myConnect();
    $qr = "
		SELECT * FROM nxb
		WHERE ID_NXB = '$ID_NXB'
	";
    $result = mysqli_query($con, $qr);
    return $result;
}

function GetTL($ID_Theloai)
{
    $con = myConnect();
    $qr = "
		SELECT * FROM theloai
		WHERE ID_Theloai = '$ID_Theloai'
	";
    $result = mysqli_query($con, $qr);
    return $result;
}

function Count_sachTL($ID_Theloai)
{
    $con = myConnect();
    $qr = "
	SELECT COUNT(Tensach)
	FROM sach
	WHERE ID_Theloai= '$ID_Theloai' AND an_hien = 1
	";
    $result = mysqli_query($con, $qr);
    return $result;
}

function Count_sach($Tukhoa)
{
    $con = myConnect();
    $qr = "
	SELECT COUNT(Tensach)
	FROM sach
	WHERE Tensach REGEXP '$Tukhoa' AND an_hien = 1
	";
    $result = mysqli_query($con, $qr);
    return $result;
}

function SPlienquan($ID_Theloai, $ID_sanphamhientai)
{
    $con = myConnect();
    $qr = "
	SELECT * from sach
	WHERE ID_Theloai = '$ID_Theloai' and ID_Sach <> '$ID_sanphamhientai' AND an_hien = 1
	ORDER BY ID_Sach ASC
	LIMIT 0,4
	";
    $result = mysqli_query($con, $qr);
    return $result;
}

function check_uniqueuser($Username)
{
    $con = myConnect();
    $qr = "
	SELECT * from users
	WHERE Username = '$Username';
	";
    $result = mysqli_query($con, $qr);
    return $result;
}

function check_username($Username)
{
    $con = myConnect();
    $qr = "
	SELECT * from users
	WHERE Username = '$Username';
	";
    $result = mysqli_query($con, $qr);
    return $result;
}

function check_password($Passwords)
{
    $con = myConnect();
    $qr = "
	SELECT * from users
	WHERE Passwords = '$Passwords';
	";
    $result = mysqli_query($con, $qr);
    return $result;
}

function GetSach($ID_Sach)
{
    $con = myConnect();
    $qr = "
		SELECT * FROM sach
		WHERE ID_Sach = '$ID_Sach'
	";
    $result = mysqli_query($con, $qr);
    return $result;
}

function CheckSLTon($ID_Sach)
{
    $con = myConnect();
    $qr = "
		SELECT * FROM soluong
		WHERE ID_Sach = '$ID_Sach'
	";
    $result = mysqli_query($con, $qr);
    return $result;
}

function UpdateSoLuong($ID_Sach, $num)
{
    $con = myConnect();
    $qr = "
		UPDATE soluong
        SET SLTon = SLTon - $num, SLBan =SLBan + $num
        WHERE ID_Sach = '$ID_Sach'
	";
    $result = mysqli_query($con, $qr);
    return $result;
}

function getBookPrice($ID_Sach)
{
    $con = myConnect();
    $qr = "
		SELECT * FROM sach
		WHERE ID_Sach = '$ID_Sach'
	";
    $result = mysqli_query($con, $qr);
    return $result;
}

function GetOrderInfo($ID_User)
{
    $con = myConnect();
    $qr = "
		SELECT * FROM donhang
		WHERE ID_User = '$ID_User'
	";
    $result = mysqli_query($con, $qr);
    return $result;
}

function GetOrderDetail($ID_Donhang)
{
    $con = myConnect();
    $qr = "
	    SELECT chitietdonhang.Soluong,sach.Tensach FROM chitietdonhang,sach
		WHERE ID_Donhang = '$ID_Donhang' AND chitietdonhang.ID_Sach = sach.ID_Sach
	";
    $result = mysqli_query($con, $qr);
    return $result;
}
