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

class canbo extends database {
    
    /* Phương thức CanboCheckUser:kiểm tra tồn tại name */

    public function CanboCheckname($ten_canbo) {
        $select = $this->connect->prepare("select * from canbo where ten_canbo = ?");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($username));
        if (count($select->fetchAll()) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /* Phương thức CanboGetAll: lấy tất cả mẩu tin trong bảng cán bộ trả về mảng dữ liệu: */

    public function CanboGetAll() {
        $getAll = $this->connect->prepare("select * from canbo");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

    /* Phương thức CanboAdd: thêm người dùng */

    public function CanboAdd($ma_canbo, $ten_canbo, $gioitinh, $ngaysinh, $email, $sodienthoai1, $diachithuongtru, $ngay_vao_lam, $id_trinhdo, $id_donvi, $id_phan_loai) {
        $add = $this->connect->prepare("INSERT INTO canbo(ma_canbo, ten_canbo, gioitinh, ngaysinh, email, sodienthoai1, diachithuongtru, ngay_vao_lam, id_trinhdo, id_donvi, id_phan_loai) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
        $add->execute(array($ma_canbo, $ten_canbo, $gioitinh, $ngaysinh, $email, $sodienthoai1, $diachithuongtru, $ngay_vao_lam, $id_trinhdo, $id_donvi, $id_phan_loai));
        return $add->rowCount();
    }

    /* Phương thức CanboDelete: xóa người dùng */

    public function CanboDelete($id_canbo) {
        $del = $this->connect->prepare("delete from canbo where id_canbo=?");
        $del->execute(array($id_canbo));
        return $del->rowCount();
    }

    /* Phương thức CanboUpdate: cập nhật dữ liệu người dùng */

    public function CanboUpdate($ma_canbo, $ten_canbo, $gioitinh, $ngaysinh, $email, $sodienthoai1, $diachithuongtru, $ngay_vao_lam, $id_trinhdo, $id_donvi, $id_phan_loai, $id_canbo) {
        $update = $this->connect->prepare("UPDATE canbo SET ma_canbo = ?, ten_canbo = ?, gioitinh = ?, ngaysinh = ?, email = ?, sodienthoai1 = ?, diachithuongtru = ?, ngay_vao_lam = ?, id_trinhdo = ?, id_donvi = ?, id_phan_loai = ? WHERE id_canbo=?");
        $update->execute(array($ma_canbo, $ten_canbo, $gioitinh, $ngaysinh, $email, $sodienthoai1, $diachithuongtru, $ngay_vao_lam, $id_trinhdo, $id_donvi, $id_phan_loai, $id_canbo));
        return $update->rowCount();
    }

    /* Phương thức CanboGetbyId: chọn thông tin cán bộ bằng id */

    public function CanboGetbyId($id_canbo) {
        $getTk = $this->connect->prepare("select * from canbo where id_canbo=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($id_canbo));
        return $getTk->fetch();
    }
    /* Đếm dữ liệu trong DB*/
    public function CanboCount() {
        $getAll = $this->connect->prepare("select * from canbo");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        $list = $getAll->fetchAll();
        return count($list);
    }
    
    public function CanboGetName() {
        $getAll = $this->connect->prepare("SELECT * from canbo, trinhdo, donvi, phanloai where canbo.id_trinhdo=trinhdo.id_trinhdo and canbo.id_donvi=donvi.id_donvi and canbo.id_phan_loai=phanloai.id_phan_loai");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }
}

?>