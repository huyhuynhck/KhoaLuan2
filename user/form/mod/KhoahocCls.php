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

class khoahoc extends database {
    
    /* Phương thức KhoahocCheckUser:kiểm tra tồn tại name */

    public function KhoahocCheckname($ten_khoahoc) {
        $select = $this->connect->prepare("select * from khoahoc where ten_khoahoc = ?");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($ten_khoahoc));
        if (count($select->fetchAll()) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* Phương thức KhoahocGetAll: lấy tất cả mẩu tin trong bảng cán bộ trả về mảng dữ liệu: */

    public function KhoahocGetAll() {
        $getAll = $this->connect->prepare("select * from khoahoc");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

    /* Phương thức KhoahocAdd: thêm khoá học */

    public function KhoahocAdd($ten_khoahoc, $mota) {
        $add = $this->connect->prepare("INSERT INTO khoahoc(ten_khoahoc, mota) VALUES(?,?)");
        $add->execute(array($ten_khoahoc, $mota));
        return $add->rowCount();
    }

    /* Phương thức KhoahocDelete: xóa khoá học */

    public function KhoahocDelete($id_khoahoc) {
        $del = $this->connect->prepare("delete from khoahoc where id_khoahoc=?");
        $del->execute(array($id_khoahoc));
        return $del->rowCount();
    }

    /* Phương thức KhoahocUpdate: cập nhật dữ liệu khoá học */

    public function KhoahocUpdate($ten_khoahoc, $mota, $id_khoahoc) {
        $update = $this->connect->prepare("UPDATE khoahoc SET ten_khoahoc=?, mota=?, id_khoahoc=?");
        $update->execute(array($ten_khoahoc, $mota, $id_khoahoc));
        return $update->rowCount();
    }

    /* Phương thức KhoahocGetbyId: chọn thông tin khoá học bằng id */

    public function KhoahocGetbyId($id_khoahoc) {
        $getTk = $this->connect->prepare("select * from khoahoc where id_khoahoc=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($id_khoahoc));
        return $getTk->fetch();
    }
    /* Đếm dữ liệu trong DB*/
    public function KhoahocCount() {
        $getAll = $this->connect->prepare("select * from khoahoc");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        $list = $getAll->fetchAll();
        return count($list);
    }
}

?>