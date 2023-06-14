<!-- luong-->
<?php //if($_POST['page_update'] == 'luong'):?>

<style>
.main-container__add-form {
    font-family: 'Font Awesome 5 Free';
}
.divTable{
	display: table;
	width: 100%;
}
.divTableRow {
	display: table-row;
    height: 50px;
}
.divTableRow:hover {background-color: coral;}
.divTableHeading {
	background-color: #EEE;
	display: table-header-group;
}
.divTableCell, .divTableHead {
	display: table-cell;
	padding: 3px 10px;
    width: 1000px;
    border-bottom: 1px solid #ddd;
    
}
.divTableHeading {
	background-color: #EEE;
	display: table-header-group;
	font-weight: bold;
}
.divTableFoot {
	background-color: #EEE;
	display: table-footer-group;
	font-weight: bold;
}
.divTableBody {
	display: table-row-group;
}
.divTableBody .divTableRow .divTableCell:first-child {
    width: 25%;
}
.divTableBody .divTableRow:last-child .divTableCell {
    height: 200px;
}
h3{
    font-size: 20px;
    display: flex;
    flex-direction: inherit;
    justify-content: center;
    margin-top: 8px;
    font-weight: bold;
}

</style>


<?php
    require "./form/mod/KPI.php";

    $id_nv = $_GET['id_canbo'];
    $id_index = $_GET['id_index'];
    $kpi = new kpi();
    $luong__Get_By_Id_Nhan_Vien_And_Id_Index = $kpi->luong__Get_By_Id_Nhan_Vien_And_Id_Index($id_nv, $id_index);
    $kpi__Get_All = $kpi->kpi__Get_All();
    $kpi__Get_All_Not_Exist_By_Nhan_Vien_And_Index = $kpi->kpi__Get_All_Not_Exist_By_Nhan_Vien_And_Index($id_nv, $id_index);

    $ccnv__Get_By_Count_Vang_By_Id_Nv = 0;

    ?>

