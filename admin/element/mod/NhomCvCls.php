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

class nhomcongviec extends database {
    
    /* Phương thức NhomCvCheckUser:kiểm tra tồn tại name */

    public function NhomCvCheckname($ten_nhomcv) {
        $select = $this->connect->prepare("select * from nhomcongviec where ten_nhomcv = ?");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($ten_nhomcv));
        if (count($select->fetchAll()) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* Phương thức NhomCvGetAll: lấy tất cả mẩu tin trong bảng cán bộ trả về mảng dữ liệu: */

    public function NhomCvGetAll() {
        $getAll = $this->connect->prepare("select * from nhomcongviec");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

    /* Phương thức NhomCvAdd: thêm khoá học */

    public function NhomCvAdd($ten_nhomcv, $ma_cv) {
        $add = $this->connect->prepare("INSERT INTO nhomcongviec(ten_nhomcv, ma_cv) VALUES(?,?)");
        $add->execute(array($ten_nhomcv, $ma_cv));
        return $add->rowCount();
    }

    /* Phương thức NhomCvDelete: xóa khoá học */

    public function NhomCvDelete($ma_nhomcv) {
        $del = $this->connect->prepare("delete from nhomcongviec where ma_nhomcv=?");
        $del->execute(array($ma_nhomcv));
        return $del->rowCount();
    }

    /* Phương thức NhomCvUpdate: cập nhật dữ liệu khoá học */

    public function NhomCvUpdate($ten_nhomcv, $ma_nhomcv) {
        $update = $this->connect->prepare("UPDATE nhomcongviec SET ten_nhomcv=?, ma_nhomcv=?");
        $update->execute(array($ten_nhomcv, $ma_nhomcv));
        return $update->rowCount();
    }

    /* Phương thức NhomCvGetbyId: chọn thông tin khoá học bằng id */

    public function NhomCvGetbyId($ma_nhomcv) {
        $getTk = $this->connect->prepare("select * from nhomcongviec where ma_nhomcv=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($ma_nhomcv));
        return $getTk->fetch();
    }
    /* Đếm dữ liệu trong DB*/
    public function NhomCvCount() {
        $getAll = $this->connect->prepare("select * from nhomcongviec");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        $list = $getAll->fetchAll();
        return count($list);
    }

    // public function NhomCvGetNamebyId($ten_cv) {
    //     $getTk = $this->connect->prepare("select congviec.ten_cv from nhomcongviec, congviec where nhomcongviec.ma_cv=congviec.ma_cv");
    //     $getTk->setFetchMode(PDO::FETCH_OBJ);
    //     $getTk->execute(array($ten_cv));
    //     return $getTk->fetch();
    // }
    public function NhomCvGetName() {
        $getAll = $this->connect->prepare("select congviec.ten_cv, nhomcongviec.ma_nhomcv, ten_nhomcv from nhomcongviec, congviec where nhomcongviec.ma_cv=congviec.ma_cv");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }
}

?>