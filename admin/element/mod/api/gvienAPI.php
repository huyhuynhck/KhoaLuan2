<?php
try {
    $connect = new PDO("mysql:host=localhost; dbname=khoaluan; charset=utf8", "root","");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
} catch (PDOException $exc) {
    echo $exc->getMessage();
}


if(isset($action)) {
    $action = $_POST('action');
} else {
    $sql = "select * from giangvien";
    $select = $connect->prepare($sql);
    $select->execute();
    $list = $select->fetchAll();
    echo json_encode($list);
}

?>