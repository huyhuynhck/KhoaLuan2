<?php
require './form/mod/indexcount.php';
if(!isset($_SESSION['USER'])){
    header('location: ../user/loginuser.php');
}
?>

    <?php
    $indexcount = new indexcount();
    $list_indexcount = $indexcount->indexcount__Get_All();
    $l = count($list_indexcount);
    ?>
    <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php
    if ($l > 0) {
        ?>
        <h1 class="h3 mb-2 text-gray-800">Danh sách cán bộ</h1>           
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <!-- <th>Mã cán bộ</th> -->
                                <th>Tên đợt</th>
                                <th>Xem lương</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_indexcount as $v) {
                                ?>
                                <tr>
                                    
                                    <td><?php echo $v->ten_index; ?></td>
                                    <td><a class="btn btn-success btn-rounded" href="indexuser.php?req=userviewluong&id_index=<?= $v->id_index?>&id_canbo=<?= $_SESSION['USER']->id_canbo?>">Xem Lương</a></td>
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