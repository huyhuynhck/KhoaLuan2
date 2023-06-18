<div>Quản Lý Đơn Vị</div>
<hr>
<div>
    <form name="newdonvi" id="formreg" method="post" action="./element/mDonvi/DonviAct.php?reqact=addnew">
    <div class="form">
        <div class="form-group">
            <label>Mã đơn vị:</label>
            <input required class="form-control" type="text" name="ma_donvi">
        </div>
        <div class="form-group">
            <label>Tên đơn vị:</label>
            <input required class="form-control" type="text" name="ten_donvi">
        </div>
        <div class="form-group">
            <label>Mô tả:</label>
            <input required class="form-control" type="text" name="mota">
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
require './element/mod/DonviCls.php';
?>
<div class="title_donvi">Danh sách đơn vị</div>
<div class="content_donvi">
    <?php
    $donvi = new donvi();
    $list_donvi = $donvi->DonviGetAll();
    $l = count($list_donvi);
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
                                <th>Mã đơn vị</th>
                                <th>Tên đơn vị</th>
                                <th>Mô tả</th>
                                <th>Xóa</th>
                                <th>Cập nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_donvi as $v) {
                                ?>
                                <tr>
                                    <td><?php echo $v->ma_donvi; ?></td>
                                    <td><?php echo $v->ten_donvi; ?></td>
                                    <td><?php echo $v->mota; ?></td>
                                    <td>
                                        <?php
                                        if (isset($_SESSION['ADMIN'])) {
                                            ?>
                                            <img class="iconimg" src="./Image/delete.png" onclick="confirm_sweet('./element/mDonvi/DonviAct.php?reqact=deletedonvi&id_donvi=<?php echo $v->id_donvi; ?>')">
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
                                            <a href="index.php?req=updatedonvi&id_donvi=<?php echo $v->id_donvi; ?>">
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