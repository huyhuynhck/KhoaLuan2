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

class phannhom extends database {
    
    /* Phương thức phannhomCheckname:kiểm tra tồn tại name */

    public function PhannhomCheckname($ten_phannhom) {
        $select = $this->connect->prepare("select * from phannhom where ten_phannhom = ?");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($ten_phannhom));
        if (count($select->fetchAll()) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* Phương thức phannhomGetAll: lấy tất cả mẩu tin trong bảng cán bộ trả về mảng dữ liệu: */

    public function PhannhomGetAll() {
        $getAll = $this->connect->prepare("select * from phannhom");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

    /* Phương thức phannhomAdd: thêm người dùng */

    public function PhannhomAdd($ten_phannhom, $mota) {
        $add = $this->connect->prepare("INSERT INTO phannhom(ten_phannhom, mota) VALUES(?,?)");
        $add->execute(array($ten_phannhom, $mota));
        return $add->rowCount();
    }

    /* Phương thức phannhomDelete: xóa người dùng */

    public function PhannhomDelete($id_phannhom) {
        $del = $this->connect->prepare("delete from phannhom where id_phannhom=?");
        $del->execute(array($id_phannhom));
        return $del->rowCount();
    }

    /* Phương thức phannhomUpdate: cập nhật dữ liệu người dùng */

    public function PhannhomUpdate($ten_phannhom, $mota) {
        $update = $this->connect->prepare("UPDATE phannhom SET ten_phannhom=?, mota=?");
        $update->execute(array($ten_phannhom, $mota));
        return $update->rowCount();
    }

    /* Phương thức phannhomGetbyId: chọn thông tin cán bộ bằng id */

    public function PhannhomGetbyId($id_phannhom) {
        $getTk = $this->connect->prepare("select * from phannhom where id_phannhom=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($id_phannhom));
        return $getTk->fetch();
    }
}

?>