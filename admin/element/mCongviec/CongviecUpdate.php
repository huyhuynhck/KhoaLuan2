<div>Cập nhật Công việc</div>
<?php
require './element/mod/CongviecCls.php';
$ma_cv = $_GET['ma_cv'];
$cv = new congviec();
$getcv = $cv->CongviecGetbyId($ma_cv);
?>
<div class="title_user">Công việc mới</div>
<div class="content_user">
<form name="updatecv" id="formupdate" method="post" action="./element/mCongviec/CongviecAct.php?reqact=updatecongviec">
<input type="hidden" name="ma_cv" value="<?php echo $ma_cv; ?>"/>
        <div class="form">
            <div class="form-group">
                <label>Tên công việc:</label>
                <input required class='form-control' type="text" name="ten_cv" <?php echo $getcv->ten_cv;?>>
            </div>
            <div class="form-group">
                <label>Điều kiện:</label>
                <input required class='form-control' type="text" name="dieukien"<?php echo $getcv->dieukien;?>>
            </div>
            <div class="form-group">
                <label>Quy đổi số tiết:</label>
                <input required class='form-control' type="text" name="quydoisotiet"<?php echo $getcv->quydoisotiet;?>>
            </div>
            <div class="form-group">
                <label>Số lượng:</label>
                <input required class='form-control' type="text" name="soluong"<?php echo $getcv->soluong;?>>
            </div>
            <div class="form-group">
                <label>Ghi chú:</label>
                <input required class='form-control' type="text" name="ghichu"<?php echo $getcv->ghichu;?>>
            </div>
            
        
            <div class="form-group mt-2">
                <input require class="btn btn-success" type="submit" value="Cập nhật" id="btnsubmit">
                <input require class="btn btn-secondary" type="reset" value="Làm lại"/><b id="noteForm"></b>
            </div>
        </div>    
    </form>

</div>