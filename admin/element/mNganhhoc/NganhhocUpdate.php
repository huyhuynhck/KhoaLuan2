<div>Cập nhật lớp học</div>
<?php
require './element/mod/NganhhocCls.php';
$id_nganhhoc = $_GET['id_nganhhoc'];
$nganhhoc = new nganhhoc();
$getnganhhoc = $nganhhoc->NganhhocGetbyId($id_nganhhoc);
?>
<div class="title_user">Lớp học mới</div>
<div class="content_user">
    <form name="updatenganhhoc" id="formupdate" method="post" action="./element/mNganhhoc/NganhhocAct.php?reqact=updatenganhhoc">
        <div class="form">
            <div class="form-group">
                <label>Tên lớp học:</label>
                <input required class="form-control" type="text" name="ten_nganhhoc" value="<?php echo $getnganhhoc->ten_nganhhoc; ?>">
            </div>
            <div class="form-group">
                <label>Mô tả:</label>
                <input required class="form-control" type="text" name="mota" value="<?php echo $getnganhhoc->mota; ?>">
            </div>
            <div class="form-group mt-2">
                <input class='btn btn-success' type="submit" value="Cập nhật" id="btnsubmit">
                <input class='btn btn-secondary' type="reset" value="Làm lại"><b id="noteForm"></b>
            </div>
        </div>
    </form>
</div>