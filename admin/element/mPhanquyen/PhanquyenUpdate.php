<div>Cập nhật lớp học</div>
<hr>
<?php
require './element/mod/PhanquyenCls.php';
$id_phanquyen = $_GET['id_phanquyen'];
$phanquyen = new phanquyen();
$getphanquyen = $phanquyen->PhanquyenGetbyId($id_phanquyen);
?>

<div class="content_user">
    <form name="updatephanquyen" id="formupdate" method="post" action="./element/mphanquyen/phanquyenAct.php?reqact=updatephanquyen">
    <input type="hidden" name="id_phanquyen" value="<?php echo $id_phanquyen; ?>"/>
        <div class="form">
            <div class="form-group">
                <label>Tên lớp học:</label>
                <input required class="form-control" type="text" name="ten_phanquyen" value="<?php echo $getphanquyen->ten_phanquyen; ?>">
            </div>
            <div class="form-group">
                <label>Mô tả:</label>
                <input class="form-control" type="text" name="mota" value="<?php echo $getphanquyen->mota; ?>">
            </div>
            <div class="form-group mt-2">
                <input class='btn btn-success' type="submit" value="Cập nhật" id="btnsubmit">
                <input class='btn btn-secondary' type="reset" value="Làm lại"><b id="noteForm"></b>
            </div>
        </div>
    </form>
</div>