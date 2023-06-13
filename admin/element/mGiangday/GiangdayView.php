<?php
require './element/mod/GiangdayCls.php';
require './element/mod/LoaiGDCls.php';
?>
<div>Quản Lý Giảng dạy</div>
<hr>
<div>Giảng dạy mới</div>
<div>
<?php
    $loaigiangday = new loaigiangday();
    $list_loaigiangday = $loaigiangday->LoaiGDGetAll();
    $l = count($list_loaigiangday);
    ?>
    <form name="newgiangday" id="formreg" method="post" action="./element/mGiangday/GiangdayAct.php?reqact=addnew">
        <div class="form">
            <div class="form-group">
                <label>Số Sinh Viên:</label>
                <input required class='form-control' type="text" name="sosv">
            </div>
            <div class="form-group">
                <label>Số Nhóm:</label>
                <input required class='form-control' type="text" name="sonhom">
            </div>
            </div>
            <div class="form-group">
                <label>Số tiết môn học:</label>
                <input required class='form-control' type="text" name="sotietmonhoc">
            </div>
            <div class="form-group">
                <label>số tiết thực giảng:</label>
                <input required class='form-control' type="text" name="sotietthucgiang">
            </div>
            <div class="form-group">
                <label>Hệ số lớp:</label>
                <input required class='form-control' type="tel" name="hesolop">
            </div>
            <div class="form-group">
                <label>Hệ số tín chỉ:</label>
                <input required class='form-control' type="tel" name="hesotinchi">
            </div>
            <div class="form-select"> 
                <label>Loại giảng dạy</label>
                <select class="form-select" name="tenloai">
                    <?php
                        foreach ($list_loaigiangday as $v) {
                            ?>
                                <option>
                                    <?php echo $v->ten_loaigiangday ?>
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
    $giangday = new giangday();
    $list_giangday = $giangday->GiangdayGetAll();
    $l = count($list_giangday);
    ?>
    <p></p>
    <?php
    if ($l > 0) {
        ?>
        <h1 class="h3 mb-2 text-gray-800">Dữ liệu trong bảng có: <?php echo $l; ?></h1>
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