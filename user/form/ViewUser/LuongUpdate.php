<!-- luong-->
<?php //if($_POST['page_update'] == 'luong'):?>

<?php
    require "./form/mod/KPI.php";
    require "./form/mod/CanboCls.php";

    $id_nv = $_GET['id_canbo'];
    $canbo = new canbo;
    $CanboGetName = $canbo->CanboGetName($id_nv);

    $id_index = $_GET['id_index'];
    $kpi = new kpi();
    $luong__Get_By_Id_Nhan_Vien_And_Id_Index = $kpi->luong__Get_By_Id_Nhan_Vien_And_Id_Index($id_nv, $id_index);
    $kpi__Get_All = $kpi->kpi__Get_All();
    $kpi__Get_All_Not_Exist_By_Nhan_Vien_And_Index = $kpi->kpi__Get_All_Not_Exist_By_Nhan_Vien_And_Index($id_nv, $id_index);

    $ccnv__Get_By_Count_Vang_By_Id_Nv = 0;

    ?>
<style>
    .text-name{
        font-weight: bold;
    font-size: 1.2rem;
    }
</style>
<div class="main-container__add-form">
    <div class="text-title">
        Xác Nhận Bảng Kê Thanh Toán Giờ Dạy
        <div class="btn_hide">
            <i class='bx bx-window-close'></i>
        </div>

    </div>

    <form action="./form/ViewUser/KpiAct.php?page=luong&req=update" method="post" enctype="multipart/form-data" target="_blank">
        <div class="add-nl_up form-control" style="height: auto;">
            <?php $count = 0?>
            <div class="row">
                <div class="col">
                    <div class="text-name"><?=$luong__Get_By_Id_Nhan_Vien_And_Id_Index[0]->ten_canbo?></div>
                    <div class="text">Đơn vị: <?=$CanboGetName->ten_donvi?></div>
                    <div class="text">Trình độ: <?=$CanboGetName->ten_trinhdo?></div>

                    <label class="" for="tam_tinh">
                    Tạm tính: <b id="txt_tam_tinh" class="text-danger"></b>
                    <br>
                    Bằng chữ: <b id="txt_tam_tinh_bang_chu" class="text-danger"></b>
                     </label>
                    <div class="checkbox" for="tam_tinh"></div>
                    <input type="hidden" class="form-control  w-fct" readonly id='tam_tinh'/>
                </div>
                <div class="col">
                    Lưu ý: Quý thầy cô nhập thống kê của mình tại những ô Số Lượng, đề nghị quý thầy cô nhập đầy đủ!
                </div>
            </div>
            <hr>
            <input type="hidden" value="<?=$id_nv; ?>" name="id_nv">
            <input type="hidden" value="<?=$id_index; ?>" name="id_index">

            <?php foreach($luong__Get_By_Id_Nhan_Vien_And_Id_Index as $item):?>
            <?php ++$count?>
            <div class="delete-checkbox">
                <input type="hidden" value="<?=$item->id_luong; ?>" name="id_luong[]">
                <input type="hidden" value="<?=$item->id_kpi; ?>" name="id_kpi[]">
                <div class='form-add-nl_up d-flex'>
                    <?php if($count  == 1):?>
                    <div class='form-group m-1 w-fct'>
                        <label class="checkbox" for="<?=$item->id_luong?>"></label>
                        <input type="checkbox" id="<?=$item->id_luong?>" name="id_del[]" value="<?=$item->id_luong?>"
                            disabled>
                    </div>
                    <div class='form-group m-1 w-fct'>
                        <label for="">Tên Công Việc</label>
                        <input type="text" class="form-control" name="ten_kpi[]" readonly placeholder='Nhập Tên Công Việc'
                            id="ten_kpi" required value="<?=$item->ten_kpi?>" />
                    </div>
                    <div class=' form-group m-1'>
                        <label for="">Số lượng</label>
                        <input type="number" max='999999999' step='any' class="form-control hp" name="don_vi_cb[]"
                            placeholder='Nhập đơn vị' id="don_vi_cb" required value="<?=$item->don_vi_cb?>" />
                    </div>
                    <div class='form-group m-1'>
                        <label for="">Quy đổi số tiết</label>
                        <input type="number"readonly max='999999999' step='any' class="form-control hp" name="he_so_thuc[]"
                            placeholder='Nhập Quy đổi số tiết' id="he_so_thuc" required value="<?=$item->he_so_thuc?>" />
                    </div>
                    <div class='form-group m-1 w-fct'>
                        <label for="">Số tiết</label>
                        <input type='number' max='999999999' step='any' class='form-control hp' name='thanh_tien[]'
                            readonly placeholder='Số tiết' id='thanh_tien' required value='<?=$item->thanh_tien?>' />
                    </div>
                    <div class='form-group m-1 w-fct'>
                        <label for="">Số ngày vắng</label>
                        <input type="number" class="form-control hp" name="so_ngay_vang" placeholder='Số ngày'
                            id="so_ngay_vang" required step="any" min="0"
                            value='<?=$item->so_ngay_vang == -1 ? $ccnv__Get_By_Count_Vang_By_Id_Nv : $item->so_ngay_vang?>' />
                    </div>
                    <?php if(count($luong__Get_By_Id_Nhan_Vien_And_Id_Index) == $count):?>
                    <div class='form-group w-fct d-flex'>
                        <a href='#' class='add_form_up_field btn btn-sm btn-primary  m-1 '> <i class="fas fa-plus"></i></a>
                        <?php if(count($kpi__Get_All_Not_Exist_By_Nhan_Vien_And_Index)>0):?>
                        <a href='#' class='add_form_up_field_exist btn btn-sm btn-secondary  m-1 '> <i class="fas fa-plus"></i></a>
                        <?php endif?>
                    </div>
                    <?php endif?>
                    <?php else:?>

                    <?php if($count  == 2):?>
                    <div class='form-group m-1 w-fct'>
                        <label class="checkbox" for="<?=$item->id_luong?>"></label>
                        <input type="checkbox" id="<?=$item->id_luong?>" name="id_del[]" value="<?=$item->id_luong?>">
                    </div>
                    <div class='form-group m-1 w-fct'>
                        <label for="">Tên Công Việc</label>
                        <input type="text" class="form-control" name="ten_kpi[]" readonly placeholder='Nhập Tên Công Việc'
                            id="ten_kpi" required value="<?=$item->ten_kpi?>" />
                    </div>

                    <div class=' form-group m-1'>
                        <label for="">Số lượng</label>
                        <input type="number" max='999999999' step='any' class="form-control hp" name="don_vi_cb[]"
                            placeholder='Nhập đơn vị' id="don_vi_cb" required value="<?=$item->don_vi_cb?>" />
                    </div>
                    <div class='form-group m-1'>
                        <label for="">Quy đổi số tiết</label>
                        <input type="number" readonly max='999999999' step='any' class="form-control hp" name="he_so_thuc[]"
                            placeholder='Nhập Quy đổi số tiết' id="he_so_thuc" required value="<?=$item->he_so_thuc?>" />
                    </div>
                    <div class='form-group m-1 w-fct'>
                        <label for="">Số tiết</label>
                        <input type='number' max='999999999' step='any' class='form-control hp' name='thanh_tien[]'
                            readonly placeholder='Số tiết' id='thanh_tien' required value='<?=$item->thanh_tien?>' />
                    </div>
                    <?php else:?>
                    <div class='form-group m-1 w-fct'>
                        <label class="checkbox" for="<?=$item->id_luong?>"></label>
                        <input type="checkbox" id="<?=$item->id_luong?>" name="id_del[]" value="<?=$item->id_luong?>">
                    </div>
                    <div class='form-group m-1 w-fct'>
                        <input type="text" class="form-control" name="ten_kpi" readonly placeholder='Nhập Tên Công Việc'
                            id="ten_kpi" required value="<?=$item->ten_kpi?>" />
                    </div>
                    <div class='form-group m-1'>
                        <input type="number" max='999999999' step='any' class="form-control hp" name="don_vi_cb[]"
                            placeholder='Nhập đơn vị' id="don_vi_cb" required value="<?=$item->don_vi_cb?>" />
                    </div>
                    <div class='form-group m-1'>
                        <input type="number" readonly max='999999999' step='any' class="form-control hp" name="he_so_thuc[]"
                            placeholder='Nhập Quy đổi số tiết' id="he_so_thuc" required value="<?=$item->he_so_thuc?>" />
                    </div>
                    <div class='form-group m-1 w-fct'>
                        <input type='number' max='999999999' step='any' class='form-control hp' name='thanh_tien[]'
                            readonly placeholder='Số tiết' id='thanh_tien' required value='<?=$item->thanh_tien?>' />
                    </div>
                    <?php endif?>
                    <?php if(count($luong__Get_By_Id_Nhan_Vien_And_Id_Index) == $count):?>
                    <div class='form-group w-fct d-flex'>
                        <a href='#' class='add_form_up_field btn btn-sm btn-primary  m-1 '> <i class="fas fa-plus"></i></a>
                        <?php if(count($kpi__Get_All_Not_Exist_By_Nhan_Vien_And_Index)>0):?>
                        <a href='#' class='add_form_up_field_exist btn btn-sm btn-secondary  m-1 '> <i class="fas fa-plus"></i></a>
                        <?php endif?>

                    </div>
                    <?php endif?>
                    <?php endif?>
                </div>
            </div>
            <?php endforeach?>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-danger" onclick="reload_page()">Cập nhật và In phiếu</button>
        </div>
    </form>
