
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Website</title>
        <link type="text/css" rel="stylesheet" href="style/codewebcss.css"/>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">

    </head>
    <body>
    <section class="vh-100" >
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="../admin/Image/login.png"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form method="post" action="element/mUser/userAct.php?reqact=checklogin">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" id="form1Example13" name="username" class="form-control form-control-lg">
            <label class="form-label" for="form1Example13">Tên đăng nhập</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
          <input type="password" name="password" id="form1Example23" class="form-control form-control-lg">
            <label class="form-label" for="form1Example23">Mật khẩu</label>
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
              <label class="form-check-label" for="form1Example3"> Nhớ mật khẩu </label>
            </div>
            <a href="#!">Quên mật khẩu?</a>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-lg btn-block">Đăng nhập</button>
        </form>
      </div>
    </div>
  </div>
</section>
    </body>
</html>
