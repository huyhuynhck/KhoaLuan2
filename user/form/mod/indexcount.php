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

class indexcount extends Database {

   /**
    * It returns all the rows from the table indexcount.
    * 
    * @return An array of objects.
    */
    public function indexcount__Get_All() {
        $obj = $this->connect->prepare("SELECT * FROM indexcount");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute();
        return $obj->fetchAll();
    }
    
   /**
    * It takes 5 parameters, and returns the number of rows affected by the query
    * 
    * @param ten_index the name of the index
    * @param ngay_bat_dau datepicker
    * @param ngay_ket_thuc date
    * @param so_ngay_hoat_dong number of days the index is active
    * @param ghi_chu text
    * 
    * @return The number of rows affected by the last SQL statement.
    */
    public function indexcount__Add($ten_index,$ngay_bat_dau,$ngay_ket_thuc,$so_ngay_hoat_dong,$ghi_chu) {
        $obj = $this->connect->prepare("INSERT INTO indexcount(ten_index,ngay_bat_dau,ngay_ket_thuc,so_ngay_hoat_dong,ghi_chu) VALUES (?,?,?,?,?)");
        $obj->execute(array($ten_index,$ngay_bat_dau,$ngay_ket_thuc,$so_ngay_hoat_dong,$ghi_chu));
        return $obj->rowCount();
    }

    /**
     * It updates the row with the given id_index with the given values
     * 
     * @param id_index the id of the row you want to update
     * @param ten_index the name of the index
     * @param ngay_bat_dau date
     * @param ngay_ket_thuc date
     * @param so_ngay_hoat_dong number of days
     * @param ghi_chu text
     * 
     * @return The number of rows affected by the last SQL statement.
     */
    public function indexcount__Update($id_index, $ten_index,$ngay_bat_dau,$ngay_ket_thuc,$so_ngay_hoat_dong,$ghi_chu) {
        $obj = $this->connect->prepare("UPDATE indexcount SET ten_index=?,ngay_bat_dau=?,ngay_ket_thuc=?, so_ngay_hoat_dong=?,ghi_chu=? WHERE id_index=?");
        $obj->execute(array($ten_index,$ngay_bat_dau,$ngay_ket_thuc,$so_ngay_hoat_dong,$ghi_chu, $id_index));
        return $obj->rowCount();
    }

    /**
     * It deletes a row from the database table indexcount where the id_index is equal to the id_index
     * passed to the function.
     * 
     * @param id_index The id of the index
     * 
     * @return The number of rows affected by the last SQL statement.
     */
    public function indexcount__Delete($id_index) {
        $obj = $this->connect->prepare("DELETE FROM indexcount WHERE id_index = ?");
        $obj->execute(array($id_index));
        return $obj->rowCount();
    }

    /**
     * It returns an array of objects, each object being a row from the database
     * 
     * @param id_index 1
     * 
     * @return An array of objects.
     */
    public function indexcount__Get_By_Id($id_index) {
        $obj = $this->connect->prepare("SELECT * FROM indexcount WHERE id_index = ?");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($id_index));
        return $obj->fetch();
    }
   /**
    * It gets the last index from the database and returns it.
    * 
    * @return The last index number.
    */
    public function indexcount__Get_Last_Index() {
        $obj = $this->connect->prepare("SELECT * FROM indexcount ORDER BY id_index DESC LIMIT 1");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array());
        return $obj->fetch();
    }
    

    public function indexcount__Get_By_Date($day) {
        $obj = $this->connect->prepare("SELECT * from indexcount where DATE(ngay_bat_dau) <= ? and DATE(ngay_ket_thuc) >= ? GROUP BY id_index");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($day,$day));
        return $obj->fetch();
    }    

    public function indexcount__Get_By_Range_Date($day_1,$day_2) {
        $obj = $this->connect->prepare("SELECT * from indexcount where DATE(ngay_bat_dau) <= ? and DATE(ngay_ket_thuc) >= ? GROUP BY id_index");
        $obj->setFetchMode(PDO::FETCH_OBJ);
        $obj->execute(array($day_1,$day_2));
        return $obj->fetch();
    }    
}
?>