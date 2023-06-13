<?php
require './element/mod/KhoahocCls.php';
?>

    <?php
    $khoahoc = new khoahoc();
    $list_khoahoc = $khoahoc->KhoahocGetAll();
    $l = count($list_khoahoc);
    ?>
    <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php
    if ($l > 0) {
        ?>
        <h1 class="h3 mb-2 text-gray-800">Danh sách khoá học</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                
                                <th>Tên khoá học</th>
                                <th>Mô tả</th>
                                <th>Xóa</th>
                                <th>Cập nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_khoahoc as $v) {
                                ?>
                                <tr>
                                    
                                    <td><?php echo $v->ten_khoahoc; ?></td>
                                    <td><?php echo $v->mota; ?></td>
                                    <td>
                                        <?php
                                        if (isset($_SESSION['ADMIN'])) {
                                            ?>
                                            
                                            <img class="iconimg" src="./Image/delete.png" onclick="confirm_sweet('./element/mkhoahoc/KhoahocAct.php?reqact=deletekhoahoc&id_khoahoc=<?php echo $v->id_khoahoc; ?>')">
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
                                            <a href="index.php?req=updatekhoahoc&id_khoahoc=<?php echo $v->id_khoahoc; ?>">
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