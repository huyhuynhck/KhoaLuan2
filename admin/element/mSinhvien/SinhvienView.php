<?php
require './element/mod/SinhvienCls.php';
require './element/mod/LophocCls.php';
?>
<div>Quản Lý Sinh viên</div>
<hr>
<div>Sinh viên mới</div>
<div>
<?php
    $sinhvien = new sinhvien();
    $list_sinhvien = $sinhvien->SinhvienGetAll();
    $l = count($list_sinhvien);
    ?>
    <form name="newsinhvien" id="formreg" method="post" action="./element/mSinhvien/SinhvienAct.php?reqact=addnew">
        <div class="form">
            <div class="form-group">
                <label>Mã Sinh viên:</label>
                <input required class='form-control' type="text" name="ma_sinhvien">
            </div>
            <div class="form-group">
                <label>Tên Sinh viên:</label>
                <input required class='form-control' type="text" name="ten_sinhvien">
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
                        $lophoc = new lophoc();
                        $list_lophoc = $lophoc->LophocGetAll();
                    ?>
                <label>Lớp học</label>
                <select class="form-select" aria-label="Default select example" name="id_lophoc">
                    <?php
                        foreach ($list_lophoc as $lh) {
                            ?>
                            <option value="<?php echo $lh->id_lophoc?>">
                                <?php echo $lh->ten_lophoc; ?>
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