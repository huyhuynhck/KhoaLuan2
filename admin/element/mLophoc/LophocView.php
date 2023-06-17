<?php
require './element/mod/LophocCls.php';
require './element/mod/KhoahocCls.php';
require './element/mod/NganhhocCls.php';
?>
<div>Quản Lý lớp học</div>
<hr>
<div>Lớp học mới</div>
<div>
<?php
    
    ?>
    <form name="newlophoc" id="formreg" method="post" action="./element/mLophoc/LophocAct.php?reqact=addnew">
    <div class="form">
        <div class="form-group">
            <label>Tên lớp học:</label>
            <input required class="form-control" type="text" name="ten_lophoc">
        </div>
        <div class="form-group">
            <label>Mô tả:</label>
            <input required class="form-control" type="text" name="mota">
        </div>
        <div>
                <?php
                    $khoahoc = new khoahoc();
                    $list_khoahoc = $khoahoc->KhoahocGetAll();
                ?>
                <label>Tên khoá học</label>
                <select class="form-control" aria-label="Default select example" required name="id_khoahoc">
                <?php
                    foreach ($list_khoahoc as $kh) {
                        ?>
                        <option value="<?php echo $kh->id_khoahoc?>">
                            <?php echo $kh->ten_khoahoc; ?>
                        </option>
                        <?php 
                    }
                ?>  
            </select>
            </div>
            <div>
                    <?php
                        $nganhhoc = new nganhhoc();
                        $list_nganhhoc = $nganhhoc->NganhhocGetAll();
                    ?>
                <label>Tên ngành học</label>
                <select class="form-control" aria-label="Default select example" required name="id_nganhhoc">
                    
                    <?php
                        foreach ($list_nganhhoc as $nh) {
                            ?>
                            <option value="<?php echo $nh->id_nganhhoc?>">
                                <?php echo $nh->ten_nganhhoc; ?>
                            </option>
                            <?php 
                        }
                    ?>
                    
                </select>
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
    $lophoc = new lophoc();
    $list_lophoc = $lophoc->LophocGetAll();
    $l = count($list_lophoc);
    ?>
   <p>Trong bảng có <b><?php echo $l; ?></b></p>
    <?php
    if ($l > 0) {
        ?>
        <h1 class="h3 mb-2 text-gray-800">Danh sách lớp học</h1>           
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tên lớp học</th>
                                <th>Mô tả</th>
                                <th>Xóa</th>
                                <th>Cập nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_lophoc as $v) {
                                ?>
                                <tr>
                                    <td><?php echo $v->ten_lophoc; ?></td>
                                    <td><?php echo $v->mota; ?></td>
                                    <td  class="t-right">
                                        <?php
                                        if (isset($_SESSION['ADMIN'])) {
                                            ?>
                                                
                                                <i class="far fa-trash-alt" onclick="return confirm_sweet('./element/mLophoc/LophocAct.php?reqact=deletelophoc&id_lophoc=<?php echo $v->id_lophoc; ?>')"></i>
                                            
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
                                            <a href="index.php?req=updatelophoc&id_lophoc=<?php echo $v->id_lophoc; ?>">
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