<div>Cập nhật Phân loại</div>
<?php
require './element/mod/PhanloaiCls.php';
$id_phan_loai = $_GET['id_phan_loai'];
$phanloai = new phanloai();
$getphanloai = $phanloai->phanloai__Get_By_Id($id_phan_loai);
?>
<div class="title_user">Phân loại mới</div>
<div class="content_user">
    <form name="updatephanloai" id="formupdate" method="post" action="./element/mPhanloai/PhanloaiAct.php?reqact=updatephanloai">
    <input type="hidden" name="id_phan_loai" value="<?php echo $id_phan_loai; ?>"/>
        <div class="form">
            <div class="form-group">
                <label>Tên Phân loại:</label>
                <input required class="form-control" type="text" name="ten_phan_loai" value="<?php echo $getphanloai->ten_phan_loai; ?>">
            </div>
            <div class="form-group">
                <label>Ghi chú:</label>
                <input  class="form-control" type="text" name="ghi_chu" value="<?php echo $getphanloai->ghi_chu; ?>">
            </div>
            
            <div class="form-group mt-2">
                <input class='btn btn-success' type="submit" value="Cập nhật" id="btnsubmit">
                <input class='btn btn-secondary' type="reset" value="Làm lại"><b id="noteForm"></b>
            </div>
        </div>
    </form>
</div>