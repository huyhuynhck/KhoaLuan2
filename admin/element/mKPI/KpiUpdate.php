
<!-- kpi-->
<?php// if($_POST['page_update'] == 'kpi'):?>

<?php
    require "./element/mod/KPI.php";

    $id_kpi = $_GET['id_kpi'];
    $kpi = new kpi();
    $kpi__Get_By_Id = $kpi->kpi__Get_By_Id($id_kpi);
    $nhomkpi__Get_All = $kpi->nhomkpi__Get_All();

    ?>

<div class="main-container__add-form">
    <div class="text-title">
        Cập nhật công việc</b>
        <div class="btn_hide">
            <i class='bx bx-window-close'></i>
        </div>

    </div>

    <form action="./element/mKPI/KpiAct.php?page=kpi&req=update" method="post" enctype="multipart/form-data">
        <input type="hidden" id="id_kpi" name="id_kpi" class="form-control" required readonly required
            value="<?=$id_kpi?>">
        
            <div class="form-group m-1">
                    <label for="">Chọn nhóm công việc</label>
                    <select class="form-select" required name="id_nhom_kpi">
                        <?php foreach($nhomkpi__Get_All as $item):?>
                            <option value="<?=$item->id_nhom_kpi?>">
                                <?=$item->ten_nhom_kpi?>
                            </option>
                        <?php endforeach?>
                    </select>
                </div>


        
        <div class="m-1">
            <div class="form-group mt-1">
                <label for="">Tên công việc</label>
                <input type="text" class="form-control" name="ten_kpi" placeholder='Nhập tên KPI' id="ten_kpi" required
                    value="<?=$kpi__Get_By_Id->ten_kpi?>" />
            </div>
            <div class="form-group mt-1">
                <label for="">Số lượng</label>
                <input type="number" max='999999999' step='any' class="form-control hp  w-100" name="don_vi_cb"
                    placeholder='Nhập đơn vị' id="don_vi_cb" value="<?=$kpi__Get_By_Id->don_vi_cb?>" />
            </div>
            <div class="form-group mt-1">
                <label for="">Quy đổi số tiết</label>
                <input type="number" max='999999999' step='any' class="form-control hp  w-100" name="he_so_tc"
                    placeholder='Nhập hệ số' id="he_so_tc" required value="<?=$kpi__Get_By_Id->he_so_tc?>" />
            </div>
            <div class="form-group mt-1">
                <label for="">Ghi chú</label>
                <textarea class="form-control" name="ghi_chu_kpi"
                    id="ghi_chu_kpi"><?=$kpi__Get_By_Id->ghi_chu_kpi?></textarea>
            </div>
            <div class="form-group mt-5 t-center">
                <button type="submit" class="btn btn-danger">Cập nhật thông tin</button>
            </div>
        </div>
    </form>
</div>

<script>
var btn_hide = document.querySelector(".btn_hide");
$('.ttbs_update').toggle(0, 'linear');

btn_hide.addEventListener("click", function() {
    $('.main-container__add').show();
    $('.main-container__update').hide();
    $('.main-container__add').removeClass("hide");

    $('.main-container__add').removeClass("w-30");
    $('.main-container__add').addClass("w-30");

    $('.main-container__update').removeClass("w-30");
    $('.main-container__update').addClass("w-0");
});
</script>
<?php // endif?>

<!-- end kpi -->

<!-- ///////////////////////////////////////// -->

