<?php

session_start();
require '../../element/mod/TaikhoanCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $ten_taikhoan = $_POST['ten_taikhoan'];
            $matkhau = $_POST['matkhau'];
            $id_canbo = $_POST['id_canbo'];
            $taikhoan = new taikhoan();
            $rs = $taikhoan->TaikhoanAdd($ten_taikhoan, $matkhau, $id_canbo);
            if ($rs) {
                header('location:../../index.php?req=viewtaikhoan&result=ok');
            } else {
                header('location:../../index.php?req=viewtaikhoan&result=notok');
            }
            break;
        case 'deletetaikhoan':
            $id_taikhoan = $_GET['id_taikhoan'];
            $taikhoan = new taikhoan();
            $rs = $taikhoan->TaikhoanDelete($id_taikhoan);
            if ($rs) {
                header('location:../../index.php?req=viewtaikhoan&result=ok');
            } else {
                header('location:../../index.php?req=viewtaikhoan&result=notok');
            }
            break;
        case 'updatetaikhoan':
            $ten_taikhoan = $_POST['ten_taikhoan'];
            $matkhau = $_POST['matkhau'];
            $id_canbo = $_POST['id_canbo'];
            $id_taikhoan = $_POST['id_taikhoan'];

            $taikhoan = new taikhoan();
            $rs = $taikhoan->TaikhoanUpdate($ten_taikhoan, $matkhau, $id_canbo, $id_taikhoan);
            if ($rs) {
                header('location:../../index.php?req=viewtaikhoan&result=ok');
            } else {
                header('location:../../index.php?req=viewtaikhoan&result=notok');
            }
            break;
        default :
            header('location:../../index.php?req=viewtaikhoan');
    }
} else {
    header('location:../../index.php?req=viewtaikhoan');
}
?>