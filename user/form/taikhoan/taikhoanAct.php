<?php

session_start();
require '../../form/mod/taikhoanCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
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
            echo $username = $_POST['ten_taikhoan'];
            echo $password = $_POST['matkhau'];
            $user = new taikhoan();
            $rs = $user->UserCheckLogin($username, $password);
            if ($rs != FALSE) {
                $_SESSION['USER'] = $rs;

                header('location:../../indexuser.php');
            } else {
                header('location:../../userLogin.php');
                setcookie("error", "Đăng nhập không thành công!");
            }
            break;
        default :
            header('location:../../indexuser.php');
    }
} else {
    header('location:../../indexuser.php');
}
?>