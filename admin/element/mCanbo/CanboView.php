<?php
require './element/mod/CanboCls.php';
require './element/mod/TrinhdoCls.php';
require './element/mod/DonviCls.php';
require './element/mod/PhanloaiCls.php';
?>
<div>Quản Lý Cán Bộ</div>
<hr>
<div>
<?php
    $canbo = new canbo();
    $list_canbo = $canbo->CanboGetAll();
    $l = count($list_canbo);
    ?>
    <form name="newcanbo" id="formreg" method="post" action="./element/mCanbo/CanboAct.php?reqact=addnew">
        <div class="form">
            <div class="form-group">
                <label>Mã cán bộ:</label>
                <input required class='form-control' type="text" name="ma_canbo">
            </div>
            <div class="form-group">
                <label>Tên cán bộ:</label>
                <input required class='form-control' type="text" name="ten_canbo">
            </div>
            <div class="form-group">
                <label>Giới tính:</label>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="gioitinh" id="gioitinh1" value="1" check="true">
                    <label class="form-check-label" for="gioitinh1">
                        Nam
                    </label>
                </div>
                <div class="form-check">
                    <input required class="form-check-input" type="radio" name="gioitinh" id="gioitinh2" value="0" check="true">
                    <label class="form-check-label" for="gioitinh2">
                        Nữ
                    </label>
                </div>
                
            </div>
            <div class="form-group">
                <label>Ngày sinh:</label>
                <input required class='form-control' type="date" name="ngaysinh">
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input required class='form-control' type="email" name="email">
            </div>
            <div class="form-group">
                <label>Số điện thoại:</label>
                <input required class='form-control' type="number" name="sodienthoai1">
            </div>
            <div class="form-group">
                <label>Địa chỉ thường trú:</label>
                <input required class='form-control' type="text" name="diachithuongtru">
            </div>
            <div class="form-group">
                <label>Ngày vào làm:</label>
                <input required class='form-control' type="date" name="ngay_vao_lam">
            </div>
            <div>
                <?php
                    $trinhdo = new trinhdo();
                    $list_trinhdo = $trinhdo->TrinhdoGetAll();
                ?>
                <label>Trình độ</label>
                <select class="form-control" aria-label="Default select example" require name="id_trinhdo">
                <?php
                    foreach ($list_trinhdo as $td) {
                        ?>
                        <option value="<?php echo $td->id_trinhdo?>">
                            <?php echo $td->ten_trinhdo; ?>
                        </option>
                        <?php 
                    }
                ?>  
            </select>
            </div>
            <div>
                    <?php
                        $donvi = new donvi();
                        $list_donvi = $donvi->DonviGetAll();
                    ?>
                <label>Đơn vị</label>
                <select class="form-control" aria-label="Default select example" require name="id_donvi">
                    
                    <?php
                        foreach ($list_donvi as $dv) {
                            ?>
                            <option value="<?php echo $dv->id_donvi?>">
                                <?php echo $dv->ten_donvi; ?>
                            </option>
                            <?php 
                        }
                    ?>
                    
                </select>
            </div>
            <div>
                    <?php
                        $phanloai = new phanloai();
                        $list_phanloai = $phanloai->PhanloaiGetAll();
                    ?>
                <label>Phân loại</label>
                <select class="form-control" aria-label="Default select example" require name="id_phan_loai">
                    
                    <?php
                        foreach ($list_phanloai as $pl) {
                            ?>
                            <option value="<?php echo $pl->id_phan_loai?>">
                                <?php echo $pl->ten_phan_loai; ?>
                            </option>
                            <?php 
                        }
                    ?>
                    
                </select>
            </div>
                <div class="form-group mt-2">
                    <input require class="btn btn-success" type="submit" value="Tạo mới" id="btnsubmit">
                    <input require class="btn btn-secondary" type="reset" value="Làm lại"/><b id="noteForm"></b>
                </div>
            </div>    
    </form>
</div>
<hr/>

    <?php
    $canbo = new canbo();
    $list_canbo = $canbo->CanboGetName();
    $l = count($list_canbo);
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
                                <!-- <th>Mã cán bộ</th> -->
                                <th>Tên cán bộ</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ thường trú</th>
                                <th>Ngày vào làm</th>
                                <th>Đơn vị</th>
                                <th>Xóa</th>
                                <th>Cập nhật</th>
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
                                    <td><?php echo $v->sodienthoai1; ?></td>
                                    <td><?php echo $v->diachithuongtru; ?></td>
                                    <td><?php echo $v->ngay_vao_lam; ?></td>
                                    <td><?php echo $v->ten_donvi; ?></td>
                                    <td>
                                        <?php
                                        if (isset($_SESSION['ADMIN'])) {
                                            ?>
                                            <img class="iconimg" src="./Image/delete.png" onclick="confirm_sweet('./element/mCanbo/CanboAct.php?reqact=deletecanbo&id_canbo=<?php echo $v->id_canbo; ?>')">
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
                                            <a href="index.php?req=updatecanbo&id_canbo=<?php echo $v->id_canbo; ?>">
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