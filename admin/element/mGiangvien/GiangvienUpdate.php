<div>Cập nhật Cán bộ</div>
<?php
require './element/mod/GiangvienCls.php';
require './element/mod/DonviCls.php';
require './element/mod/TrinhdoCls.php';
$id_giangvien = $_GET['id_giangvien'];
$giangvien = new giangvien();
$getgiangvien = $giangvien->GiangvienGetbyId($id_giangvien);
?>
<div class="title_user">Giảng viên mới</div>
<div class="content_user">
    <form name="updategiangvien" id="formupdate" method="post" action="./element/mGiangvien/GiangvienAct.php?reqact=updategiangvien">
    <input type="hidden" name="id_giangvien" value="<?php echo $id_giangvien; ?>"/>    
    <div class="form">
        <div class="form-group">
                <label>Mã Giảng viên:</label>
                <input required class='form-control' type="text" name="ma_giangvien" value='<?php echo $getgiangvien->ma_giangvien; ?>'>
            </div>
            <div class="form-group">
                <label>Tên Giảng viên:</label>
                <input required class='form-control' type="text" name="ten_giangvien" value='<?php echo $getgiangvien->ten_giangvien; ?>'>
            </div>
            <div class="form-group">
                <label>Giới tính:</label>
                <div class="form-check" >
                    <input required class="form-check-input" type="radio" name="gioitinh" id="gioitinh1" value="1"<?php if($getgiangvien->gioitinh==1) echo"checked";?>>
                    <label class="form-check-label" for="gioitinh1">
                        Nam
                    </label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="gioitinh" id="gioitinh2" value="0" <?php if($getgiangvien->gioitinh==0) echo"checked";?>>
                    <label class="form-check-label" for="gioitinh2">
                        Nữ
                    </label>
                </div>
                
            </div>
            <div class="form-group">
                <label>Ngày sinh:</label>
                <input required class='form-control' type="date" name="ngaysinh" value='<?php echo $getgiangvien->ngaysinh; ?>'>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input required class='form-control' type="email" name="email" value='<?php echo $getgiangvien->email ; ?>'>
            </div>
            <div class="form-group">
                <label>Số điện thoại:</label>
                <input required class='form-control' type="tel" name="sodienthoai1" value='<?php echo $getgiangvien->sodienthoai1; ?>'>
            </div>
            <div class="form-group">
                <label>Địa chỉ thường trú:</label>
                <input required class='form-control' type="text" name="diachithuongtru" value='<?php echo $getgiangvien->diachithuongtru; ?>'>
            </div>
            <div>
                <?php
                    $trinhdo = new trinhdo();
                    $list_trinhdo = $trinhdo->TrinhdoGetAll();
                ?>
                <label>Trình độ</label>
                <select class="form-select" aria-label="Default select example" name="id_trinhdo">
                <?php
                    foreach ($list_trinhdo as $td) {
                        ?>
                        <option value="<?php echo $td->id_trinhdo?>">
                            <?php echo $td->ten_trinhdo; ?>
                        </option>
                        <?php 
                    }
                ?>  
            </select>
            </div>
            <div>
                    <?php
                        $donvi = new donvi();
                        $list_donvi = $donvi->DonviGetAll();
                    ?>
                <label>Tên đơn vị</label>
                <select class="form-select" aria-label="Default select example" name="id_donvi">
                    
                    <?php
                        foreach ($list_donvi as $dv) {
                            ?>
                            <option value="<?php echo $dv->id_donvi?>">
                                <?php echo $dv->ten_donvi; ?>
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