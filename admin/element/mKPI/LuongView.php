<?php require './element/mod/KPI.php'?>
<?php require './element/mod/indexcount.php'?>
<?php require './element/mod/format.php'?>

<!-- luong-->
<?php //if(isset($_GET['req']) && $_GET['req'] == 'luong'):?>

<?php
    $id_donvi = $_SESSION['ADMIN']->id_donvi;

    $current_date = date('Y-m-d');
    if(isset($_GET['current_date'])) {
        $current_date = $_GET['current_date'];
    }
    
    $indexcount = new indexcount();
    $fm = new format();
    $indexcount__Get_By_Date = $indexcount->indexcount__Get_By_Date($current_date);
    $id_index = isset($indexcount__Get_By_Date->id_index) ? $indexcount__Get_By_Date->id_index : $indexcount->indexcount__Get_Last_Index()->id_index;
    
    if(isset($_GET['id_index'])) {
        $id_index = $_GET['id_index'];
    }
    $indexcount = new indexcount();
    $indexcount__Get_By_Id = $indexcount->indexcount__Get_By_Id($id_index);
    $indexcount__Get_All = $indexcount->indexcount__Get_All();
    $kpi = new kpi();
    $luong__Get_By_Index_Group_By_Nhan_Vien = $kpi->luong__Get_By_Index_Group_By_Nhan_Vien($id_index, $id_donvi);
    $luong__Get_Nhan_Vien_By_Id_Index_Not_In = $kpi->luong__Get_Nhan_Vien_By_Id_Index_Not_In($id_index, $id_donvi);

    $da_xac_nhan = 0;
    $sum_xac_nhan = 0;
    foreach($luong__Get_By_Index_Group_By_Nhan_Vien as $item){
        $da_xac_nhan += $item->thanh_tien > 0 ? 1 : 0;
        foreach($kpi->luong__Get_By_Id_Nhan_Vien_And_Id_Index($item->id_canbo, $id_index) as $item_2){
            $sum_xac_nhan += $item_2->thanh_tien;
        }
    }

?>

<!-- main-container -->

