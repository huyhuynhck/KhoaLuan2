<div>Cập nhật người dùng</div>
<?php
require './element/mod/userCls.php';
$iduser = $_GET['iduser'];
$user = new user();
$getuser = $user->UserGetbyId($iduser);
?>
<div class="title_user">Người dùng mới</div>
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
                <label>Giới tính:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gioitinh" id="gioitinh1" value="1" checked="true">
                    <label class="form-check-label" for="gioitinh1">
                        Nam
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gioitinh" id="gioitinh2" value="0" checked="true">
                    <label class="form-check-label" for="gioitinh2">
                       Nữ
                    </label>
                </div>
            </div>
            <div class='form-group'>
                <label>Ngày sinh:</label>
                <input required class="form-control" type="date" name="ngaysinh" value="<?php echo $getuser->ngaysinh?>"/>
            </div>
            <div class='form-group'>
                <label>Địa chỉ:</label>
                <input required class="form-control" type="text" name="diachi" value="<?php echo $getuser->diachi?>"/>
            </div>
            <div class='form-group'>
                <label>Điện thoại:</label>
                <input required class="form-control" type="tel" name="dienthoai" value="<?php echo $getuser->dienthoai?>"/>
            </div>
            <div class="form-group mt-2">
                <input required class="btn btn-sm btn-success" type="submit" id="btnsubmit" value="Cập nhật"/>
                <input required class="btn btn-sm btn-secondary" type="reset" value="Làm lại"/><b id="noteForm"></b>
            </div>
        </div>
    </form>
</div>