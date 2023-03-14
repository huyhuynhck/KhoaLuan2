<div>Quản Lý Người Dùng</div>
<hr>
<div>Người dùng mới</div>
<div>
    <form name="newuser" id="formreg" method="post" action="./element/mUser/userAct.php?reqact=addnew">
        <table>
            <tr>
                <td>Tên đăng nhập:</td>
                <td><input type="text" name="username"/></td>
            </tr>
            <tr>
                <td>Mật khẩu:</td>
                <td><input type="password" name="password"/></td>
            </tr>
            <tr>
                <td>Họ tên:</td>
                <td><input type="text" name="hoten"/></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>Nam<input type="radio" name="gioitinh" value="1" checked="true"/>
                    Nữ<input type="radio" name="gioitinh" value="0"/>
                </td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td><input type="date" name="ngaysinh"/></td>
            </tr>
            <tr>
                <td>Địa chỉ:</td>
                <td><input type="text" name="diachi"/></td>
            </tr>
            <tr>
                <td>Điện thoại:</td>
                <td><input type="tel" name="dienthoai"/></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Tạo mới"/></td>
                <td><input type="reset" value="Làm lại"/><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div>
<hr/>
<?php
require './element/mod/userCls.php';
?>
<div class="title_user">Danh sách người dùng</div>
<div class="content_user">
    <?php
    $User = new user();
    $list_User = $User->UserGetAll();
    $l = count($list_User);
    ?>
    <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php
    if ($l > 0) {
        ?>
        <table border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Họ tên</th>
                    <th>Giới tính</th>
                    <th>Ngày Sinh</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Ngày đăng ký</th>
                    <th>Trạng thái</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list_User as $v) {
                    ?>
                    <tr>
                        <td><?php echo $v->iduser; ?></td>
                        <td><?php echo $v->username; ?></td>
                        <td><?php echo $v->password; ?></td>
                        <td><?php echo $v->hoten; ?></td>
                        <td align="center"><?php
                            if ($v->gioitinh == 0) {
                                ?>
                                <img class="icoming" src="./Image/girl.png"/>
                                <?php
                            } else {
                                ?>   
                                <img class="icoming" src="./Image/boy.jpg"/>
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
                                        <img class="iconimg" src="./Image/lock.jpg">
                                    </a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="./element/mUser/userAct.php?reqact=setlock&iduser=<?php echo $v->iduser; ?>&ability=<?php echo $v->ability; ?>">
                                        <img class="iconimg" src="./Image/unlock.jpg">
                                    </a>
                                    <?php
                                }
                            } else {
                                if ($v->ability == 1) {
                                    ?>
                                    <img class="iconimg" src="./Image/lock.jpg">
                                    <?php
                                } else {
                                    ?>
                                    <img class="iconimg" src="./Image/unlock.jpg">
                                    <?php
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if (isset($_SESSION['ADMIN'])) {
                                ?>
                                <a href="./element/mUser/userAct.php?reqact=deleteuser&iduser=<?php echo $v->iduser; ?>">
                                    <img class="iconimg" src="./Image/delete.png">
                                </a>
                                <?php
                            } else {
                                ?>
                                <img class="iconimg" src="./Image/delete.png">
                                <?php
                            }
                            ?>
                            <?php
                            if (isset($_SESSION['USER']) and $v->username == 'admin') {
                                ?>
                                <img class="iconimg" src="./Image/updating.png">
                                <?php
                            } else {
                                ?>
                                <temps class="btnupdate" value="<?php echo $v->iduser; ?>">
                                    <img class="iconimg" src="./Image/updating.png">
                                </temps>
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
<script>
    $("temps").click(function () {
        var iduser = $(this).attr("value");
        $("#right_inner").load("./element/mUser/userUpdate.php?iduser=" + iduser);
    });
</script>