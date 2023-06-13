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

class congviec extends database {
    

    /* Phương thức CongviecGetAll: lấy tất cả mẩu tin trong bảng cán bộ trả về mảng dữ liệu: */

    public function CongviecGetAll() {
        $getAll = $this->connect->prepare("select * from congviec");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

    /* Phương thức CongviecAdd: thêm người dùng */

    public function CongviecAdd($ten_cv, $dieukien, $quydoisotiet, $soluong, $ghichu) {
        $add = $this->connect->prepare("INSERT INTO congviec(ten_cv, dieukien, quydoisotiet, soluong, ghichu) VALUES(?,?,?,?,?)");
        $add->execute(array($ten_cv, $dieukien, $quydoisotiet, $soluong, $ghichu));
        return $add->rowCount();
    }

    /* Phương thức CongviecDelete: xóa người dùng */

    public function CongviecDelete($ma_cv) {
        $del = $this->connect->prepare("delete from congviec where ma_cv=?");
        $del->execute(array($ma_cv));
        return $del->rowCount();
    }

    /* Phương thức CongviecUpdate: cập nhật dữ liệu người dùng */

    public function CongviecUpdate($ten_cv, $dieukien, $quydoisotiet, $soluong, $ghichu, $ma_cv) {
        $update = $this->connect->prepare("UPDATE congviec SET ten_cv=?, dieukien=?, quydoisotiet=?, soluong=?, ghichu=? WHERE ma_cv=?");
        $update->execute(array($ten_cv, $dieukien, $quydoisotiet, $soluong, $ghichu, $ma_cv));
        return $update->rowCount();
    }

    /* Phương thức CongviecGetbyId: chọn thông tin cán bộ bằng ma */

    public function CongviecGetbyId($ma_cv) {
        $getTk = $this->connect->prepare("select * from congviec where ma_cv=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($ma_cv));
        return $getTk->fetch();
    }
    /* Đếm dữ liệu trong DB*/
    public function CongviecCount() {
        $getAll = $this->connect->prepare("select * from congviec");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        $list = $getAll->fetchAll();
        return count($list);
    }
    // public function CongviecGetNamebyId($ma_cv) {
    //     $getTk = $this->connect->prepare("select ten_cv from congviec where ma_cv");
    //     $getTk->setFetchMode(PDO::FETCH_OBJ);
    //     $getTk->execute(array($ma_cv));
    //     return $getTk->fetch();
    // }
    public function CongviecGetName() {
        $getAll = $this->connect->prepare("select ten_cv from congviec where ma_cv");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }
}

?>