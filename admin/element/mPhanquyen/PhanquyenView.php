<div>Quản Lý Phân quyền</div>
<hr>
<div>Phân quyền mới</div>
<div>
    <form name="newphanquyen" id="formreg" method="post" action="./element/mPhanquyen/PhanquyenAct.php?reqact=addnew">
    <div class="form">
        <div class="form-group">
            <label>Tên Phân quyền:</label>
            <input required class="form-control" type="text" name="ten_phanquyen">
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
require './element/mod/PhanquyenCls.php';
?>
<div class="title_phanquyen">Danh sách Phân quyền</div>
<div class="content_phanquyen">
    <?php
    $phanquyen = new phanquyen();
    $list_phanquyen = $phanquyen->PhanquyenGetAll();
    $l = count($list_phanquyen);
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
                                <th>Id Phân quyền</th>
                                <th>Tên Phân quyền</th>
                                <th>Mô tả</th>
                                <th>Xóa</th>
                                <th>Cập nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_phanquyen as $v) {
                                ?>
                                <tr>
                                    <td><?php echo $v->id_phanquyen; ?></td>
                                    <td><?php echo $v->ten_phanquyen; ?></td>
                                    <td><?php echo $v->mota; ?></td>
                                    <td>
                                        <?php
                                        if (isset($_SESSION['ADMIN'])) {
                                            ?>
                                            <a href="./element/mPhanquyen/PhanquyenAct.php?reqact=deletephanquyen&id_phanquyen=<?php echo $v->id_phanquyen; ?>">
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
                                            <a href="index.php?req=updatephanquyen&id_phanquyen=<?php echo $v->id_phanquyen; ?>">
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