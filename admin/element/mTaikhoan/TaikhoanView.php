<?php
require './element/mod/CanboCls.php';
require './element/mod/TaikhoanCls.php';
?>
<div>Quản Lý Tài khoản</div>
<hr>
<div>Tài khoản mới</div>
<div>
<?php
    $taikhoan = new taikhoan();
    $list_taikhoan = $taikhoan->TaikhoanGetAll();
    $l = count($list_taikhoan);
    ?>
    <form name="newtaikhoan" id="formreg" method="post" action="./element/mTaikhoan/TaikhoanAct.php?reqact=addnew">
        <div class="form">
            <div class="form-group">
                <label>Tên tài khoản:</label>
                <input required class='form-control' type="text" name="ten_taikhoan">
            </div>
            <div class="form-group">
                <label>Mật khẩu:</label>
                <input required class='form-control' type="password" name="matkhau">
            </div>
            <div>
                    <?php
                        $canbo = new canbo();
                        $list_canbo = $canbo->CanboGetAll();
                    ?>
                <label>Đơn vị</label>
                <select class="form-select" aria-label="Default select example" require name="id_canbo">
                    
                    <?php
                        foreach ($list_canbo as $dv) {
                            ?>
                            <option value="<?php echo $dv->id_canbo?>">
                                <?php echo $dv->ten_canbo; ?>
                            </option>
                            <?php 
                        }
                    ?>
                    
                </select>
            </div>
                <div class="form-group mt-2">
                    <input require class="btn btn-success" type="submit" value="Tạo mới" id="btnsubmit">
                    <input require class="btn btn-secondary" type="reset" value="Làm lại"/><b id="noteForm"></b>
                </div>
        </div>    
    </form>
</div>
<hr/>

    <?php
    $taikhoan = new taikhoan();
    $list_taikhoan = $taikhoan->TaikhoanGetAll();
    $canbo = new canbo();
    $l = count($list_taikhoan);
    ?>
    <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php
    if ($l > 0) {
        ?>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Mã tài khoản</th>
                                <th>Tên tài khoản</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Xóa</th>
                                <th>Cập nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_taikhoan as $v) {
                                ?>
                                <tr>
                                    <td><?php echo $v->id_taikhoan; ?></td>
                                    <td><?php echo $v->ten_taikhoan; ?></td>
                                    <td><?= $canbo->CanboGetbyId($v->id_canbo)->ten_canbo?></td>
                                    <td><?= $canbo->CanboGetbyId($v->id_canbo)->email?></td>
                                    <td>
                                        <?php
                                        if (isset($_SESSION['ADMIN'])) {
                                            ?>
                                            <img class="iconimg" src="./Image/delete.png" onclick="confirm_sweet('./element/mTaikhoan/TaikhoanAct.php?reqact=deletetaikhoan&id_taikhoan=<?php echo $v->id_taikhoan; ?>')">
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
                                            <a href="index.php?req=updatetaikhoan&id_taikhoan=<?php echo $v->id_taikhoan; ?>">
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
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>