<div>Cập nhật Sinh viên</div>
<?php
require './element/mod/SinhvienCls.php';
require './element/mod/LophocCls.php';
$id_sinhvien = $_GET['id_sinhvien'];
$sinhvien = new sinhvien();
$getsinhvien = $sinhvien->SinhvienGetbyId($id_sinhvien);
?>
<div class="title_user">Sinh viên mới</div>
<div class="content_user">
    <form name="updatesinhvien" id="formupdate" method="post" action="./element/mSinhvien/SinhvienAct.php?reqact=updatesinhvien">
        <input type="hidden" name="id_sinhvien" value="<?php echo $id_sinhvien; ?>"/>
        <div class="form">
        <div class="form-group">
                <label>Mã Sinh viên:</label>
                <input required class='form-control' type="text" name="ma_sinhvien" value='<?php echo $getsinhvien->ma_sinhvien; ?>'>
            </div>
            <div class="form-group">
                <label>Tên Sinh viên:</label>
                <input required class='form-control' type="text" name="ten_sinhvien" value='<?php echo $getsinhvien->ten_sinhvien; ?>'>
            </div>
            <div class="form-group">
                <label>Giới tính:</label>
                <div class="form-check" >
                    <input required class="form-check-input" type="radio" name="gioitinh" id="gioitinh1" value="1"<?php if($getsinhvien->gioitinh==1) echo"checked";?>>
                    <label class="form-check-label" for="gioitinh1">
                        Nam
                    </label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="gioitinh" id="gioitinh2" value="0" <?php if($getsinhvien->gioitinh==0) echo"checked";?>>
                    <label class="form-check-label" for="gioitinh2">
                        Nữ
                    </label>
                </div>
                
            </div>
            <div class="form-group">
                <label>Ngày sinh:</label>
                <input required class='form-control' type="date" name="ngaysinh" value='<?php echo $getsinhvien->ngaysinh; ?>'>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input required class='form-control' type="text" name="email" value='<?php echo $getsinhvien->email ; ?>'>
            </div>
            <div class="form-group">
                <label>Số điện thoại 1:</label>
                <input required class='form-control' type="tel" name="sodienthoai1" value='<?php echo $getsinhvien->sodienthoai1; ?>'>
            </div>
            <div class="form-group">
                <label>Địa chỉ thường trú:</label>
                <input required class='form-control' type="text" name="diachithuongtru" value='<?php echo $getsinhvien->diachithuongtru; ?>'>
            </div>
            <div>
                    <?php
                        $lophoc = new lophoc();
                        $list_lophoc = $lophoc->LophocGetAll();
                    ?>
                <label>Lớp học</label>
                <select class="form-select" aria-label="Default select example" name="id_lophoc">
                    <?php
                        foreach ($list_lophoc as $lh) {
                            ?>
                            <option value="<?php echo $lh->id_lophoc?>">
                                <?php echo $lh->ten_lophoc; ?>
                            </option>
                            <?php 
                        }
                    ?>
                </select>
            </div>
            <div class="form-group mt-2">
                <input require class="btn btn-success" type="submit" value="Cập nhật" id="btnsubmit">
                <input require class="btn btn-secondary" type="reset" value="Làm lại"/><b id="noteForm"></b>
            </div>
    </form>
</div>