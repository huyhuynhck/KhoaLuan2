<?php

$a = '../administrator/element/mod/database.php';
$h = './element/mod/database.php';
$t = './administrator/element/mod/database.php';
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
    $f = '../element/mod/database.php';
}
require_once $f;

class phanloai extends database {
    
    /* Phương thức phanloaiCheckname:kiểm tra tồn tại name */

    public function PhanloaiCheckname($ten_phan_loai) {
        $select = $this->connect->prepare("select * from phanloai where ten_phan_loai = ?");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($ten_phan_loai));
        if (count($select->fetchAll()) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* Phương thức phanloaiGetAll: lấy tất cả mẩu tin trong bảng cán bộ trả về mảng dữ liệu: */

    public function PhanloaiGetAll() {
        $getAll = $this->connect->prepare("select * from phanloai");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

    /* Phương thức phanloaiAdd: thêm người dùng */

    public function PhanloaiAdd($ten_phan_loai, $ghi_chu) {
        $add = $this->connect->prepare("INSERT INTO phanloai(ten_phan_loai, ghi_chu) VALUES(?,?)");
        $add->execute(array($ten_phan_loai, $ghi_chu));
        return $add->rowCount();
    }

    /* Phương thức phanloaiDelete: xóa người dùng */

    public function PhanloaiDelete($id_phan_loai) {
        $del = $this->connect->prepare("delete from phanloai where id_phan_loai=?");
        $del->execute(array($id_phan_loai));
        return $del->rowCount();
    }

    /* Phương thức phanloaiUpdate: cập nhật dữ liệu người dùng */

    public function PhanloaiUpdate($ten_phanloai, $ghi_chu) {
        $update = $this->connect->prepare("UPDATE phanloai SET ten_phanloai=?, ghi_chu=?");
        $update->execute(array($ten_phanloai, $ghi_chu));
        return $update->rowCount();
    }

    /* Phương thức phanloaiGetbyId: chọn thông tin cán bộ bằng id */

    public function phanloai__Get_By_Id($id_phan_loai) {
        $getTk = $this->connect->prepare("SELECT * from phanloai where id_phan_loai=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($id_phan_loai));
        return $getTk->fetch();
    }
    public function phanloai__GetName_By_Id($id_phan_loai) {
        $getTk = $this->connect->prepare("SELECT ten_phan_loai from phanloai where id_phan_loai=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($id_phan_loai));
        return $getTk->fetch();
    }
}

?>