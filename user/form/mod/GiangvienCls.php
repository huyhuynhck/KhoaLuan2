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

class giangvien extends database {
    
    /* Phương thức GiangvienCheckUser:kiểm tra tồn tại name */

    public function GiangvienCheckname($ten_giangvien) {
        $select = $this->connect->prepare("select * from giangvien where ten_giangvien = ?");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($username));
        if (count($select->fetchAll()) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* Phương thức GiangvienGetAll: lấy tất cả mẩu tin trong bảng cán bộ trả về mảng dữ liệu: */

    public function GiangvienGetAll() {
        $getAll = $this->connect->prepare("select * from giangvien");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

    /* Phương thức GiangvienAdd: thêm giảng viên */

    public function GiangvienAdd($ma_giangvien, $ten_giangvien, $gioitinh, $ngaysinh, $email, $sodienthoai1, $diachithuongtru,  $id_trinhdo, $id_donvi) {
        $add = $this->connect->prepare("INSERT INTO giangvien(ma_giangvien, ten_giangvien, gioitinh, ngaysinh, email, sodienthoai1, diachithuongtru, id_trinhdo, id_donvi) VALUES(?,?,?,?,?,?,?,?,?)");
        $add->execute(array($ma_giangvien, $ten_giangvien, $gioitinh, $ngaysinh, $email, $sodienthoai1, $diachithuongtru, $id_trinhdo, $id_donvi));
        return $add->rowCount();
    }

    /* Phương thức GiangvienDelete: xóa giảng viên */

    public function GiangvienDelete($id_giangvien) {
        $del = $this->connect->prepare("delete from giangvien where id_giangvien=?");
        $del->execute(array($id_giangvien));
        return $del->rowCount();
    }

    /* Phương thức GiangvienUpdate: cập nhật dữ liệu giảng viên */

    public function GiangvienUpdate($ma_giangvien, $ten_giangvien, $gioitinh, $ngaysinh, $email, $sodienthoai1, $diachithuongtru, $id_trinhdo, $id_donvi, $id_giangvien) {
        $update = $this->connect->prepare("UPDATE giangvien SET ma_giangvien = ?, ten_giangvien = ?, gioitinh = ?, ngaysinh = ?, email = ?, sodienthoai1 = ?, diachithuongtru=?, id_trinhdo=?, id_donvi=? WHERE id_giangvien = ?");
        $update->execute(array($ma_giangvien, $ten_giangvien, $gioitinh, $ngaysinh, $email, $sodienthoai1, $diachithuongtru, $id_trinhdo, $id_donvi, $id_giangvien));
        return $update->rowCount();
    }

    /* Phương thức GiangvienGetbyId: chọn thông tin giảng viên bằng id */

    public function GiangvienGetbyId($id_giangvien) {
        $getTk = $this->connect->prepare("select * from giangvien where id_giangvien=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($id_giangvien));
        return $getTk->fetch();
    }
    /* Đếm dữ liệu trong DB*/
    public function GiangvienCount() {
        $getAll = $this->connect->prepare("select * from giangvien");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        $list = $getAll->fetchAll();
        return count($list);
    }
    public function GiangvienGetName() {
        $getAll = $this->connect->prepare("SELECT * from giangvien, trinhdo, donvi where giangvien.id_trinhdo=trinhdo.id_trinhdo and giangvien.id_donvi=donvi.id_donvi");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }
}

?>