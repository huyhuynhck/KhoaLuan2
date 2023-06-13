<?php 
    require '../mod/NhomCvCls.php';
?>
<div>Quản Lý khoá học</div>
<hr>
<div>Khoá học mới</div>
<div>
<?php
    $congviec = new nhomcongviec();
    $list_congviec = $congviec->NhomCvGetName();
    $l = count($list_congviec);
    ?>
    <form name="newnhomcv" id="formreg" method="post" action="./element/mNhomCV/NhomCvAct.php?reqact=addnew">
    <div class="form">
        <div class="form-group">
            <label>Tên Khoá học:</label>
            <input required class="form-control" type="text" name="ten_nhomcv">
        </div>
        <div> 
                <label>Công việc</label>
                <select class="form-select" aria-label="Default select example" name="ma_cv">
                    <?php
                        foreach ($list_congviec as $v) {
                            ?>
                                <option>
                                    <?php echo $v->ten_cv;?>
                                </option>
                                
                            <?php 
                        }
                    ?>
                    
                </select>
            </div>
        <div class="form-group mt-2">
            <input type="submit" id="btnsubmit" value="Tạo mới">
            <input type="reset" value="Làm lại"><b id="noteForm"></b>
        </div>
    </div>    
    </form>
</div>
<hr/>
