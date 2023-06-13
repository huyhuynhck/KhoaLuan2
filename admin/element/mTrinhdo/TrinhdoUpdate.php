<div>Cập nhật Trình độ</div>
<?php
require './element/mod/TrinhdoCls.php';
$id_trinhdo = $_GET['id_trinhdo'];
$trinhdo = new trinhdo();
$gettrinhdo = $trinhdo->TrinhdoGetbyId($id_trinhdo);
?>
<div class="title_user">Trình độ mới</div>
<div class="content_user">
    <form name="updatetrinhdo" id="formupdate" method="post" action="./element/mTrinhdo/TrinhdoAct.php?reqact=updatetrinhdo">
        <div class="form">
            <div class="form-group">
                <label>Mã Trình độ:</label>
                <input required class="form-control" type="text" name="ma_trinhdo" value="<?php echo $gettrinhdo->ma_trinhdo; ?>">
            </div>
            <div class="form-group">
                <label>Tên Trình độ:</label>
                <input required class="form-control" type="text" name="ten_trinhdo" value="<?php echo $gettrinhdo->ten_trinhdo; ?>">
            </div>
            <div class="form-group">
                <label>Mô tả:</label>
                <input required class="form-control" type="text" name="mota" value="<?php echo $gettrinhdo->mota; ?>">
            </div>
            <div class="form-group mt-2">
                <input class='btn btn-success' type="submit" value="Cập nhật" id="btnsubmit">
                <input class='btn btn-secondary' type="reset" value="Làm lại"><b id="noteForm"></b>
            </div>
        </div>
    </form>
</div>