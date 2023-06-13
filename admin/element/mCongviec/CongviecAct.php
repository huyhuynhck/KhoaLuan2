<?php

session_start();
require '../../element/mod/CongviecCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $ten_cv = $_POST['ten_cv'];
            $dieukien = $_POST['dieukien'];
            $quydoisotiet = $_POST['quydoisotiet'];
            $soluong = $_POST['soluong'];
            $ghichu = $_POST['ghichu'];
            
            $congviec = new congviec();
            $rs = $congviec->CongviecAdd($ten_cv, $dieukien, $quydoisotiet, $soluong, $ghichu, $sodienthoai2, $diachilienlac, $diachithuongtru);
            if ($rs) {
                header('location:../../index.php?req=congviecview&result=ok');
            } else {
                header('location:../../index.php?req=congviecview&result=notok');
            }
            break;
        case 'deletecongviec':
            $ma_cv = $_GET['ma_cv'];
            $congviec = new congviec();
            $rs = $congviec->CongviecDelete($ma_cv);
            if ($rs) {
                header('location:../../index.php?req=congviecview&result=ok');
            } else {
                header('location:../../index.php?req=congviecview&result=notok');
            }
            break;
        case 'updatecongviec':
            $ten_cv = $_POST['ten_cv'];
            $dieukien = $_POST['dieukien'];
            $quydoisotiet = $_POST['quydoisotiet'];
            $soluong = $_POST['soluong'];
            $ghichu = $_POST['ghichu'];
            $ma_cv = $_POST['ma_cv'];
            $congviec = new congviec();
            $rs = $congviec->CongviecUpdate($ten_cv, $dieukien, $quydoisotiet, $soluong, $ghichu, $ma_cv);
            if ($rs) {
                header('location:../../index.php?req=congviecview&result=ok');
            } else {
                header('location:../../index.php?req=congviecview&result=notok');
            }
            break;
        default :
            header('location:../../index.php?req=congviecview');
    }
} else {
    header('location:../../index.php?req=congviecview');
}
?>