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

class nhomkpi extends Database {

    public function nhomkpi__Get_All() {
        $obj = $this->connect->prepare("SELECT * FROM nhomkpi");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute();
        return $obj->fetchAll();
    }
    
    public function nhomkpi__Add($ten_nhom_kpi, $ghi_chu) {
        $obj = $this->connect->prepare("INSERT INTO nhomkpi(ten_nhom_kpi, ghi_chu) VALUES(?,?)");
        $obj->execute(array($ten_nhom_kpi, $ghi_chu));
        return $obj->rowCount();
         
    }
    
    public function nhomkpi__Update($id_nhom_kpi, $ten_nhom_kpi, $ghi_chu) {
        $obj = $this->connect->prepare("UPDATE nhomkpi SET ten_nhom_kpi=?, ghi_chu=? WHERE id_nhom_kpi=?");
        $obj->execute(array($ten_nhom_kpi, $ghi_chu, $id_nhom_kpi));
        return $obj->rowCount();
         
    }
    
    public function nhomkpi__Get_By_Id($id_nhom_kpi) {
        $obj = $this->connect->prepare("SELECT * FROM nhomkpi WHERE id_nhom_kpi=?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_nhom_kpi));
        return $obj->fetch();
    }

    public function nhomkpi__Delete($id_nhom_kpi) {
        $obj = $this->connect->prepare("DELETE FROM nhomkpi WHERE id_nhom_kpi=?");
        $obj->execute(array($id_nhom_kpi));
        return $obj->rowCount();
    }
}
?>