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

class donvi extends database {
    
    /* Phương thức DonviCheckUser:kiểm tra tồn tại name */

    public function DonviCheckname($ten_donvi) {
        $select = $this->connect->prepare("select * from donvi where ten_donvi = ?");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($ten_donvi));
        if (count($select->fetchAll()) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* Phương thức DonviGetAll: lấy tất cả mẩu tin trong bảng cán bộ trả về mảng dữ liệu: */

    public function DonviGetAll() {
        $getAll = $this->connect->prepare("select * from donvi");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

    /* Phương thức DonviAdd: thêm người dùng */

    public function DonviAdd($ma_donvi, $ten_donvi, $mota) {
        $add = $this->connect->prepare("INSERT INTO donvi(ma_donvi, ten_donvi, mota) VALUES(?,?,?)");
        $add->execute(array($ma_donvi, $ten_donvi, $mota));
        return $add->rowCount();
    }

    /* Phương thức DonviDelete: xóa người dùng */

    public function DonviDelete($id_donvi) {
        $del = $this->connect->prepare("delete from donvi where id_donvi=?");
        $del->execute(array($id_donvi));
        return $del->rowCount();
    }

    /* Phương thức DonviUpdate: cập nhật dữ liệu người dùng */

    public function DonviUpdate($ma_donvi, $ten_donvi, $mota, $id_donvi) {
        $update = $this->connect->prepare("UPDATE donvi SET ma_donvi = ?, ten_donvi=?, mota=?, id_donvi=?");
        $update->execute(array($ma_donvi, $ten_donvi, $mota, $id_donvi));
        return $update->rowCount();
    }

    /* Phương thức DonviGetbyId: chọn thông tin cán bộ bằng id */

    public function DonviGetbyId($id_donvi) {
        $getTk = $this->connect->prepare("select * from donvi where id_donvi=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($id_donvi));
        return $getTk->fetch();
    }
    /* Đếm dữ liệu trong DB*/
    public function DonviCount() {
        $getAll = $this->connect->prepare("select * from donvi");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        $list = $getAll->fetchAll();
        return count($list);
    }
}


?>