<?php 
    require './element/mod/CongviecCls.php';
?>
<div>Quản Lý khoá học</div>
<hr>
<div>Khoá học mới</div>
<div>
    <?php
        $congviec = new congviec();
        $list_congviec = $congviec->CongviecGetAll();
        $l = count($list_congviec);
    ?>
    <form name="newnhomcv" id="formreg" method="post" action="./element/mNhomCV/NhomCvAct.php?reqact=addnew">
    <div class="form">
        <div class="form-group">
            <label>Tên :</label>
            <input required class="form-control" type="text" name="ten_nhomcv">
        </div>
        <div> 
                <label>Công việc</label>
                <select class="form-select" aria-label="Default select example" name="ma_cv">
                    <?php
                        foreach ($list_congviec as $v) {
                            ?>
                                <option value="<?php echo $v->ma_cv?>">
                                    <?php echo $v->ten_cv; ?>
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
<?php
require './element/mod/NhomCvCls.php';
?>
<div class="title_nhomcv">Danh sách khoá học</div>
<div class="content_nhomcv">
    <?php
    $nhomcv = new nhomcongviec();
    $list_nhomcv = $nhomcv->NhomCvGetName();
    $l = count($list_nhomcv);
    ?>
    <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php
    if ($l > 0) {
        ?>
        <table border="1" id='myTable_3'>
            <thead>
                <tr>
                    <th>ID nhóm công việc</th>
                    <th>Tên nhóm công việc</th>
                    <th>Mã công việc</th>
                    <th>Xóa</th>
                    <th>Cập nhật</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list_nhomcv as $v){
                    
                    ?>
                    <tr>
                        <td><?php echo $v->ma_nhomcv; ?></td>
                        <td><?php echo $v->ten_nhomcv; ?></td>
                        <td><?php echo $v->ten_cv; ?></td>
                        
                        <td>
                            <?php
                            if (isset($_SESSION['ADMIN'])) {
                                ?>
                                <a href="./element/mnhomcv/NhomCvAct.php?reqact=deletenhomcv&ma_nhomcv=<?php echo $v->ma_nhomcv; ?>">
                                    <img class="iconimg" src="./Image/delete.png">
                                </a>
                                <?php
                            } else {
                                ?>
                                <img class="iconimg" src="./Image/delete.png">
                                <?php
                            }
                            ?>
                        </td>
                        <td>
                           <?php
                            if (
//                                    isset($_SESSION['USER']) and
                                    $v->username = 'admin') {
                                ?>
                                <a href="index.php?req=updatenhomcv&ma_nhomcv=<?php echo $v->ma_nhomcv; ?>">
                                    <img class="iconimg" src="./Image/update.png">
                                </a>
                                <?php
                            } else {
                                ?>
                                <img class="iconimg" src="./Image/update.png">
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    }
    ?>
</div>