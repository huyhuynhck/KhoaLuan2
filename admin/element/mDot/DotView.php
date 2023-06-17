<div>Quản Lý Đợt</div>
<hr>
<div>Đợt mới</div>
<div>
    <form name="newdot" id="formreg" method="post" action="./element/mDot/DotAct.php?reqact=addnew">
    <div class="form">
        <div class="form-group">
            <label>Tên Đợt:</label>
            <input required class="form-control" type="text" name="ten_index">
        </div>
        <div class="form-group">
            <label>Ngày bắt đầu:</label>
            <input required class="form-control" type="date" name="ngay_bat_dau">
        </div>
        <div class="form-group">
            <label>Ngày kết thúc:</label>
            <input required class="form-control" type="date" name="ngay_ket_thuc">
        </div>
        <div class="form-group">
            <label>Số ngày hoạt động:</label>
            <input required class="form-control" type="number" name="so_ngay_hoat_dong">
        </div>
        <div class="form-group">
            <label>Ghi chú:</label>
            <input class="form-control" type="text" name="ghi_chu">
        </div>
        <div class="form-group mt-2">
            <input class='btn btn-success' type="submit" id="btnsubmit" value="Tạo mới">
            <input class='btn btn-secondary' type="reset" value="Làm lại"><b id="noteForm"></b>
        </div>
    </div>    
    </form>
</div>
<hr/>
<?php
require './element/mod/indexcount.php';
?>
<div class="title_dot">Danh sách Đợt</div>
<div class="content_dot">
    <?php
    $dot = new indexcount();
    $list_dot = $dot->indexcount__Get_All();
    $l = count($list_dot);
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
                                    <th style="text-align: center;">Tên Đợt</th>
                                    <th style="text-align: center;">Ngày bắt đầu</th>
                                    <th style="text-align: center;">Ngày kết thúc</th>
                                    <th style="text-align: center;">Số ngày hoạt động</th>
                                    <th style="text-align: center;">Ghi chú</th>
                                    <th style="text-align: center;">Xóa</th>
                                    <th style="text-align: center;">Cập nhật</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($list_dot as $v) {
                                    ?>
                                    <tr>
                                        <td><?php echo $v->ten_index; ?></td>
                                        <td><?php echo $v->ngay_bat_dau; ?></td>
                                        <td><?php echo $v->ngay_ket_thuc; ?></td>
                                        <td><?php echo $v->so_ngay_hoat_dong; ?></td>
                                        <td><?php echo $v->ghi_chu; ?></td>
                                        <td style="text-align: center;">
                                        <?php
                                            if (isset($_SESSION['ADMIN'])) {
                                                ?>
                                                <a onclick="return confirm_sweet('./element/mDot/DotAct.php?req=deletedot&id_index=<?=$v->id_index?>')">
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
                                        <td style="text-align: center;">
                                        <?php
                                            if (
                //                                    isset($_SESSION['USER']) and
                                                    $v->username = 'admin') {
                                                ?>
                                                <a href="index.php?req=updatedot&id_index=<?php echo $v->id_index; ?>">
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