<?php

session_start();
require '../../element/mod/TrinhdoCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $ma_trinhdo = $_POST['ma_trinhdo'];
            $ten_trinhdo = $_POST['ten_trinhdo'];
            $mota = $_POST['mota'];
            $trinhdo = new trinhdo();
            $rs = $trinhdo->TrinhdoAdd($ma_trinhdo, $ten_trinhdo, $mota);
            if ($rs) {
                header('location:../../index.php?req=trinhdoview&result=ok');
            } else {
                header('location:../../index.php?req=trinhdoview&result=notok');
            }
            break;
            case 'deletetrinhdo':
                $id_trinhdo = $_GET['id_trinhdo'];
                $trinhdo = new trinhdo();
                $rs = $trinhdo->TrinhdoDelete($id_trinhdo);
                if ($rs) {
                    header('location:../../index.php?req=trinhdoview&result=ok');
                } else {
                    header('location:../../index.php?req=trinhdoview&result=notok');
                }
                break;
        case 'updatetrinhdo':
            $id_trinhdo = $_POST['id_trinhdo'];
            $ma_trinhdo = $_POST['ma_trinhdo'];
            $ten_trinhdo = $_POST['ten_trinhdo'];
            $mota = $_POST['mota'];

            $trinhdo = new trinhdo();
            $rs = $trinhdo->TrinhdoUpdate($ma_trinhdo, $ten_trinhdo, $mota, $id_trinhdo);
            if ($rs) {
                header('location:../../index.php?req=trinhdoview&result=ok');
            } else {
                header('location:../../index.php?req=trinhdoview&result=notok');
            }
            break;
        default :
            header('location:../../index.php?req=trinhdoview');
    }
} else {
    header('location:../../index.php?req=trinhdoview');
}
?>