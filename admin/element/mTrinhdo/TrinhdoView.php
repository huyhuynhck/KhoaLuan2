<div>Quản Lý Trình độ</div>
<hr>
<div>Trình độ mới</div>
<div>
    <form name="newtrinhdo" id="formreg" method="post" action="./element/mTrinhdo/TrinhdoAct.php?reqact=addnew">
    <div class="form">
        <div class="form-group">
            <label>Mã Trình độ:</label>
            <input required class="form-control" type="text" name="ma_trinhdo">
        </div>
        <div class="form-group">
            <label>Tên Trình độ:</label>
            <input required class="form-control" type="text" name="ten_trinhdo">
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
require './element/mod/TrinhdoCls.php';
?>
<div class="title_trinhdo">Danh sách Trình độ</div>
<div class="content_trinhdo">
    <?php
    $trinhdo = new trinhdo();
    $list_trinhdo = $trinhdo->TrinhdoGetAll();
    $l = count($list_trinhdo);
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
                                    <th>Id Trình độ</th>
                                    <th>Mã Trình độ</th>
                                    <th>Tên Trình độ</th>
                                    <th>Mô tả</th>
                                    <th>Xóa</th>
                                    <th>Cập nhật</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($list_trinhdo as $v) {
                                    ?>
                                    <tr>
                                        <td><?php echo $v->id_trinhdo; ?></td>
                                        <td><?php echo $v->ma_trinhdo; ?></td>
                                        <td><?php echo $v->ten_trinhdo; ?></td>
                                        <td><?php echo $v->mota; ?></td>
                                        <td>
                                            <?php
                                            if (isset($_SESSION['ADMIN'])) {
                                                ?>

                                                <img class="iconimg" src="./Image/delete.png" onclick="confirm_sweet('./element/mtrinhdo/TrinhdoAct.php?reqact=deletetrinhdo&id_trinhdo=<?php echo $v->id_trinhdo; ?>')">
                                                
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
                                                <a href="index.php?req=updatetrinhdo&id_trinhdo=<?php echo $v->id_trinhdo; ?>">
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