<?php

session_start();
require '../../form/mod/taikhoanCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'userlogout':
            
            header('location: ../../../index.php');
            break;
        
        case 'checklogin':
            $ten_taikhoan = $_POST['ten_taikhoan'];
            $matkhau = $_POST['matkhau'];
            $user = new taikhoan();
            $rs = $user->TaikhoanCheckLogin($ten_taikhoan, $matkhau);
            if ($rs != FALSE) {
                $_SESSION['USER'] = $rs;

                header('location:../../indexuser.php');
            } else {
                header('location:../../../index.php');
                setcookie("error", "Đăng nhập không thành công!");
            }
            break;
            case 'setpassword':
                $ten_taikhoan = $_POST['ten_taikhoan'];
                $passwordold = $_POST['passwordold'];
                $passwordnew = $_POST['passwordnew'];
                
    
                $taikhoan = new taikhoan();
                $rs = $taikhoan->TaikhoanChangePassword($ten_taikhoan, $passwordold, $passwordnew);
                if ($rs) {
                    header('location:../../indexuser.php&ok');
                } else {
                    header('location:../../indexuser.php&notok');
                }
                break;
        default :
            header('location:../../indexuser.php');
    }
} else {
    header('location:../../indexuser.php');
}
?>