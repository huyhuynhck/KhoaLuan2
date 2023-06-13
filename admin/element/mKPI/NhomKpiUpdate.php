<!-- nhom-kpi-->
<?php //if($_POST['page_update'] == 'nhom-kpi'):?>

<?php
    require "./element/mod/KPI.php";
    $id_nhom_kpi = $_GET['id_nhom_kpi'];
    $kpi = new kpi();
    $nhomkpi__Get_By_Id = $kpi->nhomkpi__Get_By_Id($id_nhom_kpi);

    ?>

<div class="main-container__add-form">
    <div class="text-title">
        Cập nhật nhóm kpi</b>
        <div class="btn_hide">
            <i class='bx bx-window-close'></i>
        </div>

    </div>

    <form action="./element/mKPI/KpiAct.php?page=nhom-kpi&req=update" method="post" enctype="multipart/form-data">
        <input type="hidden" id="id_nhom_kpi" name="id_nhom_kpi" class="form-control" required readonly required
            value="<?=$id_nhom_kpi?>">
        <div class="m-1">
            <div class="form-group mt-1">
                <label for="">Tên nhóm kpi</label>
                <input type="text" id="ten_nhom_kpi" name="ten_nhom_kpi" class="form-control" required="" required
                    value="<?=$nhomkpi__Get_By_Id->ten_nhom_kpi?>" />
            </div>

            <div class="form-group mt-1">
                <label for="">Ghi chú</label>
                <textarea class="form-control" name="ghi_chu" id="ghi_chu"><?=$nhomkpi__Get_By_Id->ghi_chu?></textarea>
            </div>
            <div class="form-group mt-2 mb-5 t-center">
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
<?php //endif?>