<?php

session_start();
require '../../element/mod/CanboCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $ma_canbo = $_POST['ma_canbo'];
            $ten_canbo = $_POST['ten_canbo'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $email = $_POST['email'];
            $sodienthoai1 = $_POST['sodienthoai1'];
            $diachithuongtru = $_POST['diachithuongtru'];
            $ngay_vao_lam = $_POST['ngay_vao_lam'];
            $id_trinhdo = $_POST['id_trinhdo'];
            $id_donvi = $_POST['id_donvi'];
            $id_phan_loai = $_POST['id_phan_loai'];
            $canbo = new canbo();
            $rs = $canbo->CanboAdd($ma_canbo, $ten_canbo, $gioitinh, $ngaysinh, $email, $sodienthoai1, $diachithuongtru, $ngay_vao_lam, $id_trinhdo, $id_donvi, $id_phan_loai);
            if ($rs) {
                header('location:../../index.php?req=canboview&result=ok');
            } else {
                header('location:../../index.php?req=canboview&result=notok');
            }
            break;
        case 'deletecanbo':
            $id_canbo = $_GET['id_canbo'];
            $canbo = new canbo();
            $rs = $canbo->CanboDelete($id_canbo);
            if ($rs) {
                header('location:../../index.php?req=canboview&result=ok');
            } else {
                header('location:../../index.php?req=canboview&result=notok');
            }
            break;
        case 'updatecanbo':
            $ma_canbo = $_POST['ma_canbo'];
            $ten_canbo = $_POST['ten_canbo'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $email = $_POST['email'];
            $sodienthoai1 = $_POST['sodienthoai1'];
            $diachithuongtru = $_POST['diachithuongtru'];
            $ngay_vao_lam = $_POST['ngay_vao_lam'];
            $id_trinhdo = $_POST['id_trinhdo'];
            $id_donvi = $_POST['id_donvi'];
            $id_phan_loai = $_POST['id_phan_loai'];
            $id_canbo = $_POST['id_canbo'];

            $canbo = new canbo();
            $rs = $canbo->CanboUpdate($ma_canbo, $ten_canbo, $gioitinh, $ngaysinh, $email, $sodienthoai1, $diachithuongtru, $ngay_vao_lam, $id_trinhdo, $id_donvi, $id_phan_loai, $id_canbo);
            if ($rs) {
                header('location:../../index.php?req=canboview&result=ok');
            } else {
                header('location:../../index.php?req=canboview&result=notok');
            }
            break;
        default :
            header('location:../../index.php?req=canboview');
    }
} else {
    header('location:../../index.php?req=canboview');
}
?>