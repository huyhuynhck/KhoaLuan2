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

    public function TaikhoanCheckLogin($ten_taikhoan, $matkhau) {
        $select = $this->connect->prepare("select * from taikhoan where ten_taikhoan = ? and matkhau = ? and ability=0");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($ten_taikhoan, $matkhau));
        if (count($select->fetchAll()) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* Phương thức TaikhoanGetAll: lấy tất cả mẩu tin trong bảng Taikhoan trả về mảng dữ liệu: */

    public function TaikhoanGetAll() {
        $getAll = $this->connect->prepare("select * from taikhoan");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

    /* Phương thức TaikhoanAdd: thêm người dùng */

    public function TaikhoanAdd($ten_taikhoan, $matkhau, $id_canbo) {
        $add = $this->connect->prepare("INSERT INTO taikhoan(ten_taikhoan, matkhau, id_canbo) VALUES(?,?,?)");
        $add->execute(array($ten_taikhoan, $matkhau, $id_canbo));
        return $add->rowCount();
    }

    /* Phương thức TaikhoanDelete: xóa người dùng */

    public function TaikhoanDelete($id_taikhoan) {
        $del = $this->connect->prepare("DELETE from taikhoan where id_taikhoan=?");
        $del->execute(array($id_taikhoan));
        return $del->rowCount();
    }

    /* Phương thức TaikhoanUpdate: cập nhật dữ liệu người dùng */

    public function TaikhoanUpdate($ten_taikhoan, $matkhau, $id_canbo, $id_taikhoan) {
        $update = $this->connect->prepare("UPDATE taikhoan SET ten_taikhoan = ?, matkhau = ?, id_canbo = ? WHERE id_taikhoan = ?");
        $update->execute(array($ten_taikhoan, $matkhau, $id_canbo, $id_taikhoan));
        return $update->rowCount();
    }

    /* Phương thức TaikhoanGetbyId: chọn thông tin Taikhoan bằng id */

    public function TaikhoanGetbyId($id_taikhoan) {
        $getTk = $this->connect->prepare("select * from taikhoan where id_taikhoan=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($id_taikhoan));
        return $getTk->fetch();
    }
    
    public function TaikhoanGetName() {
        $getAll = $this->connect->prepare("SELECT * FROM taikhoan,canbo WHERE taikhoan.id_canbo=canbo.id_canbo;");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }
}

?>