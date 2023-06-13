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

class sinhvien extends database {
    
    /* Phương thức sinhvienCheckUser:kiểm tra tồn tại name */

    public function SinhvienCheckname($ten_sinhvien) {
        $select = $this->connect->prepare("select * from sinhvien where ten_sinhvien = ?");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($username));
        if (count($select->fetchAll()) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* Phương thức sinhvienGetAll: lấy tất cả mẩu tin trong bảng cán bộ trả về mảng dữ liệu: */

    public function SinhvienGetAll() {
        $getAll = $this->connect->prepare("select * from sinhvien");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

    /* Phương thức sinhvienAdd: thêm giảng viên */

    public function SinhvienAdd($ma_sinhvien, $ten_sinhvien, $gioitinh, $ngaysinh, $email, $sodienthoai1, $diachithuongtru, $id_lophoc) {
        $add = $this->connect->prepare("INSERT INTO sinhvien(ma_sinhvien, ten_sinhvien, gioitinh, ngaysinh, email, sodienthoai1, diachithuongtru, id_lophoc) VALUES(?,?,?,?,?,?,?,?)");
        $add->execute(array($ma_sinhvien, $ten_sinhvien, $gioitinh, $ngaysinh, $email, $sodienthoai1, $diachithuongtru, $id_lophoc));
        return $add->rowCount();
    }

    /* Phương thức sinhvienDelete: xóa giảng viên */

    public function SinhvienDelete($id_sinhvien) {
        $del = $this->connect->prepare("delete from sinhvien where id_sinhvien=?");
        $del->execute(array($id_sinhvien));
        return $del->rowCount();
    }

    /* Phương thức sinhvienUpdate: cập nhật dữ liệu giảng viên */

    public function SinhvienUpdate($ma_sinhvien, $ten_sinhvien, $gioitinh, $ngaysinh, $email, $sodienthoai1, $diachithuongtru, $id_lophoc, $id_sinhvien) {
        $update = $this->connect->prepare("UPDATE sinhvien SET ma_sinhvien = ?, ten_sinhvien=?, gioitinh=?, ngaysinh=?, email=?, sodienthoai1=?, diachithuongtru=?, id_lophoc=? where id_sinhvien=?");
        $update->execute(array($ma_sinhvien, $ten_sinhvien, $gioitinh, $ngaysinh, $email, $sodienthoai1, $diachithuongtru, $id_lophoc, $id_sinhvien));
        return $update->rowCount();
    }

    /* Phương thức sinhvienGetbyId: chọn thông tin giảng viên bằng id */

    public function SinhvienGetbyId($id_sinhvien) {
        $getTk = $this->connect->prepare("select * from sinhvien where id_sinhvien=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($id_sinhvien));
        return $getTk->fetch();
    }
    /* Đếm dữ liệu trong DB*/
    public function SinhvienCount() {
        $getAll = $this->connect->prepare("select * from sinhvien");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        $list = $getAll->fetchAll();
        return count($list);
    }
}

?>