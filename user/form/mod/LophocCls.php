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

class lophoc extends database {
    
    /* Phương thức LophocGetAll: lấy tất cả mẩu tin trong bảng cán bộ trả về mảng dữ liệu: */

    public function LophocGetAll() {
        $getAll = $this->connect->prepare("select * from lophoc");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

}

?>