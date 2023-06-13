<?php
require './element/mod/GiangvienCls.php';
require './element/mod/TrinhdoCls.php';
require './element/mod/DonviCls.php';
?>
<?php
    $giangvien = new giangvien();
    $list_giangvien = $giangvien->GiangvienGetName();
    $l = count($list_giangvien);
    ?>
    <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php
    if ($l > 0) {
        ?>
        <h1 class="h3 mb-2 text-gray-800">Danh sách Giảng viên</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tên Giảng viên</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Email</th>
                                <th>Số điện thoại 1</th>
                                <th>Địa chỉ thường trú</th>
                                <th>Tên đơn vị</th>
                                <th>Tên trình độ</th>
                                <th>Xóa</th>
                                <th>Cập nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_giangvien as $v) {
                                ?>
                                <tr>
                                    <td><?php echo $v->ten_giangvien; ?></td>
                                    <td align="center"><?php
                                        if ($v->gioitinh == 0) {
                                            ?>
                                            <img class="icoming" src="./Image/nu.jpg"/>
                                            <?php
                                        } else {
                                            ?>   
                                            <img class="icoming" src="./Image/nam.jpg"/>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $v->ngaysinh; ?></td>
                                    <td><?php echo $v->email; ?></td>
                                    <td><?php echo $v->sodienthoai1; ?></td>
                                    <td><?php echo $v->diachithuongtru; ?></td>
                                    <td><?php echo $v->ten_donvi; ?></td>
                                    <td><?php echo $v->ten_trinhdo; ?></td>
                                    <td>
                                        <?php
                                        if (isset($_SESSION['ADMIN'])) {
                                            ?>
                                        
                                            <img class="iconimg" src="./Image/delete.png" onclick="confirm_sweet('./element/mGiangvien/GiangvienAct.php?reqact=deletegiangvien&id_giangvien=<?php echo $v->id_giangvien; ?>')">
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
                                            <a href="index.php?req=updategiangvien&id_giangvien=<?php echo $v->id_giangvien; ?>">
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