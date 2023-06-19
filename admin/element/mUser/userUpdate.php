<div>Cập nhật người dùng</div>
<hr>
<?php
require './element/mod/userCls.php';
require './element/mod/DonviCls.php';
$iduser = $_GET['iduser'];
$user = new user();
$donvi = new donvi();
$getuser = $user->UserGetbyId($iduser);

require './element/mod/PhanquyenCls.php';
$phanquyen = new phanquyen();
?>
<div>
    <form name="updateuser" id="formupdate" method="post" action="./element/mUser/userAct.php?reqact=updateuser">
        <input required type="hidden" name="iduser" value="<?php echo $iduser; ?>"/>
        <div class='form'>
            <div class='form-group'>
                <label>Tên đăng nhập:</label>
                <input required class="form-control" type="text" name="username"  value="<?php echo $getuser->username?>"/>
            </div>
            <div class='form-group'>
                <label>Mật khẩu:</label>
                <input required class="form-control" type="password" name="password" value="<?php echo $getuser->password?>"/>
            </div>
            <div class='form-group'>
                <label>Họ tên:</label>
                <input required class="form-control" type="text" name="hoten" value="<?php echo $getuser->hoten?>"/>
            </div>
            <div class='form-group'>
                <div class="form-check">
                    <input class="form-check-input" type="hidden" name="gioitinh" id="gioitinh1" value="1" checked="true">
                    
                </div>
            </div>
            <div class='form-group'>
                <input required class="form-control" type="hidden" name="ngaysinh" value="<?php echo $getuser->ngaysinh?>"/>
            </div>
            <div class='form-group'>
                <input required class="form-control" type="hidden" name="diachi" value="<?php echo $getuser->diachi?>"/>
            </div>
            <div class='form-group'>
                <input required class="form-control" type="hidden" name="dienthoai" value="<?php echo $getuser->dienthoai?>"/>
            </div>
            <div class='form-group'>
                <label>Phân quyền:</label>
                <select name="id_phanquyen" required class="form-control">
                    <?php 
                        foreach($phanquyen->PhanquyenGetAll() as $item):
                    ?>
                    <option value="<?=$item->id_phanquyen?>" <?=$item->id_phanquyen==$getuser->id_phanquyen?'checked':''?>>
                            <?=$item->ten_phanquyen?>
                    </option>
                    <?php endforeach?>
                </select>
            </div>
            <div class='form-group'>
                <label>Đơn vị:</label>
                <select name="id_donvi" required class="form-control">
                    <?php 
                        foreach($donvi->DonviGetAll() as $item):
                    ?>
                    <option value="<?=$item->id_donvi?>" <?=$item->id_donvi==$getuser->id_donvi?'checked':''?>>
                            <?=$item->ten_donvi?>
                    </option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="form-group mt-2">
                <input required class="btn btn-sm btn-success" type="submit" id="btnsubmit" value="Cập nhật"/>
                <input required class="btn btn-sm btn-secondary" type="reset" value="Làm lại"/><b id="noteForm"></b>
            </div>
        </div>
    </form>
</div>