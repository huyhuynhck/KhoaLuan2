<div>Cập nhật khoá học</div>
<?php
require './element/mod/KhoahocCls.php';
$id_khoahoc = $_GET['id_khoahoc'];
$khoahoc = new khoahoc();
$getkhoahoc = $khoahoc->KhoahocGetbyId($id_khoahoc);
?>
<div class="title_user">Khoá học mới</div>
<div class="content_user">
    <form name="updatekhoahoc" id="formupdate" method="post" action="./element/mKhoahoc/KhoahocAct.php?reqact=updatekhoahoc">
        
        <div class="form">
            <div class="form-group">
                <label>Tên khoá học:</label>
                <input required class="form-control" type="text" name="ten_khoahoc" value="<?php echo $getkhoahoc->ten_khoahoc; ?>">
            </div>
            <div class="form-group">
                <label>Mô tả:</label>
                <input required class="form-control" type="text" name="mota" value="<?php echo $getkhoahoc->mota; ?>">
            </div>
            <div class="form-group mt-2">
                <input class="btn btn-success" type="submit" value="Cập nhật" id="btnsubmit">
                <input class="btn btn-secondary" type="reset" value="Làm lại"><b id="noteForm"></b>
            </div>
        </div>
    </form>
</div>