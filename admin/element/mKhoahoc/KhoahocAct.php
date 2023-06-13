<?php

session_start();
require '../../element/mod/KhoahocCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $ten_khoahoc = $_POST['ten_khoahoc'];
            $mota = $_POST['mota'];
            $khoahoc = new khoahoc();
            $rs = $khoahoc->KhoahocAdd($ten_khoahoc, $mota);
            if ($rs) {
                header('location:../../index.php?req=khoahocview&result=ok');
            } else {
                header('location:../../index.php?req=khoahocview&result=notok');
            }
            break;
            case 'deletekhoahoc':
                $id_khoahoc = $_GET['id_khoahoc'];
                $khoahoc = new khoahoc();
                $rs = $khoahoc->KhoahocDelete($id_khoahoc);
                if ($rs) {
                    header('location:../../index.php?req=khoahocview&result=ok');
                } else {
                    header('location:../../index.php?req=khoahocview&result=notok');
                }
                break;
        case 'updatekhoahoc':
            $ten_khoahoc = $_POST['ten_khoahoc'];
            $mota = $_POST['mota'];

            $khoahoc = new khoahoc();
            $rs = $khoahoc->KhoahocUpdate($ten_khoahoc, $mota, $id_khoahoc);
            if ($rs) {
                header('location:../../index.php?req=khoahocview&result=ok');
            } else {
                header('location:../../index.php?req=khoahocview&result=notok');
            }
            break;
        default :
            header('location:../../index.php?req=khoahocview');
    }
} else {
    header('location:../../index.php?req=khoahocview');
}
?>