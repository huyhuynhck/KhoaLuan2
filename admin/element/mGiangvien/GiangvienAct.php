<?php

session_start();
require '../../element/mod/GiangvienCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $ma_giangvien = $_POST['ma_giangvien'];
            $ten_giangvien = $_POST['ten_giangvien'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $email = $_POST['email'];
            $sodienthoai1 = $_POST['sodienthoai1'];
            $diachithuongtru = $_POST['diachithuongtru'];
            $id_trinhdo = $_POST['id_trinhdo'];
            $id_donvi = $_POST['id_donvi'];
            $giangvien = new giangvien();
            $rs = $giangvien->giangvienAdd($ma_giangvien, $ten_giangvien, $gioitinh, $ngaysinh, $email, $sodienthoai1, $diachithuongtru, $id_trinhdo, $id_donvi);
            if ($rs) {
                header('location:../../index.php?req=giangvienview&result=ok');
            } else {
                header('location:../../index.php?req=giangvienview&result=notok');
            }
            break;
        case 'deletegiangvien':
            $id_giangvien = $_GET['id_giangvien'];
            $giangvien = new giangvien();
            $rs = $giangvien->giangvienDelete($id_giangvien);
            if ($rs) {
                header('location:../../index.php?req=giangvienview&result=ok');
            } else {
                header('location:../../index.php?req=giangvienview&result=notok');
            }
            break;
        case 'updategiangvien':
            $ma_giangvien = $_POST['ma_giangvien'];
            $ten_giangvien = $_POST['ten_giangvien'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $email = $_POST['email'];
            $sodienthoai1 = $_POST['sodienthoai1'];
            $diachithuongtru = $_POST['diachithuongtru'];
            $id_trinhdo = $_POST['id_trinhdo'];
            $id_donvi = $_POST['id_donvi'];
            $id_giangvien = $_POST['id_giangvien'];


            $giangvien = new giangvien();
            $rs = $giangvien->GiangvienUpdate($ma_giangvien, $ten_giangvien, $gioitinh, $ngaysinh, $email, $sodienthoai1, $diachithuongtru, $id_trinhdo, $id_donvi, $id_giangvien);
            if ($rs) {
                header('location:../../index.php?req=giangvienview&result=ok');
            } else {
                header('location:../../index.php?req=giangvienview&result=notok');
            }
            break;
        default :
            header('location:../../index.php?req=giangvienview');
    }
} else {
    header('location:../../index.php?req=giangvienview');
}
?>