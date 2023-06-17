<?php

$a = '../admin/element/mod/database.php';
$h = './element/mod/database.php';
$t = './admin/element/mod/database.php';
$s = '../../element/mod/database.php';
if (file_exists($s)) {
    $f = $s;
}
if (!file_exists($s)) {
    $f = $t;
}
if (!file_exists($t) && !file_exists($s)) {
    $f = $h;
}
if (!file_exists($t) && !file_exists($s) && !file_exists($h)) {
    $f = $a;
}
if (!file_exists($t) && !file_exists($s) && !file_exists($h) && !file_exists($a)) {
    $f = 'database.php';
}
require_once $f;

class taikhoan extends database {
    /* Phương thức TaikhoanCheckLogin: thực hiện kiểm tra đăng nhập */

    public function TaikhoanCheckLogin($username, $password) {
        $select = $this->connect->prepare("select * from taikhoan where ten_taikhoan = ? and matkhau = ?");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($username, $password));
        if ($select->rowCount() > 0) {
            return $select->fetch();
        } else {
            return FALSE;
        }
    }


    /* Phương thức UserSetActive: khóa tài khoản người dùng */

    public function UserSetActive($iduser, $ability) {
        $update = $this->connect->prepare("update user set ability=? where iduser=?");
        $update->execute(array($ability, $iduser));
        return $update->rowCount();
    }

    /* Phương thức UserChangePassword: đổi password người dùng */

    public function TaikhoanChangePassword($id_taikhoan, $matkhau) {
        $selectMK = $this->connect->prepare("UPDATE taikhoan SET matkhau=? WHERE id_taikhoan=?");
        $selectMK->execute(array($id_taikhoan, $matkhau));
        return $selectMK->rowCount();
    }

    
    public function UserGetbyName($username) {
        $getTk = $this->connect->prepare("select * from user where username=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($username));
        return $getTk->fetch();
    }

    public function UserCount() {
        $getAll = $this->connect->prepare("select * from user");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        $list = $getAll->fetchAll();
        return count($list);
    }
    public function TaikhoanGetbyId($id_taikhoan) {
        $getTk = $this->connect->prepare("select * from taikhoan where id_taikhoan=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($id_taikhoan));
        return $getTk->fetch();
    }
}

?>