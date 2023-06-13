<?php require './element/mod/KPI.php'?>
<?php require './element/mod/indexcount.php'?>

<?php
    $kpi = new kpi();
     $kpi__Get_All = $kpi->kpi__Get_All();
     $nhomkpi__Get_All = $kpi->nhomkpi__Get_All();
     
?>

<!-- main-container -->

<div class="main-container">
    <div class="main-container__add w-300px">
        <div class="main-container__add-form">
            <div class="text-title">
                Thêm KPI
                <div class="text-muted">
                    Vui lòng điền thông tin
                </div>
            </div>
            <form action="./element/mKPI/KpiAct.php?page=kpi&req=add" method="post" enctype="multipart/form-data">
                <div class="form-group m-1">
                    <label for="">Chọn nhóm kpi</label>
                    <select class="form-select" required name="id_nhom_kpi">
                        <?php foreach($nhomkpi__Get_All as $item):?>
                            <option value="<?=$item->id_nhom_kpi?>">
                                <?=$item->ten_nhom_kpi?>
                            </option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="form-group mt-1">
                    <label for="">Tên KPI</label>
                    <input type="text" class="form-control" required name="ten_kpi" id="ten_kpi">
                </div>
                <div class="form-group mt-1">
                    <label for="">Đơn vị cơ bản</label>
                    <input type="currency" class="form-control w-100" required name="don_vi_cb" id="don_vi_cb">
                </div>
                <div class="form-group mt-1">
                    <label for="">Hệ số tham chiếu</label>
                    <input type="currency" class="form-control" required name="he_so_tc" id="he_so_tc">
                </div>
                <div class="form-group mt-1">
                    <label for="">Ghi chú</label>
                    <textarea class="form-control" name="ghi_chu_kpi" id="ghi_chu_kpi"></textarea>
                </div>
                <div class="form-group mt-5 t-center">
                    <button type="submit" class="btn btn-success">Thêm</button>
                </div>
            </form>
        </div>
    </div>
    <div class="main-container__update w-0"></div>
    <div class="main-container__view w-100-300px">
        <div class="text-title">
            Khu vực hiển thị
            <div class="text-muted">
                <b>Nhóm KPI: <?=count($kpi__Get_All)?> </b>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table" style="width:100%" id="table_quan_ly_kpi__kpi">
                <thead>
                    <tr class="title_table">
                        <td>#</td>
                        <td>Tên nhóm KPI</td>
                        <td>Tên KPI</td>
                        <td>Đơn vị cơ bản</td>
                        <td>Hệ số tham chiếu</td>
                        <td>Ghi chú</td>
                        <td></td>
                        <td></td>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 0?>
                    <?php foreach($kpi__Get_All as $item): ?>
                    <tr class="td_hover" onclick="update_obj(<?=$item->id_kpi?>)">
                        <td><?=++$count?></td>
                        <td><?=$kpi->nhomkpi__Get_By_Id($item->id_nhom_kpi)->ten_nhom_kpi?></td>
                        <td><?=$item->ten_kpi?></td>
                        <td><?=$item->don_vi_cb?></td>
                        <td><?=$item->he_so_tc?></td>
                        <td><?=$item->ghi_chu_kpi?></td>
                        
                        <td
                            onclick="return confirm_sweet('./element/mKPI/KpiAct.php?page=kpi&req=delete&id_kpi=<?=$item->id_kpi?>')">
                            <i class="far fa-trash-alt"></i>
                        </td>
                        <td>
                            <a href="./index.php?req=update-nhom-kpi&id_nhom_kpi=<?=$item->id_nhom_kpi?>" class="fas fa-sync-alt"></a>
                        </td>
                     
                    </tr>
                    <?php endforeach?>

                </tbody>
            </table>
        </div>
    </div>

    <!-- <script>
    window.addEventListener('load', function() {
        $('.main-container__update').hide();

        var btn_ttbs = document.querySelector(".btn_ttbs");

        $('#table_quan_ly_kpi__kpi').DataTable({
            fixedHeader: true,

            "lengthMenu": [
                [-1, 10, 25, 50],
                ["All", 10, 25, 50]
            ],
        });

    });

    function update_obj(id_kpi) {
        var update = document.querySelector(".main-container__update");
        var view = document.querySelector(".main-container__view");
        var add = document.querySelector(".main-container__add");

        view.classList.add("w-100-300px");
        update.classList.remove("w-0");
        update.classList.add("w-300px");
        add.classList.add("hide");

        $('.main-container__update').show();


        $.post("quan-ly-kpi/update.php", {
            page_update: "kpi",
            id_kpi: id_kpi,
        }, function(data, status) {
            $(".main-container__update").html(data);
        });
    };
    </script> -->
</div>


<!-- end kpi-->

<!-- ///////////////////////////////////// -->

