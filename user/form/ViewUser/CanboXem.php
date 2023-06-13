<?php
require './form/mod/CanboCls.php';
?>

    <?php
    $canbo = new canbo();
    $list_canbo = $canbo->CanboGetName();
    $l = count($list_canbo);
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
                                <th>Tên cán bộ</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ thường trú</th>
                                <th>Ngày vào làm</th>
                                <th>Đơn vị</th>
                                <th>Trình độ</th>
                                <th>Phân loại</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_canbo as $v) {
                                ?>
                                <tr>
                                    
                                    <td><?php echo $v->ten_canbo; ?></td>
                                    <td align="center"><?php
                                        if ($v->gioitinh == 0) {
                                            ?>
                                            <img class="icoming" style="width: 30px" src="./form/Image/nu.jpg"/>
                                            <?php
                                        } else {
                                            ?>   
                                            <img class="icoming" style="width: 30px" src="./form/Image/nam.jpg"/>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $v->ngaysinh; ?></td>
                                    <td><?php echo $v->diachithuongtru; ?></td>
                                    <td><?php echo $v->ngay_vao_lam; ?></td>
                                    <td><?php echo $v->ten_donvi; ?></td>
                                    <td><?php echo $v->ten_trinhdo; ?></td>
                                    <td><?php echo $v->ten_phan_loai; ?></td>
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