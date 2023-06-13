<div>Quản Lý Người Dùng</div>
<hr>
<div>Người dùng mới</div>
<div>
    <form name="newuser" id="formreg" method="post" action="./element/mUser/userAct.php?reqact=addnew">
        <div class='form'>
            <div class='form-group'>
                <label>Tên đăng nhập:</label>
                <input required class="form-control" type="text" name="username"/>
            </div>
            <div class='form-group'>
                <label>Mật khẩu:</label>
                <input required class="form-control" type="password" name="password"/>
            </div>
            <div class='form-group'>
                <label>Họ tên:</label>
                <input required class="form-control" type="text" name="hoten"/>
            </div>
            <div class='form-group'>
                <label>Giới tính:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gioitinh" id="gioitinh1" value="1" checked="true">
                    <label class="form-check-label" for="gioitinh1">
                        Nam
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gioitinh" id="gioitinh2" value="0" checked="true">
                    <label class="form-check-label" for="gioitinh2">
                       Nữ
                    </label>
                </div>
            </div>
            <div class='form-group'>
                <label>Ngày sinh:</label>
                <input required class="form-control" type="date" name="ngaysinh"/>
            </div>
            <div class='form-group'>
                <label>Địa chỉ:</label>
                <input required class="form-control" type="text" name="diachi"/>
            </div>
            <div class='form-group'>
                <label>Điện thoại:</label>
                <input required class="form-control" type="tel" name="dienthoai"/>
            </div>
            <div class='form-group mt-2'>
                <input required class='btn btn-success' type="submit" id="btnsubmit" value="Tạo mới"/>
                <input required class='btn btn-sm btn-secondary' type="reset" value="Làm lại"/><b id="noteForm"></b>
            </div>
        </div>
    </form>
</div>
<hr/>
<?php
require './element/mod/userCls.php';
?>
    <?php
    $User = new user();
    $list_User = $User->UserGetAll();
    $l = count($list_User);
    ?>
    <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php
    if ($l > 0) {
        ?>
    <h1 class="h3 mb-2 text-gray-800">Danh sách người dùng</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Họ tên</th>
                            <th>Giới tính</th>
                            <th>Ngày Sinh</th>
                            <th>Địa chỉ</th>
                            <th>Điện thoại</th>
                            <th>Ngày đăng ký</th>
                            <th>Trạng thái</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list_User as $v) {
                            ?>
                            <tr>
                                <td><?php echo $v->username; ?></td>
                                <td><?php echo $v->hoten; ?></td>
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
                                <td><?php echo $v->diachi; ?></td>
                                <td><?php echo $v->dienthoai; ?></td>
                                <td><?php echo $v->ngaydangky; ?></td>
                                <td align="center">
                                    <?php
                                    if (isset($_SESSION['ADMIN'])) {
                                        if ($v->ability == 1) {
                                            ?>
                                            <a href="./element/mUser/userAct.php?reqact=setlock&iduser=<?php echo $v->iduser; ?>&ability=<?php echo $v->ability; ?>">
                                                <img class="fas fa-lock" src="">
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="./element/mUser/userAct.php?reqact=setlock&iduser=<?php echo $v->iduser; ?>&ability=<?php echo $v->ability; ?>">
                                                <img class="fas fa-lock-open" src="">
                                            </a>
                                            <?php
                                        }
                                    } else {
                                        if ($v->ability == 1) {
                                            ?>
                                            <img class="fas fa-lock" src="">
                                            <?php
                                        } else {
                                            ?>
                                            <img class="fas fa-lock-open" src="">
                                            <?php
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (isset($_SESSION['ADMIN'])) {
                                        ?>
                                        <img class="fas fa-trash-alt" onclick="confirm_sweet('./element/mUser/userAct.php?reqact=deleteuser&iduser=<?php echo $v->iduser; ?>')" src="">
                                        <?php
                                    } else {
                                        ?>
                                          <img class="fas fa-trash-alt" src="">
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
                                        <a href="index.php?req=updateuser&iduser=<?php echo $v->iduser; ?>">
                                            <img class="fas fa-sync-alt" src="">
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                            <img class="fas fa-sync-alt" src="">
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
