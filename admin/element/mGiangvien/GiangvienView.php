<?php
require './element/mod/GiangvienCls.php';
require './element/mod/TrinhdoCls.php';
require './element/mod/DonviCls.php';
?>
<div>Quản Lý Giảng viên</div>
<hr>
<div>Giảng viên mới</div>
<div>
<?php
    $giangvien = new giangvien();
    $list_giangvien = $giangvien->GiangvienGetAll();
    $l = count($list_giangvien);
    ?>
    <form name="newgiangvien" id="formreg" method="post" action="./element/mGiangvien/GiangvienAct.php?reqact=addnew">
        <div class="form">
            <div class="form-group">
                <label>Mã Giảng viên:</label>
                <input required class='form-control' type="text" name="ma_giangvien">
            </div>
            <div class="form-group">
                <label>Tên Giảng viên:</label>
                <input required class='form-control' type="text" name="ten_giangvien">
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
                <input required class='form-control' type="tel" name="sodienthoai1">
            </div>
            <div class="form-group">
                <label>Địa chỉ thường trú:</label>
                <input required class='form-control' type="text" name="diachithuongtru">
            </div>
            <div>
                <?php
                    $trinhdo = new trinhdo();
                    $list_trinhdo = $trinhdo->TrinhdoGetAll();
                ?>
                <label>Trình độ</label>
                <select class="form-select" aria-label="Default select example" name="id_trinhdo">
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
                <label>Tên đơn vị</label>
                <select class="form-select" aria-label="Default select example" name="id_donvi">
                    
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
            <div class="form-group mt-2">
                <input require class="btn btn-success" type="submit" value="Tạo mới" id="btnsubmit">
                <input require class="btn btn-secondary" type="reset" value="Làm lại"/><b id="noteForm"></b>
            </div>
        </div>    
    </form>
</div>
<hr/>

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