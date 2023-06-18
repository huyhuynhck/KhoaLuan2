<div>Cập nhật lớp học</div>
<hr>
<?php
require './element/mod/LophocCls.php';
require './element/mod/KhoahocCls.php';
require './element/mod/NganhhocCls.php';
$id_lophoc = $_GET['id_lophoc'];
$lophoc = new lophoc();
$getlophoc = $lophoc->LophocGetbyId($id_lophoc);
?>

<div class="content_user">
    <form name="updatelophoc" id="formupdate" method="post" action="./element/mLophoc/LophocAct.php?reqact=updatelophoc">
    <input type="hidden" name="id_lophoc" value="<?php echo $id_lophoc; ?>"/>
        <div class="form">
            <div class="form-group">
                <label>Tên lớp học:</label>
                <input required class="form-control" type="text" name="ten_lophoc" value="<?php echo $getlophoc->ten_lophoc; ?>">
            </div>
            <div class="form-group">
                <label>Mô tả:</label>
                <input required class="form-control" type="text" name="mota" value="<?php echo $getlophoc->mota; ?>">
            </div>
            <div>
                <?php
                    $khoahoc = new khoahoc();
                    $list_khoahoc = $khoahoc->KhoahocGetAll();
                ?>
                <label>Tên khoá học</label>
                <select class="form-select" aria-label="Default select example" require name="id_khoahoc">
                <?php
                    foreach ($list_khoahoc as $kh) {
                        ?>
                        <option value="<?php echo $kh->id_khoahoc?>">
                            <?php echo $kh->ten_khoahoc; ?>
                        </option>
                        <?php 
                    }
                ?>  
            </select>
            </div>
            <div>
                    <?php
                        $nganhhoc = new nganhhoc();
                        $list_nganhhoc = $nganhhoc->NganhhocGetAll();
                    ?>
                <label>Tên ngành học</label>
                <select class="form-select" aria-label="Default select example" require name="id_nganhhoc">
                    
                    <?php
                        foreach ($list_nganhhoc as $nh) {
                            ?>
                            <option value="<?php echo $nh->id_nganhhoc?>">
                                <?php echo $nh->ten_nganhhoc; ?>
                            </option>
                            <?php 
                        }
                    ?>
                    
                </select>
            </div>
            <div class="form-group mt-2">
                <input class='btn btn-success' type="submit" value="Cập nhật" id="btnsubmit">
                <input class='btn btn-secondary' type="reset" value="Làm lại"><b id="noteForm"></b>
            </div>
        </div>
    </form>
</div>