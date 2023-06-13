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
    $f = '../element/mod/database.php';
}
require_once $f;

class giangday extends database {
    
    /* Phương thức GiangdayCheckUser:kiểm tra tồn tại name */

    // public function GiangdayCheckname($ten_giangvien) {
    //     $select = $this->connect->prepare("select * from giangday where ten_giangvien = ?");
    //     $select->setFetchMode(PDO::FETCH_OBJ);
    //     $select->execute(array($username));
    //     if (count($select->fetchAll()) == 1) {
    //         return TRUE;
    //     } else {
    //         return FALSE;
    //     }
    // }

    /* Phương thức GiangdayGetAll: lấy tất cả mẩu tin trong bảng cán bộ trả về mảng dữ liệu: */

    public function GiangdayGetAll() {
        $getAll = $this->connect->prepare("select * from giangday");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

    /* Phương thức GiangdayAdd: thêm giảng dạy */

    public function GiangdayAdd($sosv, $sonhom, $sotietmonhoc, $sotietthucgiang, $hesolop, $hesotinchi, $tenloai) {
        $add = $this->connect->prepare("INSERT INTO giangday(sosv, sonhom, sotietmonhoc, sotietthucgiang, hesolop, hesotinchi, tenloai) VALUES(?,?,?,?,?,?,?)");
        $add->execute(array($sosv, $sonhom, $sotietmonhoc, $sotietthucgiang, $hesolop, $hesotinchi, $tenloai));
        return $add->rowCount();
    }

    /* Phương thức GiangdayDelete: xóa giảng dạy */

    public function GiangdayDelete($ma_giangday) {
        $del = $this->connect->prepare("delete from giangday where ma_giangday=?");
        $del->execute(array($ma_giangday));
        return $del->rowCount();
    }

    /* Phương thức GiangdayUpdate: cập nhật dữ liệu giảng dạy */

    public function GiangdayUpdate($sosv, $sonhom, $sotietmonhoc, $sotietthucgiang, $hesolop, $hesotinchi, $tenloai, $ma_giangday) {
        $update = $this->connect->prepare("UPDATE giangday SET sosv=?, sonhom=?, sotietmonhoc=?, sotietthucgiang=?, hesolop=?, hesotinchi=?, tenloai=?, ma_giangday=?");
        $update->execute(array($sosv, $sonhom, $sotietmonhoc, $sotietthucgiang, $hesolop, $hesotinchi, $tenloai, $ma_giangday));
        return $update->rowCount();
    }

    /* Phương thức GiangdayGetbyId: chọn thông tin giảng dạy bằng id */

    public function GiangdayGetbyId($ma_giangday) {
        $getTk = $this->connect->prepare("select * from giangday where ma_giangday=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($ma_giangday));
        return $getTk->fetch();
    }
    /* Đếm dữ liệu trong DB*/
    public function GiangdayCount() {
        $getAll = $this->connect->prepare("select * from giangday");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        $list = $getAll->fetchAll();
        return count($list);
    }
}

?>