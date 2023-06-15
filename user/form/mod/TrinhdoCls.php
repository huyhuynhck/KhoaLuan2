<?php

$a = '../form/mod/database.php';
$h = './form/mod/database.php';
$t = './form/mod/database.php';
$s = '../../form/mod/database.php';
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
    $f = '../form/mod/database.php';
}
require_once $f;

class trinhdo extends database {
    
    /* Phương thức trinhdoCheckUser:kiểm tra tồn tại name */

    public function TrinhdoCheckname($ten_trinhdo) {
        $select = $this->connect->prepare("select * from trinhdo where ten_trinhdo = ?");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($ten_trinhdo));
        if (count($select->fetchAll()) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* Phương thức trinhdoGetAll: lấy tất cả mẩu tin trong bảng cán bộ trả về mảng dữ liệu: */

    public function TrinhdoGetAll() {
        $getAll = $this->connect->prepare("select * from trinhdo");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

    /* Phương thức trinhdoAdd: thêm người dùng */

    public function TrinhdoAdd($ma_trinhdo, $ten_trinhdo, $mota) {
        $add = $this->connect->prepare("INSERT INTO trinhdo(ma_trinhdo, ten_trinhdo, mota) VALUES(?,?,?)");
        $add->execute(array($ma_trinhdo, $ten_trinhdo, $mota));
        return $add->rowCount();
    }

    /* Phương thức trinhdoDelete: xóa người dùng */

    public function TrinhdoDelete($id_trinhdo) {
        $del = $this->connect->prepare("delete from trinhdo where id_trinhdo=?");
        $del->execute(array($id_trinhdo));
        return $del->rowCount();
    }

    /* Phương thức trinhdoUpdate: cập nhật dữ liệu người dùng */

    public function TrinhdoUpdate($ma_trinhdo, $ten_trinhdo, $mota, $id_trinhdo) {
        $update = $this->connect->prepare("UPDATE trinhdo SET ma_trinhdo = ?, ten_trinhdo=?, mota=? WHERE id_trinhdo=?");
        $update->execute(array($ma_trinhdo, $ten_trinhdo, $mota, $id_trinhdo));
        return $update->rowCount();
    }

    /* Phương thức trinhdoGetbyId: chọn thông tin cán bộ bằng id */

    public function TrinhdoGetbyId($id_trinhdo) {
        $getTk = $this->connect->prepare("select * from trinhdo where id_trinhdo=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($id_trinhdo));
        return $getTk->fetch();
    }
    /* Đếm dữ liệu trong DB*/
    public function TrinhdoCount() {
        $getAll = $this->connect->prepare("select * from trinhdo");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        $list = $getAll->fetchAll();
        return count($list);
    }
}

?>