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
    $f = '../database.php';
}
require_once $f;

class user extends database {
    /* Phương thức UserCheckLogin: thực hiện kiểm tra đăng nhập */

    public function UserCheckLogin($username, $password) {
        $select = $this->connect->prepare("select * from user where username = ? and password = ? and ability=0");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($username, $password));
        if (count($select->fetchAll()) == 1) {
            return $select->fetch();
        } else {
            return FALSE;
        }
    }

    /* Phương thức UserCheckUsername:kiểm tra tồn tại username */

    public function UserCheckUsername($username) {
        $select = $this->connect->prepare("select * from user where username = ?");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($username));
        if (count($select->fetchAll()) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* Phương thức UserGetAll: lấy tất cả mẩu tin trong bảng user trả về mảng dữ liệu: */

    public function UserGetAll() {
        $getAll = $this->connect->prepare("select * from user");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

    /* Phương thức UserAdd: thêm người dùng */

    public function UserAdd($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai) {
        $add = $this->connect->prepare("INSERT INTO user(username, password, hoten, gioitinh, ngaysinh, diachi, dienthoai) VALUES(?,?,?,?,?,?,?)");
        $add->execute(array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai));
        return $add->rowCount();
    }

    /* Phương thức UserDelete: xóa người dùng */

    public function UserDelete($iduser) {
        $del = $this->connect->prepare("delete from user where iduser=?");
        $del->execute(array($iduser));
        return $del->rowCount();
    }

    /* Phương thức UserUpdate: cập nhật dữ liệu người dùng */

    public function UserUpdate($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser) {
        $update = $this->connect->prepare("UPDATE user SET username = ?, password = ?, hoten = ?, gioitinh = ?, ngaysinh = ?, diachi = ?, dienthoai = ? WHERE iduser = ?");
        $update->execute(array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser));
        return $update->rowCount();
    }

    /* Phương thức UserGetbyId: chọn thông tin user bằng id */

    public function UserGetbyId($iduser) {
        $getTk = $this->connect->prepare("select * from user where iduser=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($iduser));
        return $getTk->fetch();
    }

    /* Phương thức UserSetPassword: set password người dùng */

    public function UserSetPassword($iduser, $password) {
        $update = $this->connect->prepare("update user set password=? where iduser=?");
        $update->execute(array($password, $iduser));
        return $update->rowCount();
    }

    /* Phương thức UserSetActive: khóa tài khoản người dùng */

    public function UserSetActive($iduser, $ability) {
        $update = $this->connect->prepare("update user set ability=? where iduser=?");
        $update->execute(array($ability, $iduser));
        return $update->rowCount();
    }

    /* Phương thức UserChangePassword: đổi password người dùng */

    public function UserChangePassword($username, $passwordold, $passwordnew) {
        $selectMK = $this->connect->prepare("select password from user where username=?");
        $selectMK->setFetchMode(PDO::FETCH_OBJ);
        $selectMK->execute(array($username));
        if (count($selectMK->fetch()) == 1) {
            $temp = $selectMK->fetch();
            if ($passwordold == $temp->password) {
                $update = $this->connect->prepare("update user set password=? where username=?");
                $update->execute(array($passwordnew, $username));
                return $update->rowCount();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
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
}

?>