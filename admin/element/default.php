<?php
require './element/mod/userCls.php';
require './element/mod/CanboCls.php';
require './element/mod/DonviCls.php';
require './element/mod/GiangvienCls.php';
require './element/mod/KhoahocCls.php';
require './element/mod/LophocCls.php';
require './element/mod/NganhhocCls.php';
require './element/mod/TrinhdoCls.php';
require './element/mod/SinhvienCls.php';
require './element/mod/KPI.php';
require './element/mod/NhomKpiCls.php';

?>

    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên danh mục</th>
                        <th>Số lượng dữ liệu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cán Bộ</td>
                        <td>
                            <?php
                        $Canbo = new canbo();
                        $id = $_SESSION['ADMIN']->id_donvi;
                        $dem_canbo = $Canbo->CanboCount($id);
                        echo $dem_canbo;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Công Việc</td>
                        <td>
                            <?php
                        $kpi = new kpi();
                        $dem_kpi = $kpi->KPICount();
                        echo $dem_kpi;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Nhóm Công Việc</td>
                        <td>
                            <?php
                        $nhomkpi = new nhomkpi();
                        $dem_nhomkpi = $nhomkpi->NhomKpiCount();
                        echo $dem_nhomkpi;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Đơn Vị</td>
                        <td>
                            <?php
                        $Donvi = new donvi();
                        $dem_donvi = $Donvi->DonviCount();
                        echo $dem_donvi;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Khoá học</td>
                        <td>
                            <?php
                        $Khoahoc = new khoahoc();
                        $dem_khoahoc = $Khoahoc->KhoahocCount();
                        echo $dem_khoahoc;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Lớp học</td>
                        <td>
                            <?php
                        $Lophoc = new lophoc();
                        $dem_lophoc = $Lophoc->LophocCount();
                        echo $dem_lophoc;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Ngành học</td>
                        <td>
                            <?php
                        $Nganhhoc = new nganhhoc();
                        $dem_nganhhoc = $Nganhhoc->NganhhocCount();
                        echo $dem_nganhhoc;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Trình độ</td>
                        <td>
                            <?php
                        $Trinhdo = new trinhdo();
                        $dem_trinhdo = $Trinhdo->TrinhdoCount();
                        echo $dem_trinhdo;
                            ?>
                        </td>
                    </tr>
                    

                   
                </tbody>
            </table>
        </div>
    </div>
</div>


