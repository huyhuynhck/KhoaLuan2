
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" style="height: 6.375rem;" href="./index.php">
                <div class="">
                    <img src="./Image/avt-taydo.png" style="width: 90px;">
                    <div class="sidebar-brand-text mx-3"><?=$_SESSION['ADMIN']->username?><sup>hihi</sup></div>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="./index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Trang chủ</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">

            <?php if(($_SESSION['ADMIN']->id_phanquyen == 0)):?>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Quản Lý</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Thêm:</h6>
                            <a class="collapse-item" href="index.php?req=userview">Admin</a>
                        <a class="collapse-item" href="index.php?req=canboview">Cán bộ</a>
                        <a class="collapse-item" href="index.php?req=donviview">Đơn vị</a>
                        <a class="collapse-item" href="index.php?req=trinhdoview">Trình độ</a>
                        <a class="collapse-item" href="index.php?req=lophocview">Lớp học</a>
                        <a class="collapse-item" href="index.php?req=phanloaiview">Phân loại</a>
                        <a class="collapse-item" href="index.php?req=nganhhocview">Ngành học</a>
                        <a class="collapse-item" href="index.php?req=giangdayview">Giảng dạy</a>
                        <a class="collapse-item" href="index.php?req=khoahocview">Khoá học</a>

                        <a class="collapse-item" href="index.php?req=kpiview">Công Việc</a>
                        <a class="collapse-item" href="index.php?req=viewnhomkpi">Nhóm Công Việc</a>
                        <a class="collapse-item" href="index.php?req=viewluong">Giờ Dạy</a>
                        <a class="collapse-item" href="index.php?req=viewdot">Đợt</a>

                        
                        
                    </div>
                </div>
                <?php else:?>
                    <a class="nav-link" href="index.php?req=viewluong">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Giờ Dạy</span>
                </a>
                    <?php endif?>
            </li>
            <?php if(($_SESSION['ADMIN']->id_phanquyen == 0)):?>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tài khoản</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Tài khoản:</h6>
                        <a class="collapse-item" href="index.php?req=viewtaikhoan">Tài khoản người dùng</a>
                    </div>
                </div>
            </li>
            <?php endif?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
 

        </ul>