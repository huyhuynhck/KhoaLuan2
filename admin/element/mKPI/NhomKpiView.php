<?php require './element/mod/KPI.php'?>
<?php require './element/mod/indexcount.php'?>
<!-- nhom-kpi-->
<?php
    $kpi = new kpi();
    $nhomkpi__Get_All = $kpi->nhomkpi__Get_All();
?>

<!-- main-container -->

<div class="main-container">
    <div class="main-container__add w-300px">
        <div class="main-container__add-form">
            <div class="text-title">
                Thêm nhóm công việc
                <div class="text-muted">
                    Vui lòng điền thông tin
                </div>
            </div>
            <form action="./element/mKPI/KpiAct.php?page=nhom-kpi&req=add" method="post" enctype="multipart/form-data">
                <div class="form-group mt-1">
                    <label for="">Tên nhóm công việc</label>
                    <input type="text" class="form-control" required name="ten_nhom_kpi" id="ten_nhom_kpi">
                </div>
                <div class="form-group mt-1">
                    <label for="">Ghi chú</label>
                    <textarea class="form-control" name="ghi_chu" id="ghi_chu"></textarea>
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
                <b>Nhóm công việc: <?=count($nhomkpi__Get_All)?> </b>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table" style="width:100%" id="table_quan_ly_kpi__nhom_kpi">
                <thead>
                    <tr class="title_table">
                        <td>#</td>
                        <td>Tên nhóm công việc</td>
                        <td>Ghi chú</td>
                        
                        <td></td>
                        <td></td>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 0?>
                    <?php foreach($nhomkpi__Get_All as $item): ?>
                    <tr class="td_hover" onclick="update_obj(<?=$item->id_nhom_kpi?>)">
                        <td><?=++$count?></td>
                        <td><?=$item->ten_nhom_kpi?></td>
                        <td><?=$item->ghi_chu?></td>
                        <td class="t-right"
                            onclick="return confirm_sweet('./element/mKPI/KpiAct.php?page=nhom-kpi&req=delete&id_nhom_kpi=<?=$item->id_nhom_kpi?>')">
                            <i class="far fa-trash-alt"></i>
                        </td>
                        <td >
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

        $('#table_quan_ly_kpi__nhom_kpi').DataTable({
            fixedHeader: true,
            "lengthMenu": [
                [-1, 10, 25, 50],
                ["All", 10, 25, 50]
            ],
        });

    });

    function update_obj(id_nhom_kpi) {
        var update = document.querySelector(".main-container__update");
        var view = document.querySelector(".main-container__view");
        var add = document.querySelector(".main-container__add");

        view.classList.add("w-100-300px");
        update.classList.remove("w-0");
        update.classList.add("w-300px");
        add.classList.add("hide");

        $('.main-container__update').show();


        $.post("../element/mKPI/KpiUpdate.php", {
            page_update: "nhom-kpi",
            id_nhom_kpi: id_nhom_kpi,
        }, function(data, status) {
            $(".main-container__update").html(data);
        });
    };
    </script> -->
</div>

<!-- end nhom-kpi-->

<!-- ///////////////////////////////////// -->

<!-- nhom-kpi-->