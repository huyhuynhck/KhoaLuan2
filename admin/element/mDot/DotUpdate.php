<div>Cập nhật Đợt</div>
<?php
require './element/mod/indexcount.php';
$id_index = $_GET['id_index'];
$dot = new indexcount();
$getdot = $dot->indexcount__Get_By_Id($id_index);
?>
<div class="title_user">Đợt mới</div>
<div class="content_user">
    <form name="updatedot" id="formupdate" method="post" action="./element/mDot/DotAct.php?reqact=updatedot">
        <div class="form">
            <input type="hidden" name="id_index" value="<?php echo $getdot->id_index; ?>">
            <div class="form-group">
                <label>Tên Đợt:</label>
                <input required class="form-control" type="text" name="ten_index" value="<?php echo $getdot->ten_index; ?>">
            </div>
            <div class="form-group">
                <label>Ngày bắt đầu:</label>
                <input required class="form-control" type="date" name="ngay_bat_dau" value="<?php echo $getdot->ngay_bat_dau; ?>">
            </div>
            <div class="form-group">
                <label>Ngày kết thúc:</label>
                <input required class="form-control" type="date" name="ngay_ket_thuc" value="<?php echo $getdot->ngay_ket_thuc; ?>">
            </div>
            <div class="form-group">
                <label>Số ngày hoạt động:</label>
                <input required class="form-control" type="number" name="so_ngay_hoat_dong" value="<?php echo $getdot->so_ngay_hoat_dong; ?>">
            </div>
            <div class="form-group">
                <label>Ghi chú:</label>
                <input class="form-control" type="text" name="ghi_chu" value="<?php echo $getdot->ghi_chu; ?>">
            </div>
            <div class="form-group mt-2">
                <input class='btn btn-success' type="submit" value="Cập nhật" id="btnsubmit">
                <input class='btn btn-secondary' type="reset" value="Làm lại"><b id="noteForm"></b>
            </div>
        </div>
    </form>
</div>