<div class="main-container">
    <div class="main-container__add w-400px">
        <div class="main-container__add-form">
            <div class="text-title">
                Thêm KPI  <?=$id_donvi ?>
                <div class="text-muted">
                    Vui lòng chọn kỳ chấm công
                </div>
            </div>
            <form action="./element/mKPI/KpiAct.php?page=luong&req=add" method="post" enctype="multipart/form-data">
                <div class="form-group mt-1 d-flex">
                    <div class="form-group">
                        <label class="">Chọn kỳ</label>
                        <input type="hidden" name="id_index" value="<?=$id_index?>">
                        <select name="id_index_" id="id_index" required="" onchange="location = this.value;"
                            class="form-control w-fct">
                            <option value="../admin/index.php?req=viewluong&id_index=<?= $indexcount__Get_By_Id->id_index; ?>">
                                <?= $indexcount__Get_By_Id->ten_index; ?>
                                (<?=date('d/m/Y', strtotime($indexcount__Get_By_Id->ngay_bat_dau))?> -
                                <?=date('d/m/Y', strtotime($indexcount__Get_By_Id->ngay_ket_thuc))?>)</option>
                            <?php foreach ($indexcount__Get_All as $item) :?>
                            <?php if($indexcount__Get_By_Id->id_index != $item->id_index):?>
                            <option value="../admin/index.php?req=viewluong&id_index=<?= $item->id_index; ?>">
                                <?= $item->ten_index; ?>
                                (<?=date('d/m/Y', strtotime($item->ngay_bat_dau))?> -
                                <?=date('d/m/Y', strtotime($item->ngay_ket_thuc))?>)</option>
                            <?php endif?>
                            <?php endforeach?>
                        </select>
                    </div>
                    <?php if(count($luong__Get_By_Index_Group_By_Nhan_Vien)>0):?>
                    <button class="btn btn-danger m-2 mt-4" type="button"
                        onclick="return confirm_sweet('./element/mKPI/KpiAct.php?page=luong&req=delete&id_index=<?=$id_index?>')">Xóa đợt này
                    </button>
                    <?php else:?>
                    <div class="form-group m-2 mt-4">
                        <button class="btn btn-primary" type="submit">Khởi tạo</button>
                    </div>
                    <?php endif?>
                </div>
            </form>
            <br>
            <?php if(count($luong__Get_Nhan_Vien_By_Id_Index_Not_In)>0):?>
            <form action="./element/mKPI/KpiAct.php?page=luong&req=add_by_nv" method="post" enctype="multipart/form-data">
                <div class="form-group mt-1 d-flex">
                    <div class="form-group">
                        <input type="hidden" name="id_index" value=<?=$id_index?>>
                        <label class="">Chọn nhân viên chưa có bảng lương</label>
                        <select name="id_nv" id="id_nv" required="" class="form-control w-fct">
                            <?php foreach ($luong__Get_Nhan_Vien_By_Id_Index_Not_In as $item) :?>
                            <option value="<?=$item->id_nv; ?>">
                                <?= $item->ho_ten ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="form-group m-2 mt-4">
                        <button class="btn btn-primary" type="submit">Tạo bảng lương</button>
                    </div>
                </div>
            </form>
            <?php endif?>
            <br>
            <?php if(count($luong__Get_By_Index_Group_By_Nhan_Vien)<1):?>
            <!-- <form action="./element/mKPI/KpiAct.php?page=luong&req=copy_luong" method="post" enctype="multipart/form-data">
                <div class="form-group mt-1 d-flex">
                    <div class="form-group">
                        <input type="hidden" name="id_index" value=<?=$id_index?>>
                        <label class="">Chọn Kỳ để copy</label>
                        <select name="id_index_copy" id="id_index_copy" required="" class="form-control">
                            <?php foreach ($indexcount__Get_All as $item) :?>
                            <?php if($item->id_index != $id_index):?>
                            <option value="<?= $item->id_index; ?>">
                                <?= $item->ten_index; ?>
                                (<?=date('d/m/Y', strtotime($item->ngay_bat_dau))?> -
                                <?=date('d/m/Y', strtotime($item->ngay_ket_thuc))?>)</option>
                            <?php endif?>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="form-group m-2 mt-4">
                        <button class="btn btn-danger" type="submit">Copy</button>
                    </div>
                </div>
            </form> -->
            <?php endif?>


        </div>
    </div>
    <div class="main-container__update w-0"></div>
    <div class="main-container__view w-100-400px">
        <div class="text-title">
            Khu vực hiển thị
            <div class="text-muted">
                Số lượng: <b class="text-danger"><?=count($luong__Get_By_Index_Group_By_Nhan_Vien)?> </b>
                <br>
                Đã xác nhận lương: <b class="text-danger"><?=$da_xac_nhan?> /
                    <?=count($luong__Get_By_Index_Group_By_Nhan_Vien)?> Nhân viên
                    (<?=$sum_xac_nhan?>)</b>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table" style="width:100%" id="table_quan_ly_kpi__luong">
                <thead>
                    <tr class="title_table">
                        <td>#</td>
                        <td>Tên nhân viên</td>
                        <td>Số KPI</td>
                        <td>Số ngày vắng</td>
                        <td>Lương thực nhận</td>
                        
                        <td></td>
                        <td></td>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 0?>
                    <?php foreach($luong__Get_By_Index_Group_By_Nhan_Vien as $item): ?>
                    <tr class="td_hover" onclick="update_obj(<?=$item->id_canbo?>)">
                        <td><?=++$count?></td>
                        <td><?=$item->ten_canbo?></td>
                        <?php
                            $sum_kpi = 0;
                            $sum_luong = 0;
                            foreach($kpi->luong__Get_By_Id_Nhan_Vien_And_Id_Index($item->id_canbo, $id_index) as $item_2){
                                $sum_kpi++;
                                $sum_luong += $item_2->thanh_tien;
                            }
                        ?>
                        <td><?=$item->so_ngay_vang == -1 ? "Chưa xác nhận" : $sum_kpi?></td>
                        <td><?=$item->so_ngay_vang == -1 ? "Chưa xác nhận" : $item->so_ngay_vang?></td>
                        <td><?=$item->so_ngay_vang == -1 ? "Chưa xác nhận" : $fm->format_money($sum_luong)?></td>
                        
                        <td class="t-right"
                            onclick="return confirm_sweet('./element/mKPI/KpiAct.php?page=luong&req=delete_by_nv&id_canbo=<?=$item->id_canbo?>&id_index=<?=$item->id_index?>')">
                            <i class="fas fa-trash-alt"></i>
                        </td>

                        
                        <td class="t-right">
                            <a class="fas fa-sync-alt" href='./index.php?req=update-luong&id_canbo=<?=$item->id_canbo?>&id_index=<?=$item->id_index?>'></a>
                            
                        </td>
                    </tr>
                    <?php endforeach?>

                </tbody>
            </table>
        </div>
    </div>

    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script>
    window.addEventListener('load', function() {
        $('.main-container__update').hide();

        var btn_ttbs = document.querySelector(".btn_ttbs");

        $('#table_quan_ly_kpi__luong').DataTable({
            fixedHeader: true,
            "lengthMenu": [
                [-1, 10, 25, 50],
                ["All", 10, 25, 50]
            ],
        });

    });

    function update_obj(id_nv) {
        var update = document.querySelector(".main-container__update");
        var view = document.querySelector(".main-container__view");
        var add = document.querySelector(".main-container__add");

        update.classList.remove("w-0");
        update.classList.add("w-685px");
        add.classList.remove("w-400px");
        add.classList.add("w-800px");
        add.classList.add("hide");
        view.classList.remove("w-100-400px");
        view.classList.add("w-100-800px");
        $('.main-container__update').show();

        id_index = $('#id_index').val();
        $.post("quan-ly-kpi/update.php", {
            page_update: "luong",
            id_nv: id_nv,
            id_index: id_index,
        }, function(data, status) {
            $(".main-container__update").html(data);
        });
    };
    </script>
</div> 


<!-- end luong-->
<!-- end main-container -->