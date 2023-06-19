<?php
require './element/mod/PhanquyenCls.php';
?>
<div>Quản Lý phân quyền</div>
<hr>

<div>
<?php
    
    ?>
    <form name="newphanquyen" id="formreg" method="post" action="./element/mPhanquyen/PhanquyenAct.php?reqact=addnew">
    <div class="form">
        <div class="form-group">
            <label>Tên phân quyền:</label>
            <input required class="form-control" type="text" name="ten_phanquyen">
        </div>
        <div class="form-group">
            <label>Mô tả:</label>
            <input class="form-control" type="text" name="mota">
        </div>
        <div class="form-group mt-2">
            <input class='btn btn-success' type="submit" id="btnsubmit" value="Tạo mới">
            <input class='btn btn-secondary' type="reset" value="Làm lại"><b id="noteForm"></b>
        </div>
    </div>    
    </form>
</div>
<hr/>
<?php
    $phanquyen = new phanquyen();
    $list_phanquyen = $phanquyen->PhanquyenGetAll();
    $l = count($list_phanquyen);
    ?>
   <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php
    if ($l > 0) {
        ?>
        <h1 class="h3 mb-2 text-gray-800">Danh sách phân quyền</h1>           
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tên phân quyền</th>
                                <th>Xóa</th>
                                <th>Cập nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_phanquyen as $v) {
                                ?>
                                <tr>
                                    <td><?php echo $v->ten_phanquyen; ?></td>
                                    <td  class="t-right">
                                        <?php
                                        if (isset($_SESSION['ADMIN'])) {
                                            ?>
                                                
                                                <i class="far fa-trash-alt" onclick="return confirm_sweet('./element/mPhanquyen/PhanquyenAct.php?reqact=deletephanquyen&id_phanquyen=<?php echo $v->id_phanquyen; ?>')"></i>
                                            
                                            <?php
                                        } else {
                                            ?>
                                            <img class="far fa-trash-alt">
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
                                            <a href="index.php?req=updatephanquyen&id_phanquyen=<?php echo $v->id_phanquyen; ?>">
                                                <i class="fas fa-sync-alt"></i>
                                            </a>
                                            
                                            <?php
                                        } else {
                                            ?>
                                            <i class="fas fa-sync-alt"></i>
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