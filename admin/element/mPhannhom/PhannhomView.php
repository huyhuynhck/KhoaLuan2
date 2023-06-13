<div>Quản Lý Phân nhóm</div>
<hr>
<div>Phân nhóm mới</div>
<div>
    <form name="newphannhom" id="formreg" method="post" action="./element/mPhannhom/PhannhomAct.php?reqact=addnew">
    <div class="form">
        <div class="form-group">
            <label>Tên Phân nhóm:</label>
            <input required class="form-control" type="text" name="ten_phannhom">
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
require './element/mod/PhannhomCls.php';
?>
<div class="title_phannhom">Danh sách Phân nhóm</div>
<div class="content_phannhom">
    <?php
    $phannhom = new phannhom();
    $list_phannhom = $phannhom->phannhomGetAll();
    $l = count($list_phannhom);
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
                                <th>Id Phân nhóm</th>
                                <th>Tên Phân nhóm</th>
                                <th>Mô tả</th>
                                <th>Xóa</th>
                                <th>Cập nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_phannhom as $v) {
                                ?>
                                <tr>
                                    <td><?php echo $v->id_phannhom; ?></td>
                                    <td><?php echo $v->ten_phannhom; ?></td>
                                    <td><?php echo $v->mota; ?></td>
                                    <td>
                                        <?php
                                        if (isset($_SESSION['ADMIN'])) {
                                            ?>
                                            <a href="./element/mPhannhom/PhannhomAct.php?reqact=deletephannhom&id_phannhom=<?php echo $v->id_phannhom; ?>">
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
                                            <a href="index.php?req=updatephannhom&id_phannhom=<?php echo $v->id_phannhom; ?>">
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