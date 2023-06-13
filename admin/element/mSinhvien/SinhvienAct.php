<?php

session_start();
require '../../element/mod/SinhvienCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $ma_sinhvien = $_POST['ma_sinhvien'];
            $ten_sinhvien = $_POST['ten_sinhvien'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $email = $_POST['email'];
            $sodienthoai1 = $_POST['sodienthoai1'];
            $diachithuongtru = $_POST['diachithuongtru'];
            $id_lophoc = $_POST['id_lophoc'];
            $sinhvien = new sinhvien();
            $rs = $sinhvien->SinhvienAdd($ma_sinhvien, $ten_sinhvien, $gioitinh, $ngaysinh, $email, $sodienthoai1, $diachithuongtru, $id_lophoc);
            if ($rs) {
                header('location:../../index.php?req=sinhvienview&result=ok');
            } else {
                header('location:../../index.php?req=sinhvienview&result=notok');
            }
            break;
        case 'deletesinhvien':
            $id_sinhvien = $_GET['id_sinhvien'];
            $sinhvien = new sinhvien();
            $rs = $sinhvien->SinhvienDelete($id_sinhvien);
            if ($rs) {
                header('location:../../index.php?req=sinhvienview&result=ok');
            } else {
                header('location:../../index.php?req=sinhvienview&result=notok');
            }
            break;
        case 'updatesinhvien':
            $id_sinhvien = $_POST['id_sinhvien'];
            $ma_sinhvien = $_POST['ma_sinhvien'];
            $ten_sinhvien = $_POST['ten_sinhvien'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $email = $_POST['email'];
            $sodienthoai1 = $_POST['sodienthoai1'];
            $diachithuongtru = $_POST['diachithuongtru'];
            $id_lophoc = $_POST['id_lophoc'];


            $sinhvien = new sinhvien();
            $rs = $sinhvien->SinhvienUpdate($ma_sinhvien, $ten_sinhvien, $gioitinh, $ngaysinh, $email, $sodienthoai1, $diachithuongtru, $id_lophoc, $id_sinhvien);
            if ($rs) {
                header('location:../../index.php?req=sinhvienview&result=ok');
            } else {
                header('location:../../index.php?req=sinhvienview&result=notok');
            }
            break;
        default :
            header('location:../../index.php?req=sinhvienview');
    }
} else {
    header('location:../../index.php?req=sinhvienview');
}
?>