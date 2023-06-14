<div class="row">
            <!-- Area Chart -->
            <div class="col-12">
                <?php
                    if (isset($_GET['req'])) {
                        $request = $_GET['req'];
                        switch ($request) {
                            case 'userxemcanbo':
                                require 'form/ViewUser/CanboXem.php';
                                break;
                            case 'userxemlophoc':
                                require 'form/ViewUser/LophocXem.php';
                                break;
                            case 'userxemdot':
                                require 'form/ViewUser/Dot.php';
                                break;
                            case 'userxemluong':
                                require 'form/ViewUser/LuongXem.php';
                                break;
                            case 'userviewluong':
                                require 'form/ViewUser/LuongView.php';
                                break;
                            case 'viewdoimatkhau':
                                require 'form/Taikhoan/Doimatkhau.php';
                                break;
                            case 'quanlyuser':
                                require 'form/Taikhoan/Quanly.php';
                                break;
                            }
                    } else {
                        require 'center.php';
                    }
                    ?>
        </div>

        <!-- Content Row -->
    </div>
    <!-- /.container-fluid -->

</div>