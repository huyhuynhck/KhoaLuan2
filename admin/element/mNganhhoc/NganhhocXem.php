<?php
require './element/mod/NganhhocCls.php';
?>
    <?php
    $nganhhoc = new nganhhoc();
    $list_nganhhoc = $nganhhoc->NganhhocGetAll();
    $l = count($list_nganhhoc);
    ?>
    <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php
    if ($l > 0) {
        ?>
        <h1 class="h3 mb-2 text-gray-800">Danh sách ngành học</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tên ngành học</th>
                                    <th>Mô tả</th>
                                    <th>Xóa</th>
                                    <th>Cập nhật</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($list_nganhhoc as $v) {
                                    ?>
                                    <tr>
                                        <td><?php echo $v->ten_nganhhoc; ?></td>
                                        <td><?php echo $v->mota; ?></td>
                                        <td>
                                            <?php
                                            if (isset($_SESSION['ADMIN'])) {
                                                ?>
                                                <a href="./element/mNganhhoc/NganhhocAct.php?reqact=deletenganhhoc&id_nganhhoc=<?php echo $v->id_nganhhoc; ?>">
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
                                                <a href="index.php?req=updatenganhhoc&id_nganhhoc=<?php echo $v->id_nganhhoc; ?>">
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