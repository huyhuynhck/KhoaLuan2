<?php

session_start();
require '../../element/mod/indexcount.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $ten_index = $_POST['ten_index'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $so_ngay_hoat_dong = $_POST['so_ngay_hoat_dong'];
            $ghi_chu = $_POST['ghi_chu'];

            $dot = new indexcount();
            $rs = $dot->indexcount__Add($ten_index, $ngay_bat_dau, $ngay_ket_thuc, $so_ngay_hoat_dong, $ghi_chu);
            if ($rs) {
                header('location:../../index.php?req=viewdot&result=ok');
            } else {
                header('location:../../index.php?req=viewdot&result=notok');
            }
            break;
        case 'deletedot':
            $id_index = $_GET['id_index'];
            $dot = new indexcount();
            $rs = $dot->indexcount__Delete($id_index);
            if ($rs) {
                header('location:../../index.php?req=viewdot&result=ok');
            } else {
                header('location:../../index.php?req=viewdot&result=notok');
            }
            break;
        case 'updatedot':
            $id_index = $_POST['id_index'];
            $ten_index = $_POST['ten_index'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $so_ngay_hoat_dong = $_POST['so_ngay_hoat_dong'];
            $ghi_chu = $_POST['ghi_chu'];

            $dot = new indexcount();
            $rs = $dot->indexcount__Update($id_index, $ten_index,$ngay_bat_dau,$ngay_ket_thuc,$so_ngay_hoat_dong,$ghi_chu);
            if ($rs) {
                header('location:../../index.php?req=viewdot&result=ok');
            } else {
                header('location:../../index.php?req=viewdot&result=notok');
            }
            break;
        default :
            header('location:../../index.php?req=viewdot');
    }
} else {
    header('location:../../index.php?req=viewdot');
}
?>