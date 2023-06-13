<div>Cập nhật Cán bộ</div>
<?php
require './element/mod/TrinhdoCls.php';
require './element/mod/DonviCls.php';
require './element/mod/PhanloaiCls.php';
?>
<?php
require './element/mod/CanboCls.php';
$id_canbo = $_GET['id_canbo'];
$canbo = new canbo();
$getcanbo = $canbo->CanboGetbyId($id_canbo);
?>
<div class="title_user">Cán bộ mới</div>
<div class="content_user">
    <form name="updatecanbo" id="formupdate" method="post" action="./element/mCanbo/CanboAct.php?reqact=updatecanbo">
        <input type="hidden" name="id_canbo" value="<?php echo $id_canbo; ?>"/>
        <div class=form>
            <div class="form-group">
                <label>Mã cán bộ:</label>
                <input require class='form-control' type="text" name="ma_canbo" value="<?php echo $getcanbo->ma_canbo;?>"/>
            </div>
            <div class="form-group">
                <label>Tên cán bộ:</label>
                <input require class='form-control' type="text" name="ten_canbo" value="<?php echo $getcanbo->ten_canbo;?>"/>
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
            <div class="form-group">
                <label>Ngày sinh:</label>
                <input require class='form-control' type="date" name="ngaysinh" value="<?php echo $getcanbo->ngaysinh;?>"/>
            <div class="form-group">
                <label>Email:</label>
                <input require class='form-control' type="email" name="email" value="<?php echo $getcanbo->email;?>"/>
            <div class="form-group">
                <label>Số điện thoại 1:</label>
                <input require class='form-control' type="tel" name="sodienthoai1" value="<?php echo $getcanbo->sodienthoai1;?>"/>
            </div>
            <div class="form-group">
                <label>Địa chỉ thường trú:</label>
                <input require class='form-control' type="text" name="diachithuongtru" value="<?php echo $getcanbo->diachithuongtru;?>"/>
            </div>
            <div class="form-group">
                <label>Ngày vào làm:</label>
                <input require class='form-control' type="date" name="ngay_vao_lam" value="<?php echo $getcanbo->diachithuongtru;?>"/>
            </div>
            <div>
                <?php
                    $trinhdo = new trinhdo();
                    $list_trinhdo = $trinhdo->TrinhdoGetAll();
                ?>
                <label>Trình độ</label>
                <select class="form-select" aria-label="Default select example" require name="id_trinhdo">
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
                <label>Đơn vị</label>
                <select class="form-select" aria-label="Default select example" require name="id_donvi">
                    
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
            <div>
                    <?php
                        $phanloai = new phanloai();
                        $list_phanloai = $phanloai->PhanloaiGetAll();
                    ?>
                <label>Phân loại</label>
                <select class="form-select" aria-label="Default select example" require name="id_phan_loai">
                    
                    <?php
                        foreach ($list_phanloai as $pl) {
                            ?>
                            <option value="<?php echo $pl->id_phan_loai?>">
                                <?php echo $pl->ten_phan_loai; ?>
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