<div>Cập nhật giảng dạy</div>
<?php
require './element/mod/GiangdayCls.php';
$ma_giangday = $_GET['ma_giangday'];
$giangday = new giangday();
$getgiangday = $giangday->giangdayGetbyId($ma_giangday);

require './element/mod/LoaiGDCls.php';
$loaigiangday = new loaigiangday();
$list_loaigiangday = $loaigiangday->LoaiGDGetAll();
$l = count($list_loaigiangday);
?>
<div class="title_user">Giảng dạy mới</div>
<div class="content_user">
    <form name="updategiangday" id="formupdate" method="post" action="./element/mGiangday/GiangdayAct.php?reqact=updategiangday">
        <div class="form">
            <div class="form-group">
                <label>Số sinh viên:</label>
                <input required class='form-control' type="text" name="sosv" value='<?php echo $getgiangday->sosv; ?>'>
            </div>
            </div>
            <div class="form-group">
                <label>Số nhóm:</label>
                <input required class='form-control' type="text" name="sonhom" value='<?php echo $getgiangday->sonhom; ?>'>
            </div>
            <div class="form-group">
                <label>Số tiết môn học:</label>
                <input required class='form-control' type="text" name="sotietmonhoc" value='<?php echo $getgiangday->sotietmonhoc ; ?>'>
            </div>
            <div class="form-group">
                <label>Số tiết thực giảng:</label>
                <input required class='form-control' type="tel" name="sotietthucgiang" value='<?php echo $getgiangday->sotietthucgiang; ?>'>
            </div>
            <div class="form-group">
                <label>Hệ số nhóm, lớp:</label>
                <input class='form-control' type="tel" name="hesolop" value='<?php echo $getgiangday->hesolop; ?>'>
            </div>
            <div class="form-group">
                <label>Hệ số tín chỉ:</label>
                <input required class='form-control' type="text" name="hesotinchi" value='<?php echo $getgiangday->hesotinchi; ?>'>
            </div>
            <div> 
                <label>Loại giảng dạy</label>
                <select class="form-select" aria-label="Default select example" name="tenloai">
                    <?php
                        foreach ($list_loaigiangday as $v) {
                            ?>
                                <option>
                                    <?php echo $v->ten_loaigiangday ?>
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