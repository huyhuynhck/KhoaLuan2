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

class loaigiangday extends database {
    

    /* Phương thức LoaiGetAll: lấy tất cả mẩu tin trong bảng cán bộ trả về mảng dữ liệu: */

    public function LoaiGDGetAll() {
        $getAll = $this->connect->prepare("select * from loaigiangday");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }


    /* Phương thức LoaiGetbyId: chọn thông tin cán bộ bằng id */

    public function LoaiGDGetbyId($ma_loaigiangday) {
        $getTk = $this->connect->prepare("select * from loaigiangday where ma_loaigiangday=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($ma_loaigiangday));
        return $getTk->fetch();
    }
    
}

?>