<?php
require './element/mod/PhanquyenCls.php';
require './element/mod/DonviCls.php';
$phanquyen = new phanquyen();
$donvi = new donvi();
?>
<div>Quản Lý Tài Khoản Cán Bộ Khoa</div>
<hr>
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
                <div class="form-check">
                    <input class="form-check-input" type="hidden" name="gioitinh" id="gioitinh1" value="1" checked="true">
                </div>
            </div>
            <div class='form-group'>
                <input required class="form-control" type="hidden" name="ngaysinh" value="NULL"/>
            </div>
            <div class='form-group'>
                <input required class="form-control" type="hidden" name="diachi" value="NULL"/>
            </div>
            <div class='form-group'>
                <input required class="form-control" type="hidden" name="dienthoai" value="0"/>
            </div>
            <div class='form-group'>
                <label>Phân quyền:</label>
                <select name="id_phanquyen" required class="form-control">
                    <?php 
                        foreach($phanquyen->PhanquyenGetAll() as $item):
                    ?>
                    <option value="<?=$item->id_phanquyen?>">
                            <?=$item->ten_phanquyen?>
                    </option>
                    <?php endforeach?>
                </select>
            </div>

            <div class='form-group'>
                <label>Đơn vị:</label>
                <select name="id_donvi" required class="form-control">
                    <?php 
                        foreach($donvi->DonviGetAll() as $item):
                    ?>
                    <option value="<?=$item->id_donvi?>">
                            <?=$item->ten_donvi?>
                    </option>
                    <?php endforeach?>
                </select>
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
                            <th>Mật khẩu</th>
                            <th>Phân quyền</th>
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
                                <td><?php echo $v->password; ?></td>
                                <td><?php echo $phanquyen->PhanquyenGetbyId($v->id_phanquyen)->ten_phanquyen; ?></td>
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
