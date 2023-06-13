<?php

session_start();
require '../../element/mod/PhannhomCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $ten_phannhom = $_POST['ten_phannhom'];
            $mota = $_POST['mota'];
            // $id_khoahoc = $_POST['id_khoahoc'];
            // $id_nganhhoc = $_POST['id_nganhhoc'];

            $phannhom = new phannhom();
            $rs = $phannhom->PhannhomAdd($ten_phannhom, $mota);
            if ($rs) {
                header('location:../../index.php?req=phannhomview&result=ok');
            } else {
                header('location:../../index.php?req=phannhomview&result=notok');
            }
            break;
            case 'deletephannhom':
                $id_phannhom = $_GET['id_phannhom'];
                $phannhom = new phannhom();
                $rs = $phannhom->PhannhomDelete($id_phannhom);
                if ($rs) {
                    header('location:../../index.php?req=phannhomview&result=ok');
                } else {
                    header('location:../../index.php?req=phannhomview&result=notok');
                }
                break;
        case 'updatephannhom':
            $ten_phannhom = $_POST['ten_phannhom'];
            $mota = $_POST['mota'];

            $phannhom = new phannhom();
            $rs = $phannhom->PhannhomUpdate($ten_phannhom, $mota);
            if ($rs) {
                header('location:../../index.php?req=phannhomview&result=ok');
            } else {
                header('location:../../index.php?req=phannhomview&result=notok');
            }
            break;
        default :
            header('location:../../index.php?req=phannhomview');
    }
} else {
    header('location:../../index.php?req=phannhomview');
}
?>