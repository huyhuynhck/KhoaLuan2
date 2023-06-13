<?php
require './element/mod/SinhvienCls.php';
require './element/mod/LophocCls.php';
?>
<?php
    $sinhvien = new sinhvien();
    $list_sinhvien = $sinhvien->SinhvienGetAll();
    $l = count($list_sinhvien);
    ?>
    <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php
    if ($l > 0) {
        ?>
        <h1 class="h3 mb-2 text-gray-800">Danh sách Sinh viên</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Mã Sinh viên</th>
                                <th>Tên Sinh viên</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ thường trú</th>
                                <th>Xóa</th>
                                <th>Cập nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_sinhvien as $v) {
                                ?>
                                <tr>
                                    <td><?php echo $v->ma_sinhvien; ?></td>
                                    <td><?php echo $v->ten_sinhvien; ?></td>
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
                                    
                                    <td>
                                        <?php
                                        if (isset($_SESSION['ADMIN'])) {
                                            ?>
                                            
                                            <img class="iconimg" src="./Image/delete.png" onclick="confirm_sweet('./element/msinhvien/SinhvienAct.php?reqact=deletesinhvien&id_sinhvien=<?php echo $v->id_sinhvien; ?>')">
                                            
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
                                                isset($_SESSION['ADMIN']) and
                                                $v->svname = 'admin') {
                                            ?>
                                            <a href="index.php?req=updatesinhvien&id_sinhvien=<?php echo $v->id_sinhvien; ?>">
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