<?php
require './element/mod/CongviecCls.php';
?>
<div>Quản Lý Công việc</div>
<hr>
<div>Công việc mới</div>
<div>
<?php
    $congviec = new congviec();
    $list_congviec = $congviec->CongviecGetAll();
    $l = count($list_congviec);
    ?>
    <form name="newcongviec" id="formreg" method="post" action="./element/mCongviec/CongviecAct.php?reqact=addnew">
        <div class="form">
            <div class="form-group">
                <label>Tên công việc:</label>
                <input required class='form-control' type="text" name="ten_cv">
            </div>
            <div class="form-group">
                <label>Điều kiện:</label>
                <input required class='form-control' type="text" name="dieukien">
            </div>
            <div class="form-group">
                <label>Quy đổi số tiết:</label>
                <input required class='form-control' type="text" name="quydoisotiet">
            </div>
            <div class="form-group">
                <label>Số lượng:</label>
                <input required class='form-control' type="text" name="soluong">
            </div>
            <div class="form-group">
                <label>Ghi chú:</label>
                <input required class='form-control' type="text" name="ghichu">
            </div>
            
        
            <div class="form-group mt-2">
                <input require class="btn btn-success" type="submit" value="Tạo mới" id="btnsubmit">
                <input require class="btn btn-secondary" type="reset" value="Làm lại"/><b id="noteForm"></b>
            </div>
        </div>    
    </form>
</div>
<hr/>

<div class="title_user">Danh sách công việc</div>
<div class="content_user">
    <?php
    $congviec = new congviec();
    $list_congviec = $congviec->CongviecGetAll();
    $l = count($list_congviec);
    ?>
    <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php
    if ($l > 0) {
        ?>
        <table border="1" id='myTable_2'>
            <thead>
                <tr>
                    <th>Mã công việc</th>
                    <th>Tên công việc</th>
                    <th>Điều kiện</th>
                    <th>Quy đổi số tiết</th>
                    <th>Số lượng</th>
                    <th>Ghi chú</th>
                    <th>Xóa</th>
                    <th>Cập nhật</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list_congviec as $v) {
                    ?>
                    <tr>
                        <td><?php echo $v->ma_cv; ?></td>
                        <td><?php echo $v->ten_cv; ?></td>
                        <td><?php echo $v->dieukien; ?></td>
                        <td><?php echo $v->quydoisotiet; ?></td>
                        <td><?php echo $v->soluong; ?></td>
                        <td><?php echo $v->ghichu; ?></td>
                        <td>
                            <?php
                            if (isset($_SESSION['ADMIN'])) {
                                ?>
                            
                                <img class="iconimg" src="./Image/delete.png" onclick="confirm_sweet('./element/mCongviec/CongviecAct.php?reqact=deletecongviec&ma_cv=<?php echo $v->ma_cv; ?>')">
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
                                <a href="index.php?req=updatecongviec&ma_cv=<?php echo $v->ma_cv; ?>">
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