<?php 
    session_start();
?>
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/jquery/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="assets/vendor/fontawesome-free/css/all.css" >

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="assets/css/user.css">
</head>
    <body>
        <div id="lvOne">
            <?php 
            require 'user/loginuser.php';
            ?>
        </div>
        <div id="lvTwo"> 
            
        </div>
        <div id="lvThree">
        </div>
        <div></div>
        
    </body>
</html>
