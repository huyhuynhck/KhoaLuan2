<?php
try {
    $connect = new PDO("mysql:host=localhost; dbname=khoaluan; charset=utf8", "root","");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
} catch (PDOException $exc) {
    echo $exc->getMessage();
}


if(isset($_POST['action'])) {
    $action = $_POST('action');
    switch($action){
        case "insert":
            $sql = "insert into lophoc(ten_lophoc, mota) values(?,?)";
            $insert = $connect->prepape($sql);
            $data = array($_POST["ten_lophoc"], $_POST["mota"]);
            $kq = $insert->execute($data);
            echo $kq;
            break;
        case "update":
            $sql = "update lophoc set ten_lophoc=?, mota=? where id_lophoc=?";
            $update = $connect->prepape($sql);
            $data = array($_POST["ten_lophoc"], $_POST["mota"], $_POST["id_lophoc"]);
            $kq = $update->execute($data);
            echo $kq;
            break;
        case "delete":
            $sql = "delete from lophoc where id_lophoc=?";
            $delete = $connect->prepape($sql);
            $data = array($_POST["id_lophoc"]);
            $kq = $delete->execute($data);
            echo $kq;
            break;
        default:
            break;
    }

} else {
    $sql = "select * from lophoc";
    $select = $connect->prepare($sql);
    $select->setFetchMode(PDO::FETCH_OBJ);
    $select->execute();
    $list = $select->fetchAll();
    echo json_encode($list);
}

?>