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

class canbo extends database {
    

    /* Phương thức CanboGetAll: lấy tất cả mẩu tin trong bảng cán bộ trả về mảng dữ liệu: */

    public function CanboGetAll() {
        $getAll = $this->connect->prepare("select * from canbo");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        return $getAll->fetchAll();
    }

    public function CanboGetName($id_canbo) {
        $getAll = $this->connect->prepare("SELECT * from canbo, trinhdo, donvi, phanloai where canbo.id_trinhdo=trinhdo.id_trinhdo and canbo.id_donvi=donvi.id_donvi and canbo.id_phan_loai=phanloai.id_phan_loai and id_canbo=?");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute(array($id_canbo));
        return $getAll->fetch();
    }
    /* Phương thức CanboGetbyId: chọn thông tin cán bộ bằng id */

    public function CanboGetbyId($id_canbo) {
        $getTk = $this->connect->prepare("SELECT * from canbo where id_canbo=?");
        $getTk->setFetchMode(PDO::FETCH_OBJ);
        $getTk->execute(array($id_canbo));
        return $getTk->fetch();
    }
}

?>