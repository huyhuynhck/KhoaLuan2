<?php

session_start();
require '../../element/mod/userCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            $rs = 0;
            $username = $_POST['username'];
            $password = $_POST['password'];
            $hoten = $_POST['hoten'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $dienthoai = $_POST['dienthoai'];
            $id_phanquyen = $_POST['id_phanquyen'];
            $id_donvi = $_POST['id_donvi'];
            $user = new user();
            $check = $user->UserCheckUsername($username);
            if($check){
                $rs = 2;
            }else{
                $rs += $user->UserAdd($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $id_phanquyen, $id_donvi);
            }
            if ($rs == 1) {
                header('location:../../index.php?req=userview&result=ok');
            }if ($rs == 0) {
                header('location:../../index.php?req=userview&result=notok');
            }if ($rs == 2) {
                header('location:../../index.php?req=userview&result=usernamekhong');
            }
            break;
        case 'deleteuser':
            $iduser = $_GET['iduser'];
            $user = new user();
            $rs = $user->UserDelete($iduser);
            if ($rs) {
                header('location:../../index.php?req=userview&result=ok');
            } else {
                header('location:../../index.php?req=userview&result=notok');
            }
            break;
        case 'setlock':
            $iduser = $_GET['iduser'];
            $ability = $_GET['ability'];
            $user = new user();
            if ($ability == 1) {
                $rs = $user->UserSetActive($iduser, 0);
            } else {
                $rs = $user->UserSetActive($iduser, 1);
            }
            if ($rs) {
                header('location:../../index.php?req=userview&result=ok');
            } else {
                header('location:../../index.php?req=userview&result=notok');
            }
            break;
        case 'updateuser':
            $iduser = $_POST['iduser'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $hoten = $_POST['hoten'];
            $gioitinh = $_POST['gioitinh'];
            $ngaysinh = $_POST['ngaysinh'];
            $diachi = $_POST['diachi'];
            $dienthoai = $_POST['dienthoai'];
            $id_phanquyen = $_POST['id_phanquyen'];
            $id_donvi = $_POST['id_donvi'];

            $user = new user();
            $rs = $user->UserUpdate($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $id_phanquyen, $id_donvi, $iduser);
            if ($rs) {
                header('location:../../index.php?req=userview&result=ok');
            } else {
                header('location:../../index.php?req=userview&result=notok');
            }
            break;
        case 'userlogout':
            $timelogin = date('h:i - d/m/Y');
            if (isset($_SESSION['USER'])) {
                $namelogin = $_SESSION['USER'];
            }
            if (isset($_SESSION['ADMIN'])) {
                $namelogin = $_SESSION['ADMIN'];
            }
            setcookie($namelogin, $timelogin, time() + (86400 * 30), "/");
            session_destroy();
            header('location: ../../index.php');
            break;
        
        case 'checklogin':
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = new user();

            $rs = $user->UserCheckLogin($username, $password);
            if ($rs) {
                $_SESSION['ADMIN'] = $rs;
                header('location:../../index.php');

            } else {
                header('location:../../userLogin.php');
                setcookie("error", "Đăng nhập không thành công!");
            }
            break;
        default :
            header('location:../../index.php?req=userview');
    }
} else {
    header('location:../../index.php?req=userview');
}
?>