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

class nganhhoc extends database {
    
    /* Phương thức nganhhocCheckname:kiểm tra tồn tại name */

    public function NganhhocCheckname($ten_nganhhoc) {
        $select = $this->connect->prepare("select * from nganhhoc where ten_nganhhoc = ?");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($ten_nganhhoc));
        if (count($select->fetchAll()) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* Phương thức nganhhocGetAll: lấy tất cả mẩu tin trong bảng cán bộ trả về mảng dữ liệu: */

    public function NganhhocGetAll() {
        $getAll = $this->connect->prepare("select * from nganhhoc");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

    /* Phương thức nganhhocAdd: thêm người dùng */

    public function NganhhocAdd($ten_nganhhoc, $mota) {
        $add = $this->connect->prepare("INSERT INTO nganhhoc(ten_nganhhoc, mota) VALUES(?,?)");
        $add->execute(array($ten_nganhhoc, $mota));
        return $add->rowCount();
    }

    /* Phương thức NganhhocDelete: xóa người dùng */

    public function nganhhocDelete($id_nganhhoc) {
        $del = $this->connect->prepare("delete from nganhhoc where id_nganhhoc=?");
        $del->execute(array($id_nganhhoc));
        return $del->rowCount();
    }

    /* Phương thức nganhhocUpdate: cập nhật dữ liệu người dùng */

    public function NganhhocUpdate($ten_nganhhoc, $mota) {
        $update = $this->connect->prepare("UPDATE nganhhoc SET ten_nganhhoc=?, mota=?");
        $update->execute(array($ten_nganhhoc, $mota));
        return $update->rowCount();
    }

    /* Phương thức nganhhocGetbyId: chọn thông tin cán bộ bằng id */

    public function NganhhocGetbyId($id_nganhhoc) {
        $getTk = $this->connect->prepare("select * from nganhhoc where id_nganhhoc=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($id_nganhhoc));
        return $getTk->fetch();
    }
    /* Đếm dữ liệu trong DB*/
    public function NganhhocCount() {
        $getAll = $this->connect->prepare("select * from nganhhoc");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        $list = $getAll->fetchAll();
        return count($list);
    }
}

?>