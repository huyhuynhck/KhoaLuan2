<?php
require './element/mod/PhanloaiCls.php';
?>
<div>Quản Lý phân loại</div>
<hr>
<div>
<?php
    
    ?>
    <form name="newphanloai" id="formreg" method="post" action="./element/mPhanloai/PhanloaiAct.php?reqact=addnew">
    <div class="form">
        <div class="form-group">
            <label>Tên phân loại:</label>
            <input required class="form-control" type="text" name="ten_phan_loai">
        </div>
        <div class="form-group">
            <label>Ghi chú:</label>
            <input class="form-control" type="text" name="ghi_chu">
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
    $phanloai = new phanloai();
    $list_phanloai = $phanloai->PhanloaiGetAll();
    $l = count($list_phanloai);
    ?>
   <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php
    if ($l > 0) {
        ?>
        <h1 class="h3 mb-2 text-gray-800">Danh sách phân loại</h1>           
        <!-- DataTales ExamPle -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tên phân loại</th>
                                <th>Ghi chú</th>
                                <th>Xóa</th>
                                <th>Cập nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_phanloai as $v) {
                                ?>
                                <tr>
                                    <td><?php echo $v->ten_phan_loai; ?></td>
                                    <td><?php echo $v->ghi_chu; ?></td>
                                    <td  class="t-right">
                                        <?php
                                        if (isset($_SESSION['ADMIN'])) {
                                            ?>
                                                
                                                <i class="far fa-trash-alt" onclick="return confirm_sweet('./element/mPhanloai/PhanloaiAct.php?reqact=deletephanloai&id_phan_loai=<?php echo $v->id_phan_loai; ?>')"></i>
                                            
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
                                            <a href="index.php?req=updatephanloai&id_phan_loai=<?php echo $v->id_phan_loai; ?>">
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