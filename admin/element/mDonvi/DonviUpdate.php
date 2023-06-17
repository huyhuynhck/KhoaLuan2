<div>Cập nhật Đơn vị</div>
<?php
require './element/mod/DonviCls.php';
$id_donvi = $_GET['id_donvi'];
$donvi = new donvi();
$getdonvi = $donvi->DonviGetbyId($id_donvi);
?>
<div class="title_user">Đơn vị mới</div>
<div class="content_user">
    <form name="updatedonvi" id="formupdate" method="post" action="./element/mDonvi/DonviAct.php?reqact=updatedonvi">
        <div class="form">
            <input required class="form-control" type="text" name="id_donvi" value="<?php echo $getdonvi->id_donvi; ?>">
            <div class="form-group">
                <label>Mã đơn vị:</label>
                <input required class="form-control" type="text" name="ma_donvi" value="<?php echo $getdonvi->ma_donvi; ?>">
            </div>
            <div class="form-group">
                <label>Tên đơn vị:</label>
                <input required class="form-control" type="text" name="ten_donvi" value="<?php echo $getdonvi->ten_donvi; ?>">
            </div>
            <div class="form-group">
                <label>Mô tả:</label>
                <input required class="form-control" type="text" name="mota" value="<?php echo $getdonvi->mota; ?>">
            </div>
            <div class="form-group mt-2">
                <input class="btn btn-success" type="submit" value="Cập nhật" id="btnsubmit">
                <input class="btn btn-secondary" type="reset" value="Làm lại"><b id="noteForm"></b>
            </div>
        </div>
    </form>
</div>