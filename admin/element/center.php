
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <td>
            <div class="">
                <h1 class="h3 mb-2 text-gray-800" style="font-size: 50px; display: contents; font-weight: bold; font-family: math;">Welcome To Admin</h1>
            </div>
        </td>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2"><?=$_SESSION['ADMIN']->hoten?></span>
                    <img class="img-profile rounded-circle"
                        src="./Image/login.png">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        
        <!-- Content Row -->

        <div class="row">
            <!-- Area Chart -->
            <div class="col-12">
                <?php
                    if (isset($_GET['req'])) {
                        $request = $_GET['req'];
                        switch ($request) {
                            case 'userview':
                                require './element/mUser/userView.php';
                                break;
                            case 'updateuser':
                                require './element/mUser/userUpdate.php';
                                break;
                            case 'canboview':
                                require './element/mCanbo/CanboView.php';
                                break;
                            case 'canboxem':
                                require './element/mCanbo/CanboXem.php';
                                break;
                            case 'updatecanbo':
                                require './element/mCanbo/CanboUpdate.php';
                                break;
                            case 'donviview':
                                require './element/mDonvi/DonviView.php';
                                break;
                            case 'donvixem':
                                require './element/mDonvi/DonviXem.php';
                                break;
                            case 'updatedonvi':
                                require './element/mDonvi/DonviUpdate.php';
                                break;
                            case 'giangvienview':
                                require './element/mGiangvien/GiangvienView.php';
                                break;
                            case 'giangvienxem':
                                require './element/mGiangvien/GiangvienXem.php';
                                break;
                            case 'updategiangvien':
                                require './element/mGiangvien/GiangvienUpdate.php';
                                break;
                            case 'khoahocview':
                                require './element/mKhoahoc/KhoahocView.php';
                                break;
                            case 'khoahocxem':
                                require './element/mKhoahoc/KhoahocXem.php';
                                break;
                            case 'updatekhoahoc':
                                require './element/mKhoahoc/KhoahocUpdate.php';
                                break;
                            case 'lophocview':
                                require './element/mLophoc/LophocView.php';
                                break;
                            case 'lophocxem':
                                require './element/mLophoc/LophocXem.php';
                                break;
                            case 'updatelophoc':
                                require './element/mLophoc/LophocUpdate.php';
                                break;
                            case 'phanloaiview':
                                require './element/mPhanloai/PhanloaiView.php';
                                break;
                            case 'updatephanloai':
                                require './element/mPhanloai/PhanloaiUpdate.php';
                                break;
                            case 'nganhhocview':
                                require './element/mNganhhoc/NganhhocView.php';
                                break;
                            case 'nganhhocxem':
                                require './element/mNganhhoc/NganhhocXem.php';
                                break;
                            case 'updatenganhhoc':
                                require './element/mNganhhoc/NganhhocUpdate.php';
                                break;
                            case 'sinhvienview':
                                require './element/mSinhvien/SinhvienView.php';
                                break;
                            case 'sinhvienxem':
                                require './element/mSinhvien/SinhvienXem.php';
                                break;
                            case 'updatesinhvien':
                                require './element/mSinhvien/SinhvienUpdate.php';
                                break;
                            case 'trinhdoview':
                                require './element/mTrinhdo/TrinhdoView.php';
                                break;
                            case 'updatetrinhdo':
                                require './element/mTrinhdo/TrinhdoUpdate.php';
                                break;
                            case 'phanquyenview':
                                require './element/mPhanquyen/PhanquyenView.php';
                                break;
                            case 'updatephanquyen':
                                require './element/mPhanquyen/PhanquyenUpdate.php';
                                break;
                            case 'phannhomview':
                                require './element/mPhannhom/PhannhomView.php';
                                break;
                            case 'updatephannhom':
                                require './element/mPhannhom/PhannhomUpdate.php';
                                break;
                            case 'giangdayview':
                                require './element/mGiangday/GiangdayView.php';
                                break;
                            case 'giangdayxem':
                                require './element/mGiangday/GiangdayXem.php';
                                break;
                            case 'updategiangday':
                                require './element/mGiangday/GiangdayUpdate.php';
                                break;
                            case 'nhomcvview':
                                require './element/mNhomCV/NhomCvView.php';
                                break;
                            case 'updatenhomcv':
                                require './element/mNhomCV/NhomCvUpdate.php';
                                break;
                            case 'congviecview':
                                require './element/mCongviec/CongviecView.php';
                                break;
                            case 'updatecongviec':
                                require './element/mCongviec/CongviecUpdate.php';
                                break;
                            case 'kpiview':
                                require './element/mKPI/KpiView.php';
                                break;
                            case 'kpixem':
                                require './element/mKPI/KpiXem.php';
                                break;
                            case 'updatekpi':
                                require './element/mKPI/KpiUpdate.php';
                                break;
                            case 'viewnhomkpi':
                                require './element/mKPI/NhomKpiView.php';
                                break;
                            case 'update-nhom-kpi':
                                require './element/mKPI/NhomKpiUpdate.php';
                                break;
                            case 'viewluong':
                                require './element/mKPI/LuongView.php';
                                break;
                            case 'update-luong':
                                require './element/mKPI/LuongUpdate.php';
                                break;
                            case 'viewtaikhoan':
                                require './element/mTaikhoan/TaikhoanView.php';
                                break;
                            case 'updatetaikhoan':
                                require './element/mTaikhoan/TaikhoanUpdate.php';
                                break;
                            case 'updatedot':
                                require './element/mDot/DotUpdate.php';
                                break;
                            case 'viewdot':
                                require './element/mDot/DotView.php';
                                break;
                            case 'canbokhoa':
                                require './CanboKhoa/mKPI/LuongView.php';
                                break;
                            }
                    } else {
                        require 'default.php';
                    }
                    ?>
        </div>

        <!-- Content Row -->
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Logout -->
</div>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đăng xuất?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Bạn có muốn đăng xuất khỏi tài khoản không?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="./userLogin.php">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>