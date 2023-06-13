<?php
    require './element/mod/GiangdayCls.php';
    require './element/mod/LoaiGDCls.php';
?>
<?php
    $giangday = new giangday();
    $list_giangday = $giangday->GiangdayGetAll();
    $l = count($list_giangday);
    ?>
    <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php
    if ($l > 0) {
        ?>
        <h1 class="h3 mb-2 text-gray-800">Danh sách Giảng dạy</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Số sinh viên</th>
                                <th>Số nhóm</th>
                                <th>Số tiết môn học</th>
                                <th>Số tiết thực giảng</th>
                                <th>Hệ số nhóm, lớp</th>
                                <th>Hệ số tín chỉ</th>
                                <th>Loại giảng dạy</th>
                                <th>Xóa</th>
                                <th>Cập nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_giangday as $v) {
                                ?>
                                <tr>
                                    <td><?php echo $v->sosv; ?></td>
                                    <td><?php echo $v->sonhom; ?></td>
                                    <td><?php echo $v->sotietmonhoc; ?></td>
                                    <td><?php echo $v->sotietthucgiang; ?></td>
                                    <td><?php echo $v->hesolop; ?></td>
                                    <td><?php echo $v->hesotinchi; ?></td>
                                    <td><?php echo $v->tenloai; ?></td>
                                    <td>
                                        <?php
                                        if (isset($_SESSION['ADMIN'])) {
                                            ?>
                                            <img class="iconimg" src="./Image/delete.png" onclick="confirm_sweet('./element/mGiangday/GiangdayAct.php?reqact=deletegiangday&ma_giangday=<?php echo $v->ma_giangday; ?>')">

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
                                            <a href="index.php?req=updategiangday&ma_giangday=<?php echo $v->ma_giangday; ?>">
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
        <?php
    }
    ?>
</div>