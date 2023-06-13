<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="../assets/vendor/fontawesome-free/css/all.css" >

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="../assets/css/user.css">
</head>
<body>
<div class="form-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="form-container">
                    <div class="form-icon"><i style="margin: 20px;" class="fa fa-user"></i></div>
                    <h3 class="title">Login</h3>
                    <form class="form-horizontal" method="post" action="form/taikhoan/taikhoanAct.php?reqact=checklogin">
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" type="text" placeholder="Tên tài khoản" name="ten_taikhoan">
                        </div>
                        <div class="form-group">
                            <label>Passsword</label>
                            <input class="form-control" type="password" placeholder="Mật khẩu" name="matkhau">
                        </div>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>