<div>Cập nhật Tài khoản</div>
<?php
require './element/mod/CanboCls.php';
?>
<?php
require './element/mod/TaikhoanCls.php';
$id_taikhoan = $_GET['id_taikhoan'];
$taikhoan = new taikhoan();
$gettaikhoan = $taikhoan->TaikhoanGetbyId($id_taikhoan);
?>
<div class="title_user">Tài khoản mới</div>
<div class="content_user">
    <form name="updatetaikhoan" id="formupdate" method="post" action="./element/mTaikhoan/TaikhoanAct.php?reqact=updatetaikhoan">
        <input type="hidden" name="id_taikhoan" value="<?php echo $id_taikhoan; ?>"/>
        <div class=form>
            <div class="form-group">
                <label>Tên tài khoản:</label>
                <input require class='form-control' type="text" name="ten_taikhoan" value="<?php echo $gettaikhoan->ten_taikhoan;?>"/>
            </div>
            <div class="form-group">
                <label>Mật khẩu:</label>
                <input require class='form-control' type="text" name="matkhau" value="<?php echo $gettaikhoan->matkhau;?>"/>
            </div>
            <div>
                <?php
                    $canbo = new canbo();
                    $list_canbo = $canbo->CanboGetAll();
                ?>
                <label>Cán bộ</label>
                <select class="form-select" aria-label="Default select example" require name="id_canbo">
                <?php
                    foreach ($list_canbo as $td) {
                        ?>
                        <option value="<?php echo $td->id_canbo?>">
                            <?php echo $td->ten_canbo; ?>
                        </option>
                        <?php 
                    }
                ?>  
            </select>
            </div>
            <div class="form-group mt-2">
                <input require class='btn btn-success' type="submit" id="btnsubmit" value="Cập nhật"/>
                <input require class='btn btn-secondary' type="reset" value="Làm lại"/><b id="noteForm"></b>
            </div>
        </div>
    </form>
</div>