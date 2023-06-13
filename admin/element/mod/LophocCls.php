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

class lophoc extends database {
    
    /* Phương thức LophocCheckname:kiểm tra tồn tại name */

    public function LophocCheckname($ten_lophoc) {
        $select = $this->connect->prepare("select * from lophoc where ten_lophoc = ?");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($ten_lophoc));
        if (count($select->fetchAll()) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* Phương thức LophocGetAll: lấy tất cả mẩu tin trong bảng cán bộ trả về mảng dữ liệu: */

    public function LophocGetAll() {
        $getAll = $this->connect->prepare("select * from lophoc");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

    /* Phương thức LophocAdd: thêm người dùng */

    public function LophocAdd($ten_lophoc, $mota, $id_khoahoc, $id_nganhhoc) {
        $add = $this->connect->prepare("INSERT INTO lophoc(ten_lophoc, mota, id_khoahoc, id_nganhhoc) VALUES(?,?,?,?)");
        $add->execute(array($ten_lophoc, $mota, $id_khoahoc, $id_nganhhoc));
        return $add->rowCount();
    }

    /* Phương thức LophocDelete: xóa người dùng */

    public function LophocDelete($id_lophoc) {
        $del = $this->connect->prepare("delete from lophoc where id_lophoc=?");
        $del->execute(array($id_lophoc));
        return $del->rowCount();
    }

    /* Phương thức LophocUpdate: cập nhật dữ liệu người dùng */

    public function LophocUpdate($ten_lophoc, $mota, $id_khoahoc, $id_nganhhoc, $id_lophoc) {
        $update = $this->connect->prepare("UPDATE lophoc SET ten_lophoc=?, mota=?, id_khoahoc=?, id_nganhhoc=? WHERE id_lophoc=?");
        $update->execute(array($ten_lophoc, $mota, $id_khoahoc, $id_nganhhoc, $id_lophoc));
        return $update->rowCount();
    }

    /* Phương thức LophocGetbyId: chọn thông tin cán bộ bằng id */

    public function LophocGetbyId($id_lophoc) {
        $getTk = $this->connect->prepare("select * from lophoc where id_lophoc=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($id_lophoc));
        return $getTk->fetch();
    }
    /* Đếm dữ liệu trong DB*/
    public function LophocCount() {
        $getAll = $this->connect->prepare("select * from lophoc");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        $list = $getAll->fetchAll();
        return count($list);
    }
    
    public function LophocGetName() {
        $getAll = $this->connect->prepare("SELECT * from lophoc, khoahoc, nganhhoc where lophoc.id_khoahoc=khoahoc.id_khoahoc and lophoc.id_nganhhoc=nganhhoc.id_nganhhoc");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }
}

?>