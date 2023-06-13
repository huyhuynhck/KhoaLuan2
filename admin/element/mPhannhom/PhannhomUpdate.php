<div>Cập nhật lớp học</div>
<?php
require './element/mod/PhannhomCls.php';
$id_phannhom = $_GET['id_phannhom'];
$phannhom = new phannhom();
$getphannhom = $phannhom->PhannhomGetbyId($id_phannhom);
?>
<div class="title_user">Lớp học mới</div>
<div class="content_user">
    <form name="updatephannhom" id="formupdate" method="post" action="./element/mPhannhom/PhannhomAct.php?reqact=updatephannhom">
        <div class="form">
            <div class="form-group">
                <label>Tên lớp học:</label>
                <input required class="form-control" type="text" name="ten_phannhom" value="<?php echo $getphannhom->ten_phannhom; ?>">
            </div>
            <div class="form-group">
                <label>Mô tả:</label>
                <input required class="form-control" type="text" name="mota" value="<?php echo $getphannhom->mota; ?>">
            </div>
            <div class="form-group mt-2">
                <input class='btn btn-success' type="submit" value="Cập nhật" id="btnsubmit">
                <input class='btn btn-secondary' type="reset" value="Làm lại"><b id="noteForm"></b>
            </div>
        </div>
    </form>
</div>