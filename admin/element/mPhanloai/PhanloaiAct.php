<?php

session_start();
require '../../element/mod/PhanloaiCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $ten_phan_loai = $_POST['ten_phan_loai'];
            $ghi_chu = $_POST['ghi_chu'];

            $phanloai = new phanloai();
            $rs = $phanloai->PhanloaiAdd($ten_phan_loai, $ghi_chu);
            if ($rs) {
                header('location:../../index.php?req=phanloaiview&result=ok');
            } else {
                header('location:../../index.php?req=phanloaiview&result=notok');
            }
            break;
            case 'deletephanloai':
                $id_phan_loai = $_GET['id_phan_loai'];
                $phanloai = new phanloai();
                $rs = $phanloai->PhanloaiDelete($id_phan_loai);
                if ($rs) {
                    header('location:../../index.php?req=phanloaiview&result=ok');
                } else {
                    header('location:../../index.php?req=phanloaiview&result=notok');
                }
                break;
        case 'updatephanloai':
            $ten_phan_loai = $_POST['ten_phan_loai'];
            $ghi_chu = $_POST['ghi_chu'];
            $id_phan_loai = $_POST['id_phan_loai'];

            $phanloai = new phanloai();
            $rs = $phanloai->PhanloaiUpdate($ten_phan_loai, $ghi_chu, $id_phan_loai);
            if ($rs) {
                header('location:../../index.php?req=phanloaiview&result=ok');
            } else {
                header('location:../../index.php?req=phanloaiview&result=notok');
            }
            break;
        default :
            header('location:../../index.php?req=phanloaiview');
    }
} else {
    header('location:../../index.php?req=phanloaiview');
}
?>