<?php

session_start();
require '../../element/mod/LophocCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $ten_lophoc = $_POST['ten_lophoc'];
            $mota = $_POST['mota'];
            $id_nganhhoc = $_POST['id_nganhhoc'];
            $id_khoahoc = $_POST['id_khoahoc'];

            $lophoc = new lophoc();
            $rs = $lophoc->LophocAdd($ten_lophoc, $mota, $id_khoahoc, $id_nganhhoc);
            if ($rs) {
                header('location:../../index.php?req=lophocview&result=ok');
            } else {
                header('location:../../index.php?req=lophocview&result=notok');
            }
            break;
            case 'deletelophoc':
                $id_lophoc = $_GET['id_lophoc'];
                $lophoc = new lophoc();
                $rs = $lophoc->LophocDelete($id_lophoc);
                if ($rs) {
                    header('location:../../index.php?req=lophocview&result=ok');
                } else {
                    header('location:../../index.php?req=lophocview&result=notok');
                }
                break;
        case 'updatelophoc':
            $ten_lophoc = $_POST['ten_lophoc'];
            $mota = $_POST['mota'];
            $id_lophoc = $_POST['id_lophoc'];
            $id_nganhhoc = $_POST['id_nganhhoc'];
            $id_khoahoc = $_POST['id_khoahoc'];

            $lophoc = new lophoc();
            $rs = $lophoc->LophocUpdate($ten_lophoc, $mota, $id_khoahoc, $id_nganhhoc, $id_lophoc);
            if ($rs) {
                header('location:../../index.php?req=lophocview&result=ok');
            } else {
                header('location:../../index.php?req=lophocview&result=notok');
            }
            break;
        default :
            header('location:../../index.php?req=lophocview');
    }
} else {
    header('location:../../index.php?req=lophocview');
}
?>