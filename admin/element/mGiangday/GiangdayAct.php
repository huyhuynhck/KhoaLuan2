<?php

session_start();
require '../../element/mod/GiangdayCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $sosv = $_POST['sosv'];
            $sonhom = $_POST['sonhom'];
            $sotietmonhoc = $_POST['sotietmonhoc'];
            $sotietthucgiang = $_POST['sotietthucgiang'];
            $hesolop = $_POST['hesolop'];
            $hesotinchi = $_POST['hesotinchi'];
            $tenloai = $_POST['tenloai'];
            $giangday = new giangday();
            $rs = $giangday->GiangdayAdd($sosv, $sonhom, $sotietmonhoc, $sotietthucgiang, $hesolop, $hesotinchi, $tenloai);
            if ($rs) {
                header('location:../../index.php?req=giangdayview&result=ok');
            } else {
                header('location:../../index.php?req=giangdayview&result=notok');
            }
            break;
        case 'deletegiangday':
            $ma_giangday = $_GET['ma_giangday'];
            $giangday = new giangday();
            $rs = $giangday->GiangdayDelete($ma_giangday);
            if ($rs) {
                header('location:../../index.php?req=giangdayview&result=ok');
            } else {
                header('location:../../index.php?req=giangdayview&result=notok');
            }
            break;
        case 'updategiangday':
            $sosv = $_POST['sosv'];
            $sonhom = $_POST['sonhom'];
            $sotietmonhoc = $_POST['sotietmonhoc'];
            $sotietthucgiang = $_POST['sotietthucgiang'];
            $hesolop = $_POST['hesolop'];
            $hesotinchi = $_POST['hesotinchi'];
            $tenloai = $_POST['tenloai'];
            $giangday = new giangday();
            $rs = $giangday->GiangdayUpdate($sosv, $sonhom, $sotietmonhoc, $sotietthucgiang, $hesolop, $hesotinchi, $tenloai, $ma_giangday);
            if ($rs) {
                header('location:../../index.php?req=giangdayview&result=ok');
            } else {
                header('location:../../index.php?req=giangdayview&result=notok');
            }
            break;
        default :
            header('location:../../index.php?req=giangdayview');
    }
} else {
    header('location:../../index.php?req=giangdayview');
}
?>