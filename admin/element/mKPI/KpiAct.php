<?php
session_start();
require "../../element/mod/KPI.php";
require "../../element/mod/CanboCls.php";
require "../../element/mod/PhanloaiCls.php";
require "../../element/mod/TrinhdoCls.php";
// require("../../assets/vendor/tfpdf/tfpdf.php");

if(isset($_GET["page"])){
    $page = $_GET["page"];

    if($page == "kpi"){
        if (isset($_GET["req"])) {
            $req = $_GET["req"];
                switch ($req) {
                    case "add":
                        $id_nhom_kpi = $_POST['id_nhom_kpi'];
                        $ten_kpi = $_POST['ten_kpi'];
                        $don_vi_cb = $_POST['don_vi_cb'];
                        $he_so_tc = $_POST['he_so_tc'];
                        $ghi_chu_kpi = $_POST['ghi_chu_kpi'];
                        $kpi = new kpi();
                        $status = $kpi->kpi__Add($id_nhom_kpi,$ten_kpi,$don_vi_cb,$he_so_tc,$ghi_chu_kpi);
                        if($status == 0){
                            header("location:../../index.php?req=kpiview&status=fail");
                        }else{
                            header("location:../../index.php?req=kpiview&status=success");
                        }
        
                        break;
                        
                    case "update":
                        $id_kpi = $_POST['id_kpi'];
                        $id_nhom_kpi = $_POST['id_nhom_kpi'];
                        $ten_kpi = $_POST['ten_kpi'];
                        $don_vi_cb = $_POST['don_vi_cb'];
                        $he_so_tc = $_POST['he_so_tc'];
                        $ghi_chu_kpi = $_POST['ghi_chu_kpi'];
                        
                        $kpi = new kpi();
                        $status = $kpi->kpi__Update($id_kpi, $id_nhom_kpi,$ten_kpi,$don_vi_cb,$he_so_tc,$ghi_chu_kpi);
                        if($status == 0){
                            header("location:../../index.php?req=kpiview&status=fail");
                        }else{
                            header("location:../../index.php?req=kpiview&status=success");
                        }
        
                        break;
                        
                    
                    case "delete":
                        $id_kpi = $_GET['id_kpi'];
        
                        $status = $kpi->kpi__Delete($id_kpi);
                        if($status == 0){
                            header("location:../../index.php?req=kpiview&result=notok");
                        }else{
                             header("location:../../index.php?req=kpiview&result=ok");
                        }
                        break;
            }
        }
    }
    }

    ///////////////////////////

    if($page == "nhom-kpi"){
        if (isset($_GET["req"])) {
            $req = $_GET["req"];
                switch ($req) {
                    case "add":
                        $ten_nhom_kpi = $_POST['ten_nhom_kpi'];
                        $ghi_chu = $_POST['ghi_chu'];
                        $kpi = new kpi();
                        $status = $kpi->nhomkpi__Add($ten_nhom_kpi,$ghi_chu);
                        if($status == 0){
                            header("location:../../index.php?req=viewnhomkpi&result=notok");
                        }else{
                            header("location:../../index.php?req=viewnhomkpi&result=ok");
                        }
        
                        break;
                        
                    case "update":
                        $id_nhom_kpi = $_POST['id_nhom_kpi'];
                        $ten_nhom_kpi = $_POST['ten_nhom_kpi'];
                        $ghi_chu = $_POST['ghi_chu'];
                        $kpi = new kpi();
                        $status = $kpi->nhomkpi__Update($id_nhom_kpi, $ten_nhom_kpi,$ghi_chu);
                        if($status == 0){
                            header("location:../../index.php?req=viewnhomkpi&result=notok");
                        }else{
                            header("location:../../index.php?req=viewnhomkpi&result=ok");
                        }
                        break;
                    
                    case "delete":
                        $id_nhom_kpi = $_GET['id_nhom_kpi'];
                        $kpi = new kpi();
                        $status = $kpi->nhomkpi__Delete($id_nhom_kpi);
                        if($status == 0){
                            header("location:../../index.php?req=viewnhomkpi&result=notok");
                        }else{
                             header("location:../../index.php?req=viewnhomkpi&result=ok");
                        }
                        break;
            }
        }
    }

   
        ///////////////////////////

        if($page == "luong"){
            if (isset($_GET["req"])) {
                $req = $_GET["req"];
                    switch ($req) {
                        case "copy_luong":
                            $status = 0;
                            $id_index = $_POST['id_index'];
                            $id_index_copy = $_POST['id_index_copy'];

                            $kpi = new kpi();
                            $luong__Get_By_Index = $kpi->luong__Get_By_Index($id_index_copy);

                            foreach($luong__Get_By_Index as $item_1){

                                    $status += $kpi->luong__Add($id_index, $item_1->id_canbo, $item_1->ten_canbo, $item_1->gioi_tinh, $item_1->ngay_sinh, $item_1->dia_chi, $item_1->so_dien_thoai, $item_1->ngay_vao_lam, $item_1->phan_loai, $item_1->trinh_do, $item_1->id_kpi, $item_1->ten_kpi, 
                                    $item_1->don_vi_cb, $item_1->he_so_thuc, $item_1->thanh_tien, $item_1->ghi_chu_luong, $item_1->so_ngay_vang);
                            }
                                 
                            if($status == 0){
                                header("location:../../index.php?req=viewluong&req=luong&id_index=$id_index&status=fail");
                            }else{
                                header("location:../../index.php?req=viewluong&req=luong&id_index=$id_index&status=success");
                            }
            
                            break;


                        case "add_by_nv":
                            $status = 0;
                            $id_index = $_POST['id_index'];
                            $id_nv = $_POST['id_nv'];
                            $item_1 = $nhanvien->nhanvien__Get_By_Id($id_nv);
                            $list_kpi = $kpi->kpi__Get_All();

                            foreach($list_kpi as $item_2){
                                $status += $kpi->luong__Add($id_index, $item_1->id_nv, $item_1->ho_ten, $item_1->gioi_tinh, $item_1->ngay_sinh, $item_1->dia_chi, $item_1->so_dien_thoai, $item_1->ngay_vao_lam, $phanloai->phanloai__Get_By_Id($item_1->id_phan_loai)->ten_phan_loai, $trinhdo->trinhdo__Get_By_Id($item_1->id_trinh_do)->ten_trinh_do, $item_2->id_kpi, $item_2->ten_kpi, $item_2->don_vi_cb, $item_2->he_so_tc, 0, "", -1);
                            }
                                 
                            if($status == 0){
                                header("location:../../index.php?req=viewluong&req=luong&id_index=$id_index&status=fail");
                            }else{
                                header("location:../../index.php?req=viewluong&req=luong&id_index=$id_index&status=success");
                            }
            
                            break;

                        case "add":
                            $status = 0;
                            $id_index = $_POST['id_index'];
                            
                            $nhanvien = new canbo();
                            $list_nv = $nhanvien->CanboGetAll_By_Don_Vi($_SESSION['ADMIN']->id_donvi);

                            $kpi = new kpi();
                            $list_kpi = $kpi->kpi__Get_All();
                            
                            $phanloai = new phanloai();
                            $trinhdo = new trinhdo();
                            foreach($list_nv as $item_1){
                                foreach($list_kpi as $item_2){
                                    echo $item_1->id_canbo;
                                    $status += $kpi->luong__Add($id_index
                                    , $item_1->id_canbo
                                    , $item_1->ten_canbo
                                    , $item_1->gioitinh
                                    , $item_1->ngaysinh
                                    , $item_1->diachithuongtru
                                    , $item_1->sodienthoai1
                                    , $item_1->ngay_vao_lam
                                    , $phanloai->phanloai__GetName_By_Id($item_1->id_phan_loai)->ten_phan_loai
                                    , $trinhdo->TrinhdoGetbyId($item_1->id_trinhdo)->ten_trinhdo
                                    , $item_2->id_kpi
                                    , $item_2->ten_kpi
                                    , $item_2->don_vi_cb
                                    , $item_2->he_so_tc
                                    , 0
                                    , ""
                                    , -1);
                                }
                            }       
                                 
                            if($status == 0){
                                header("location:../../index.php?req=viewluong&status=fail");
                            }else{
                                header("location:../../index.php?req=viewluong&status=success");
                            }
            
                            break;

                        case "delete":
                            $id_index = $_GET['id_index'];
                            $kpi = new kpi();
                            $status = $kpi->luong__Delete_By_Index($id_index);
                              
                            if($status == 0){
                                header("location:../../index.php?req=viewluong&id_index=$id_index&status=fail");
                            }else{
                                header("location:../../index.php?req=viewluong&id_index=$id_index&status=success");
                            }
            
                            break;
                        case "delete_by_nv":
                            $id_index = $_GET['id_index'];
                            $id_nv = $_GET['id_canbo'];

                            $kpi = new kpi();
                            $status = $kpi->luong__Delete_By_Index_And_Nhan_Vien($id_index, $id_nv);
                              
                            if($status == 0){
                                header("location:../../index.php?req=viewluong&id_index=$id_index&status=fail");
                            }else{
                                header("location:../../index.php?req=viewluong&id_index=$id_index&status=success");
                            }
                
                            break;
                        case "update":
                            $status = 0;
                            $id_index = $_POST['id_index'];
                             $id_nv = $_POST['id_nv'];
                            $id_luong = $_POST['id_luong'];
                            $id_kpi = $_POST['id_kpi'];
                            $ten_kpi = $_POST['ten_kpi'];
                            $don_vi_cb = $_POST['don_vi_cb'];
                            $he_so_thuc = $_POST['he_so_thuc'];
                            $thanh_tien = $_POST['thanh_tien'];
                            $so_ngay_vang = $_POST['so_ngay_vang'];
                            
                            $nhanvien = new canbo();
                            $item_1 = $nhanvien->CanboGetById($id_nv);
                            
                            
                            for($j = 0; $j< count($id_luong); $j++){
                                $kpi = new kpi();
                                $status += $kpi->luong__Update($id_luong[$j], $don_vi_cb[$j], $he_so_thuc[$j], $thanh_tien[$j],$so_ngay_vang);
                            }
                            if(isset($_POST['id_del'])){
                                
                                $id_del = $_POST['id_del'];
                                for($d = 0; $d< count($id_del); $d++){
                                    $status += $kpi->luong__Delete($id_del[$d]);

                                }

                            }
                           
                            if(isset($_POST['ten_kpi_add'])){
                                $ten_kpi_add = $_POST['ten_kpi_add'];
                                $don_vi_cb_add = $_POST['don_vi_cb_add'];
                                $he_so_thuc_add = $_POST['he_so_thuc_add'];
                                $thanh_tien_add = $_POST['thanh_tien_add'];

                                for($i = 0; $i< count($ten_kpi_add); $i++){

                                    $status += $kpi->luong__Add($id_index, 
                                    $item_1->id_nv, 
                                    $item_1->ho_ten, 
                                    $item_1->gioi_tinh, 
                                    $item_1->ngay_sinh, 
                                    $item_1->dia_chi, 
                                    $item_1->so_dien_thoai, 
                                    $item_1->ngay_vao_lam, 
                                    $phanloai->phanloai__Get_By_Id($item_1->id_phan_loai)->ten_phan_loai, 
                                    $trinhdo->trinhdo__Get_By_Id($item_1->id_trinh_do)->ten_trinh_do, 
                                    -(date('s').$item_1->id_nv), 
                                    $ten_kpi_add[$i], 
                                    $don_vi_cb_add[$i], 
                                    $he_so_thuc_add[$i], 
                                    $thanh_tien_add[$i],
                                    "", 
                                    $so_ngay_vang);
                                }
                            }

                            if(isset($_POST['id_kpi_add'])){
                                $id_kpi_add = $_POST['id_kpi_add'];
                                $don_vi_cb_add = $_POST['don_vi_cb_add'];
                                $he_so_thuc_add = $_POST['he_so_thuc_add'];
                                $thanh_tien_add = $_POST['thanh_tien_add'];

                                for($k = 0; $k< count($id_kpi_add); $k++){

                                    $status += $kpi->luong__Add($id_index, 
                                    $item_1->id_nv, 
                                    $item_1->ho_ten, 
                                    $item_1->gioi_tinh, 
                                    $item_1->ngay_sinh, 
                                    $item_1->dia_chi, 
                                    $item_1->so_dien_thoai, 
                                    $item_1->ngay_vao_lam, 
                                    $phanloai->phanloai__Get_By_Id($item_1->id_phan_loai)->ten_phan_loai, 
                                    $trinhdo->trinhdo__Get_By_Id($item_1->id_trinh_do)->ten_trinh_do, 
                                    $id_kpi_add[$k], 
                                    $kpi->kpi__Get_By_Id($id_kpi_add[$k])->ten_kpi, 
                                    $don_vi_cb_add[$k], 
                                    $he_so_thuc_add[$k], 
                                    $thanh_tien_add[$k],
                                    "", 
                                    $so_ngay_vang);
                                }
                            }


                            

                            if($status == 0){
                                header("location:../../index.php?req=update-luong&id_canbo=$id_nv&id_index=$id_index&status=fail");
                            }else{
                                header("location:../../index.php?req=update-luong&id_canbo=$id_nv&id_index=$id_index&status=success");
                            }

            
                            break;

                        }
        }
    }