<div class="main-container__add-form">
    <div class="text-title">
        Bảng Lương Nhân Viên
        <div class="btn_hide">
            <i class='bx bx-window-close'></i>
        </div>

    </div>
        <div class="add-nl_up form-control" style="height: auto;">
            <?php $count = 0?>
            <b class="text-name"><?=$luong__Get_By_Id_Nhan_Vien_And_Id_Index[0]->ten_canbo?></b>
            <br>
            <div class='form-group m-2 d-flex'>
                <label class="" for="tam_tinh">
                    Tạm tính: <b id="txt_tam_tinh" class="text-danger"></b>
                    <br>
                    Bằng chữ: <b id="txt_tam_tinh_bang_chu" class="text-danger"></b>
                </label>
                <label class="checkbox" for="tam_tinh"></label>
                <input type="hidden" class="form-control  w-fct" readonly id='tam_tinh'>
            </div>
            <hr>
            
                    <div class="divTableBody">
                        <div class='divTableRow' style="background-color: salmon">
                                    <div class="divTableCell">
                                    <h3>Tên KPI</h3>
                                    </div>
                                    <div class="divTableCell">
                                    <h3>Đơn vị cơ bản</h3>
                                    </div>
                                    <div class="divTableCell">
                                    <h3>Hệ số</h3>
                                    </div>
                                    <div class="divTableCell">
                                    <h3>Thành tiền</h3>
                                    </div>
                                    <div class="divTableCell">
                                    <h3>Số ngày vắng</h3>
                                    </div>
                        </div>
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <?php foreach($luong__Get_By_Id_Nhan_Vien_And_Id_Index as $item):?>
                        <?php ++$count?>
                            
                            <div class='divTableRow' style="background-color: mistyrose">
                                <?php if($count  == 1):?>
                                <div class="divTableCell">
                                    
                                    <input readonly class="form-control-plaintext" style="text-align: center;" id="ten_kpi" required value="<?=$item->ten_kpi?>" />
                                </div>
                                <div class="divTableCell">
                                    
                                    <input readonly class="form-control-plaintext" style="text-align: center;" id="don_vi_cb" required value="<?=$item->don_vi_cb?>" />
                                </div>
                                <div class="divTableCell">
                                    
                                    <input readonly class="form-control-plaintext" style="text-align: center;" id="he_so_thuc" required value="<?=$item->he_so_thuc?>" />
                                </div>
                                <div class="divTableCell">
                                    
                                    <input readonly class="form-control-plaintext" style="text-align: center;" id='thanh_tien' required value='<?=$item->thanh_tien?>' />
                                </div>
                                <div class="divTableCell">
                                    
                                    <input readonly class="form-control-plaintext" style="text-align: center;" id="so_ngay_vang" value='<?=$item->so_ngay_vang == -1 ? $ccnv__Get_By_Count_Vang_By_Id_Nv : $item->so_ngay_vang?>' />
                                </div>
                                <?php if(count($luong__Get_By_Id_Nhan_Vien_And_Id_Index) == $count):?>
                                <div class="divTableCell">
                                    <a href='#' class='add_form_up_field btn btn-sm btn-primary  m-1 '> <i
                                            class='bx bx-plus'></i></a>
                                    <?php if(count($kpi__Get_All_Not_Exist_By_Nhan_Vien_And_Index)>0):?>
                                    <a href='#' class='add_form_up_field_exist btn btn-sm btn-secondary  m-1 '> <i
                                            class='bx bx-plus'></i></a>
                                    <?php endif?>
                                </div>
                                <?php endif?>
                                <?php else:?>

                                <?php if($count  == 2):?>
                                    <div class="divTableCell">
                                    <input readonly class="form-control-plaintext" style="text-align: center;" id="ten_kpi" required value="<?=$item->ten_kpi?>" />
                                </div>
                                <div class="divTableCell">
                                    <input readonly class="form-control-plaintext" style="text-align: center;" id="don_vi_cb" required value="<?=$item->don_vi_cb?>" />
                                </div>
                                <div class="divTableCell">
                                    <input readonly class="form-control-plaintext" style="text-align: center;" id="he_so_thuc" required value="<?=$item->he_so_thuc?>" />
                                </div>
                                <div class="divTableCell">
                                    <input readonly class="form-control-plaintext" style="text-align: center;" id='thanh_tien' required value='<?=$item->thanh_tien?>' />
                                </div>
                                <?php else:?>
                                <div class="divTableCell">
                                    <input readonly class="form-control-plaintext" style="text-align: center;" id="ten_kpi" required value="<?=$item->ten_kpi?>" />
                                </div>
                                <div class="divTableCell">
                                    <input readoreadonly class="form-control-plaintext" style="text-align: center;" id="don_vi_cb" required value="<?=$item->don_vi_cb?>" />
                                </div>
                                <div class="divTableCell">
                                    <input readonly class="form-control-plaintext" style="text-align: center;" id="he_so_thuc" required value="<?=$item->he_so_thuc?>" />
                                </div>
                                <div class="divTableCell">
                                    <input readonly class="form-control-plaintext" style="text-align: center;" id='thanh_tien' required value='<?=$item->thanh_tien?>' />
                                </div>
                                <?php endif?>
                                <?php endif?>
                            </div>
                            <?php endforeach?>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
</div>
<script>
    window.addEventListener('load', function() {
        var formatter = new Intl.NumberFormat('vi-VN', {
    style: 'currency',
    currency: 'VND',
});
    txt_tam_tinh_bang_chu = document.querySelector("#txt_tam_tinh_bang_chu");
txt_tam_tinh = document.querySelector("#txt_tam_tinh");
tam_tinh = document.querySelector("#tam_tinh");
so_ngay_vang = document.querySelector("#so_ngay_vang");
thanh_tien = document.querySelectorAll("#thanh_tien");
he_so_thuc = document.querySelectorAll(
    "#he_so_thuc");
don_vi_cb = document.querySelectorAll("#don_vi_cb");

sum = 0;
sum_first = 0;
sum_to = 0;
sum_first += thanh_tien[0].value = (((he_so_thuc[0].value * don_vi_cb[0].value) / 26) * (26 - so_ngay_vang
    .value)).toFixed();
for (var i = 1; i < don_vi_cb.length; i++) {
    sum_to += thanh_tien[i].value = he_so_thuc[i].value * don_vi_cb[i].value;
}
sum = parseFloat(sum_first) + parseFloat(sum_to);

tam_tinh.value = sum;
txt_tam_tinh.textContent = formatter.format(sum);
txt_tam_tinh_bang_chu.textContent = DocTienBangChu(sum);});
</script>