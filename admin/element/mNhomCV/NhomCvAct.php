<?php

session_start();
require '../../element/mod/NhomCvCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $ten_nhomcv = $_POST['ten_nhomcv'];
            $ma_cv = $_POST['ma_cv'];
            $nhomcv = new nhomcongviec();
            $rs = $nhomcv->NhomCvAdd($ten_nhomcv, $ma_cv);
            if ($rs) {
                header('location:../../index.php?req=nhomcvview&result=ok');
            } else {
                header('location:../../index.php?req=nhomcvview&result=notok');
            }
            break;
            case 'deletenhomcv':
                $ma_nhomcv = $_GET['ma_nhomcv'];
                $nhomcv = new nhomcongviec();
                $rs = $nhomcv->NhomCvDelete($ma_nhomcv);
                if ($rs) {
                    header('location:../../index.php?req=nhomcvview&result=ok');
                } else {
                    header('location:../../index.php?req=nhomcvview&result=notok');
                }
                break;
        case 'updatenhomcv':
            $ten_nhomcv = $_POST['ten_nhomcv'];
            $mota = $_POST['mota'];
            $ma_cv = $_POST['ma_cv'];
            $nhomcv = new nhomcongviec();
            $rs = $nhomcv->NhomCvUpdate($ten_nhomcv, $ma_cv, $ma_nhomcv);
            if ($rs) {
                header('location:../../index.php?req=nhomcvview&result=ok');
            } else {
                header('location:../../index.php?req=nhomcvview&result=notok');
            }
            break;
        default :
            header('location:../../index.php?req=nhomcvview');
    }
} else {
    header('location:../../index.php?req=nhomcvview');
}
?>