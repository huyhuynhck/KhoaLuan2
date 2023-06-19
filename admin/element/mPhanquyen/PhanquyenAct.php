<?php

session_start();
require '../../element/mod/PhanquyenCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $ten_phanquyen = $_POST['ten_phanquyen'];
            $mota = $_POST['mota'];

            $phanquyen = new phanquyen();
            $rs = $phanquyen->PhanquyenAdd($ten_phanquyen, $mota);
            if ($rs) {
                header('location:../../index.php?req=phanquyenview&result=ok');
            } else {
                header('location:../../index.php?req=phanquyenview&result=notok');
            }
            break;
            case 'deletephanquyen':
                $id_phanquyen = $_GET['id_phanquyen'];
                $phanquyen = new phanquyen();
                $rs = $phanquyen->PhanquyenDelete($id_phanquyen);
                if ($rs) {
                    header('location:../../index.php?req=phanquyenview&result=ok');
                } else {
                    header('location:../../index.php?req=phanquyenview&result=notok');
                }
                break;
        case 'updatephanquyen':
            $ten_phanquyen = $_POST['ten_phanquyen'];
            $mota = $_POST['mota'];
            $id_phanquyen = $_POST['id_phanquyen'];

            $phanquyen = new phanquyen();
            $rs = $phanquyen->PhanquyenUpdate($ten_phanquyen, $mota, $id_phanquyen);
            if ($rs) {
                header('location:../../index.php?req=phanquyenview&result=ok');
            } else {
                header('location:../../index.php?req=phanquyenview&result=notok');
            }
            break;
        default :
            header('location:../../index.php?req=phanquyenview');
    }
} else {
    header('location:../../index.php?req=phanquyenview');
}
?>