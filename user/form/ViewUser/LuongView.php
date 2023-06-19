<?php require './form/mod/KPI.php'?>
<?php require './form/mod/indexcount.php'?>
<?php require './form/mod/format.php'?>
<?php require './form/mod/CanboCls.php'?>

<!-- luong-->

<?php
    $id_canbo = $_SESSION['USER']->id_canbo;
    $canbo = new canbo();
    $CanboGetbyId = $canbo->CanboGetbyId($id_canbo);
    
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
    

    
    
        
    
    
?>

<style>
    @media only screen and (max-width: 390px) {
    
.title_table {
    font-weight: bold;
    text-transform: uppercase;
}
td{
    font-size: 13px;
    text-align: center;
}
    }
</style>
<!-- main-container -->

<div class="main-container">
        <div class="table-responsive">
        <table class="table">
                <thead>
                    <tr class="title_table table-primary ">
                        <td>#</td>
                        <td>Tên Cán bộ</td>
                        <td>Đợt</td>
                        <!-- <td>Số Công việc</td>
                        <td>Số ngày vắng</td> -->
                        <td>Số tiết</td>
                        
                        <td></td>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 0?>
                    <?php foreach($indexcount__Get_All as $dot):?>
                        <?php
                            $id_index = $dot->id_index; 
                            $luong__Get_Nhan_Vien_By_Id_Index_Not_In = $kpi->luong__Get_Nhan_Vien_By_Id_Index_Not_In_Current($id_index, $id_canbo);
                            $luong__Get_By_Index_Group_By_Nhan_Vien = $kpi->luong__Get_By_Index_Group_By_Nhan_Vien_Current($id_index, $id_canbo);
                            $da_xac_nhan = 0;
                            $sum_xac_nhan = 0;
                            foreach($luong__Get_By_Index_Group_By_Nhan_Vien as $item){
                                $da_xac_nhan += $item->thanh_tien > 0 ? 1 : 0;
                                foreach($kpi->luong__Get_By_Id_Nhan_Vien_And_Id_Index($item->id_canbo, $id_index) as $item_2){
                                    $sum_xac_nhan += $item_2->thanh_tien;
                                }
                            }
                            ?>
                    
                    <?php foreach($luong__Get_By_Index_Group_By_Nhan_Vien as $item): ?>
                    <tr class="td_hover" onclick="update_obj(<?=$item->id_canbo?>)">
                        <td><?=++$count?></td>
                        <td><?=$item->ten_canbo?></td>
                        <td><?=$indexcount->indexcount__Get_By_Id($item->id_index)->ten_index?></td>
                        <?php
                            $sum_kpi = 0;
                            $sum_luong = 0;
                            foreach($kpi->luong__Get_By_Id_Nhan_Vien_And_Id_Index($item->id_canbo, $id_index) as $item_2){
                                $sum_kpi++;
                                $sum_luong += $item_2->thanh_tien;
                            }
                        ?>
                        <!-- <td><?=$item->so_ngay_vang == -1 ? "Chưa xác nhận" : $sum_kpi?></td> -->
                        <!-- <td><?=$item->so_ngay_vang == -1 ? "Chưa xác nhận" : $item->so_ngay_vang?></td> -->
                        <td><?=$item->so_ngay_vang == -1 ? "Chưa xác nhận" : $fm->format_money($sum_luong)?></td>

                        
                        <td class="t-right">
                            <a class="fas fa-sync-alt" href='./indexuser.php?req=update-luong&id_canbo=<?=$item->id_canbo?>&id_index=<?=$item->id_index?>'></a>
                            
                        </td>
                    </tr>
                    <?php endforeach?>
                    <?php endforeach?>

                </tbody>
            </table>
            </div> 
            </div> 

    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script>
    
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


<!-- end luong-->
<!-- end main-container -->