</div>

<script>
    window.addEventListener('load', function() {

var btn_hide = document.querySelector(".btn_hide");
$('.ttbs_update').toggle(0, 'linear');

btn_hide.addEventListener("click", function() {
    $('.main-container__add').show();
    $('.main-container__update').hide();
    $('.main-container__add').removeClass("hide");

    $('.main-container__add').removeClass("w-800px");
    $('.main-container__add').addClass("w-400px");

    $('.main-container__view').removeClass("w-100-800px");
    $('.main-container__view').addClass("w-100-400px");

    $('.main-container__update').removeClass("w-685px");
    $('.main-container__update').addClass("w-0");
});

var formatter = new Intl.NumberFormat('vi-VN', {
    style: 'currency',
    currency: 'VND',
});

////////////////////
var max_fields = 10;
var max_fields_exist = 10;
var wrapper = $(".add-nl_up");
var wrapper_exist = $(".add-nl_up");
var add_button = $(".add_form_up_field");
var add_button_exist = $(".add_form_up_field_exist");

var x = 1;
$(add_button).click(function(e) {
    e.preventDefault();

    if (x < max_fields) {
        x++;
        $(wrapper).append(
            "<div class='form-add-nl d-flex ml-22px'>" +
            "<div class=' form-group m-1 w-fct'>" +
            "    <input type='text' class='form-control' name='ten_kpi_add[]' placeholder='Nhập Tên Công Việc' id='ten_kpi_add[]' required />" +
            "</div>" +
            "<div class='form-group m-1'>" +
            "    <input type='number' max='999999999'  step='any' class='form-control hp' name='don_vi_cb_add[]' placeholder='Nhập đơn vị' id='don_vi_cb'" +
            "        required />" +
            "</div>" +
            "<div class=' form-group m-1'>" +
            "    <input type='number' max='999999999'  step='any' class='form-control hp' name='he_so_thuc_add[]' placeholder='Nhập Quy đổi số tiết' id='he_so_thuc'" +
            "        required />" +
            "</div>" +
            "<div class='form-group m-1 w-fct'>" +
            "    <input type='number' max='999999999'  step='any' class='form-control hp' name='thanh_tien_add[]' placeholder='Số tiết' id='thanh_tien' required readonly/>" +
            "</div>" +
            "<div class='form-group m-1 w-fct'>" +
            "<a href='#' class='delete btn btn-sm btn-warning'> <i class='a-solid fa-minus'></i> </a>" +
            "</div>" +
            "</div>"
        ); //add input box
        txt_tam_tinh_bang_chu = document.querySelector("#txt_tam_tinh_bang_chu");
        txt_tam_tinh = document.querySelector("#txt_tam_tinh");
        tam_tinh = document.querySelector("#tam_tinh");
        so_ngay_vang = document.querySelector("#so_ngay_vang");
        thanh_tien = document.querySelectorAll("#thanh_tien");
        he_so_thuc = document.querySelectorAll(
            "#he_so_thuc");
        don_vi_cb = document.querySelectorAll("#don_vi_cb");


        $('.hp').change(function() {
            sum = 0;
            sum_first = 0;
            sum_to = 0;
            sum_first += thanh_tien[0].value = (((he_so_thuc[0].value * don_vi_cb[0].value) / 26) * (
                26 - so_ngay_vang
                .value)).toFixed();
            for (var i = 1; i < don_vi_cb.length; i++) {
                sum_to += thanh_tien[i].value = he_so_thuc[i].value * don_vi_cb[i].value;
            }
            sum = parseFloat(sum_first) + parseFloat(sum_to);
            tam_tinh.value = sum;
            txt_tam_tinh.textContent = formatter.format(sum);
            txt_tam_tinh_bang_chu.textContent = DocTienBangChu(sum);

        });
    } else {
        alert('You Reached the limits')
    }
});

$(wrapper).on("click", ".delete", function(e) {
    e.preventDefault();
    $(this).parent('div').parent('div').remove();
    x--;

});

$(wrapper).on("click", ".delete", (function() {
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
    sum_first += thanh_tien[0].value = (((he_so_thuc[0].value * don_vi_cb[0].value) / 26) * (26 -
        so_ngay_vang
        .value)).toFixed();
    for (var i = 1; i < don_vi_cb.length; i++) {
        sum_to += thanh_tien[i].value = he_so_thuc[i].value * don_vi_cb[i].value;
    }
    sum = parseFloat(sum_first) + parseFloat(sum_to);
    tam_tinh.value = sum;
    txt_tam_tinh.textContent = formatter.format(sum);
    txt_tam_tinh_bang_chu.textContent = DocTienBangChu(sum);
}));

////////////////////

var y = 1;
$(add_button_exist).click(function(e) {
    e.preventDefault();

    if (y < max_fields_exist) {
        y++;
        $(wrapper_exist).append(
            "<div class='form-add-nl d-flex ml-22px'>" +
            "<div class=' form-group m-1 w-fct'>" +
            "<select name='id_kpi_add[]' class='form-select chosen' id='id_kpi_add' required=''>" +
            "<?php foreach($kpi__Get_All_Not_Exist_By_Nhan_Vien_And_Index as $k):?>" +
            "<option value='<?php echo $k->id_kpi; ?>'><?php echo $k->ten_kpi; ?>" +
            "</option>" +
            "<?php endforeach?>" +
            "</select>" +
            "</div>" +
            "<div class='form-group m-1'>" +
            "    <input type='number' max='999999999'  step='any' class='form-control hp' name='don_vi_cb_add[]' placeholder='Nhập đơn vị' id='don_vi_cb'" +
            "        required />" +
            "</div>" +
            "<div class=' form-group m-1'>" +
            "    <input type='number' max='999999999'  step='any' class='form-control hp' name='he_so_thuc_add[]' placeholder='Nhập Quy đổi số tiết' id='he_so_thuc'" +
            "        required />" +
            "</div>" +
            "<div class='form-group m-1 w-fct'>" +
            "    <input type='number' max='999999999'  step='any' class='form-control hp' name='thanh_tien_add[]' placeholder='Số tiết' id='thanh_tien' required readonly/>" +
            "</div>" +
            "<div class='form-group m-1 w-fct'>" +
            "<a href='#' class='delete btn btn-sm btn-warning'> <i class='bx bx-minus'></i> </a>" +
            "</div>" +
            "</div>"
        ); //add input box
        txt_tam_tinh_bang_chu = document.querySelector("#txt_tam_tinh_bang_chu");
        txt_tam_tinh = document.querySelector("#txt_tam_tinh");
        tam_tinh = document.querySelector("#tam_tinh");
        so_ngay_vang = document.querySelector("#so_ngay_vang");
        thanh_tien = document.querySelectorAll("#thanh_tien");
        he_so_thuc = document.querySelectorAll(
            "#he_so_thuc");
        don_vi_cb = document.querySelectorAll("#don_vi_cb");


        $('.hp').change(function() {
            sum = 0;
            sum_first = 0;
            sum_to = 0;
            sum_first += thanh_tien[0].value = (((he_so_thuc[0].value * don_vi_cb[0].value) / 26) * (
                26 - so_ngay_vang
                .value)).toFixed();
            for (var i = 1; i < don_vi_cb.length; i++) {
                sum_to += thanh_tien[i].value = he_so_thuc[i].value * don_vi_cb[i].value;
            }
            sum = parseFloat(sum_first) + parseFloat(sum_to);
            tam_tinh.value = sum;
            txt_tam_tinh.textContent = formatter.format(sum);
            txt_tam_tinh_bang_chu.textContent = DocTienBangChu(sum);

        });
    } else {
        alert('You Reached the limits')
    }
});

$(wrapper_exist).on("click", ".delete_exits", function(e) {
    e.preventDefault();
    $(this).parent('div').parent('div').remove();
    y--;

});

$(wrapper_exist).on("click", ".delete", (function() {
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
    sum_first += thanh_tien[0].value = (((he_so_thuc[0].value * don_vi_cb[0].value) / 26) * (26 -
        so_ngay_vang
        .value)).toFixed();
    for (var i = 1; i < don_vi_cb.length; i++) {
        sum_to += thanh_tien[i].value = he_so_thuc[i].value * don_vi_cb[i].value;
    }
    sum = parseFloat(sum_first) + parseFloat(sum_to);
    tam_tinh.value = sum;
    txt_tam_tinh.textContent = formatter.format(sum);
    txt_tam_tinh_bang_chu.textContent = DocTienBangChu(sum);
}));




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
txt_tam_tinh_bang_chu.textContent = DocTienBangChu(sum);

$('.hp').change(function() {
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
    txt_tam_tinh_bang_chu.textContent = DocTienBangChu(sum);

});
});
</script>
<?php //endif?>

<!-- end luong -->