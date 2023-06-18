
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="../assets/vendor/fontawesome-free/css/all.css" >
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="../assets/vendor/fontawesome-free/css/all.css" rel="stylesheet">
  
 
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="../assets/css/indexuser.css">

</head>
<body>
<?php
  session_start();
?>
<div class="container-fluid mt-3">
  <h3 style="font-family: cursive;
            font-weight: bold;
            font-size: 50px;
            text-align: center;">View User</h3>

  <!-- Control the column width, and how they should appear on different devices -->
  
  <div id="center_div">
                <?php
                require 'form/main.php';
                ?> 
            </div>
    
  <div class="row">
    <?php
        require 'form/bottom.php'
    ?>
  </div>
  <br>

</div>

<script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/vendor/sweetalert2@11.js"></script>

  <script src="../assets/js/docso.js"></script>
	<script src="../assets/js/userjs.js"></script>
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

  
</body>
</html>