<?php
require './form/mod/LophocCls.php';
?>
<?php
    $lophoc = new lophoc();
    $list_lophoc = $lophoc->LophocGetAll();
    $l = count($list_lophoc);
    ?>
   <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php
    if ($l > 0) {
        ?>
        <h1 class="h3 mb-2 text-gray-800">Danh sách lớp học</h1>           
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tên lớp học</th>
                                <th>Mô tả</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_lophoc as $v) {
                                ?>
                                <tr>
                                    <td><?php echo $v->ten_lophoc; ?></td>
                                    <td><?php echo $v->mota; ?></td>
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