
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="../assets/css/admin.css"/>
        <link type="text/css" rel="stylesheet" href="../assets/css/test.css"/>
        <script type="text/javascript" src="../assets/js/main.js"></script>
        <!-- <script src="../assets/vendor/pdfmake/pdfmake.min.js"></script> -->
        
        <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
        <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
        
    <title>Admin</title>
    </head>
    <body>
        
        <div id="main_content">
            <?php
            session_start();
            ?>
            <?php
            if (!isset($_SESSION['USER']) and!isset($_SESSION['ADMIN'])) {
                header('location: userLogin.php');
            }
            ?>
            <!-- <div id="top_div">
                <?php
                // require './element/top.php';
                ?>
            </div> -->
            <div id="left_div">
                <?php
                require './element/left.php';
                ?> 
            </div>
            <div id="center_div">
                <?php
                require './element/center.php';
                ?> 
            </div>
            <div id="">
                <?php
                // require './element/right.php';
                ?> 
            </div>
            
            
        </div>
    </body>
    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="../assets/vendor/bootstrap/css/bootstrap.min.css"></script> -->

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="../assets/vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="../assets/js/demo/chart-area-demo.js"></script>
    <script src="../assets/js/demo/chart-pie-demo.js"></script> -->
    <script src="../assets/js/docso.js"></script>

    <!-- <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/pdfmake/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>-->   
    <script src="../assets/vendor/sweetalert2@11.js"></script>
    <script>
        function confirm_sweet(href){
            Swal.fire({
                title: 'Bạn có muốn xoá không?',
                text: "Dữ liệu sẽ bị xoá vĩnh viễn!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý'
                }).then((result) => {
                if (result.isConfirmed) {
                    location.href = href;
                }
                });
        }
        
    </script>
    <?php
        if(isset($_GET['result']) && $_GET['result'] == 'usernamekhong'){
            echo "<script>
            Swal.fire({
                title: 'Are you sure?',
                text: 'You wont be able to revert this!',
                icon: 'warning',
                confirmButtonColor: '#3085d6',
                });
            </script>";
        }
    ?>
    <?php
       if(isset($_GET['status'])){
           if($_GET['status'] == "success"){
               echo "<script>
               Swal.fire(
                   'Thành công!',
                   'Thao tác thành công!',
                   'success'
                 )</script>";
           }
           if($_GET['status'] == "failed"){
               echo "<script>
               Swal.fire(
                   'Thất bại!',
                   'Thao tác không thành công!',
                   'error'
                 )</script>";
           }
       }
?>

</html>
