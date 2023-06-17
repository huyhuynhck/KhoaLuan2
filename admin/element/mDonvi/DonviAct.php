<?php

session_start();
require '../../element/mod/DonviCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $ma_donvi = $_POST['ma_donvi'];
            $ten_donvi = $_POST['ten_donvi'];
            $mota = $_POST['mota'];
            $donvi = new donvi();
            $rs = $donvi->DonviAdd($ma_donvi, $ten_donvi, $mota);
            if ($rs) {
                header('location:../../index.php?req=donviview&result=ok');
            } else {
                header('location:../../index.php?req=donviview&result=notok');
            }
            break;
            case 'deletedonvi':
                $id_donvi = $_GET['id_donvi'];
                $donvi = new donvi();
                $rs = $donvi->DonviDelete($id_donvi);
                if ($rs) {
                    header('location:../../index.php?req=donviview&result=ok');
                } else {
                    header('location:../../index.php?req=donviview&result=notok');
                }
                break;
        case 'updatedonvi':
            $id_donvi = $_POST['id_donvi'];
            $ma_donvi = $_POST['ma_donvi'];
            $ten_donvi = $_POST['ten_donvi'];
            $mota = $_POST['mota'];

            $donvi = new donvi();
            $rs = $donvi->DonviUpdate($ma_donvi, $ten_donvi, $mota, $id_donvi);
            if ($rs) {
                header('location:../../index.php?req=donviview&result=ok');
            } else {
                header('location:../../index.php?req=donviview&result=notok');
            }
            break;
        default :
            header('location:../../index.php?req=donviview');
    }
} else {
    header('location:../../index.php?req=donviview');
}
?>