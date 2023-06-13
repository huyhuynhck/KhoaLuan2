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

class phanquyen extends database {
    
    /* Phương thức phanquyenCheckname:kiểm tra tồn tại name */

    public function PhanquyenCheckname($ten_phanquyen) {
        $select = $this->connect->prepare("select * from phanquyen where ten_phanquyen = ?");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($ten_phanquyen));
        if (count($select->fetchAll()) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* Phương thức phanquyenGetAll: lấy tất cả mẩu tin trong bảng cán bộ trả về mảng dữ liệu: */

    public function PhanquyenGetAll() {
        $getAll = $this->connect->prepare("select * from phanquyen");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

    /* Phương thức phanquyenAdd: thêm người dùng */

    public function PhanquyenAdd($ten_phanquyen, $mota) {
        $add = $this->connect->prepare("INSERT INTO phanquyen(ten_phanquyen, mota) VALUES(?,?)");
        $add->execute(array($ten_phanquyen, $mota));
        return $add->rowCount();
    }

    /* Phương thức phanquyenDelete: xóa người dùng */

    public function PhanquyenDelete($id_phanquyen) {
        $del = $this->connect->prepare("delete from phanquyen where id_phanquyen=?");
        $del->execute(array($id_phanquyen));
        return $del->rowCount();
    }

    /* Phương thức phanquyenUpdate: cập nhật dữ liệu người dùng */

    public function PhanquyenUpdate($ten_phanquyen, $mota) {
        $update = $this->connect->prepare("UPDATE phanquyen SET ten_phanquyen=?, mota=?");
        $update->execute(array($ten_phanquyen, $mota));
        return $update->rowCount();
    }

    /* Phương thức phanquyenGetbyId: chọn thông tin cán bộ bằng id */

    public function PhanquyenGetbyId($id_phanquyen) {
        $getTk = $this->connect->prepare("select * from phanquyen where id_phanquyen=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($id_phanquyen));
        return $getTk->fetch();
    }
}

?>