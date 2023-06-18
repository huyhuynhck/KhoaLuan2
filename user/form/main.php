<div class="row">
            <!-- Area Chart -->
            <div class="col-12">
                <?php
                    if (isset($_GET['req'])) {
                        $request = $_GET['req'];
                        switch ($request) {
                            
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
                            case 'accountview':
                                require 'form/ViewUser/AccountView.php';
                                break;
                            case 'viewluong':
                                require 'form/ViewUser/LuongView.php';
                                break;
                            case 'update-luong':
                                require 'form/ViewUser/LuongUpdate.php';
                                break;
                            case 'success-luong':
                                require 'form/ViewUser/LuongView.php';
                                break;
                            }
                    } else {
                        require 'form/ViewUser/LuongView.php';
                    }
                    ?>
        </div>

        <!-- Content Row -->
    </div>
    <!-- /.container-fluid -->

</div>