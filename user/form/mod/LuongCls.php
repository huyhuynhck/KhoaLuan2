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

class luong extends database {
    

    /* Phương thức CanboGetAll: lấy tất cả mẩu tin trong bảng cán bộ trả về mảng dữ liệu: */

    public function LuongGetAll() {
        $getAll = $this->connect->prepare("select * from luong");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

    public function LuongGetbyId($id_luong) {
        $getTk = $this->connect->prepare("select * from luong where id_luong=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($id_luong));
        return $getTk->fetch();
    }
}

?>