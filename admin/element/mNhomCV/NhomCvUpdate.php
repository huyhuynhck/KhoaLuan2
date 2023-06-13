<div>Cập nhật nhÓm công việc</div>
<?php
require './element/mod/NhomCvCls.php';
$ma_nhomcv = $_GET['ma_nhomcv'];
$nhomcv = new nhomcv();
$getnhomcv = $nhomcv->NhomCvGetbyId($ma_nhomcv);
?>
<div class="title_user">Khoá học mới</div>
<div class="content_user">
    <form name="updatenhomcv" id="formupdate" method="post" action="./element/mNhomCv/NhomCvAct.php?reqact=updatenhomcv">
        
        <div class="form">
            <div class="form-group">
                <label>Id khoá học:</label>
                <input required class="form-control" type="text" name="ma_nhomcv" value="<?php echo $getnhomcv->ma_nhomcv;?>">
            </div>
            <div class="form-group">
                <label>Tên khoá học:</label>
                <input required class="form-control" type="text" name="ten_nhomcv" value="<?php echo $getnhomcv->ten_nhomcv; ?>">
            </div>
            <div class="form-group">
                <label>Mô tả:</label>
                <input required class="form-control" type="text" name="mota" value="<?php echo $getnhomcv->mota; ?>">
            </div>
            <div class="form-group mt-2">
                <input type="submit" value="Cập nhật" id="btnsubmit">
                <input type="reset" value="Làm lại"><b id="noteForm"></b>
            </div>
        </div>
    </form>
</div>