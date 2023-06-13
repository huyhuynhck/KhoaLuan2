<?php

session_start();
require '../../element/mod/NganhhocCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $ten_nganhhoc = $_POST['ten_nganhhoc'];
            $mota = $_POST['mota'];

            $nganhhoc = new nganhhoc();
            $rs = $nganhhoc->NganhhocAdd($ten_nganhhoc, $mota);
            if ($rs) {
                header('location:../../index.php?req=nganhhocview&result=ok');
            } else {
                header('location:../../index.php?req=nganhhocview&result=notok');
            }
            break;
            case 'deletenganhhoc':
                $id_nganhhoc = $_GET['id_nganhhoc'];
                $nganhhoc = new nganhhoc();
                $rs = $nganhhoc->nganhhocDelete($id_nganhhoc);
                if ($rs) {
                    header('location:../../index.php?req=nganhhocview&result=ok');
                } else {
                    header('location:../../index.php?req=nganhhocview&result=notok');
                }
                break;
        case 'updatenganhhoc':
            $ten_nganhhoc = $_POST['ten_nganhhoc'];
            $mota = $_POST['mota'];

            $nganhhoc = new nganhhoc();
            $rs = $nganhhoc->nganhhocUpdate($ten_nganhhoc, $mota);
            if ($rs) {
                header('location:../../index.php?req=nganhhocview&result=ok');
            } else {
                header('location:../../index.php?req=nganhhocview&result=notok');
            }
            break;
        default :
            header('location:../../index.php?req=nganhhocview');
    }
} else {
    header('location:../../index.php?req=nganhhocview');
}
?>