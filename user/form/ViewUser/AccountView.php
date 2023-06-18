
    <?php
    require './form/mod/CanboCls.php';
    $id_canbo = $_GET['id_canbo'];
    $canbo = new canbo();
    $ds_canbo = $canbo->CanboGetbyId($id_canbo);  
    ?>

  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">

    
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="./form/Image/user.jpg" alt="Avatar" class="img-fluid my-5" style="width: 80px; float: none;" />
              <h5><?php echo $canbo->CanboGetbyId($id_canbo)->ten_canbo?></h5>
              <i class="fas fa-user-tie"></i>
              <h5><?php echo $canbo->CanboGetbyId($id_canbo)->ngaysinh?></h5>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Liên lạc</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Giới tính <?php
                                        if ($canbo->CanboGetbyId($id_canbo)->gioitinh == 0) {
                                            ?>
                                            <img class="icoming" style="width: 30px" src="./form/Image/nu.jpg"/>
                                            <?php
                                        } else {
                                            ?>   
                                            <img class="icoming" style="width: 30px" src="./form/Image/nam.jpg"/>
                                            <?php
                                        }
                                        ?></h6>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Phone</h6>
                    <p class="text-muted"><?php echo $canbo->CanboGetbyId($id_canbo)->sodienthoai1?></p>
                  </div>
                </div>
                <div class="row">
                    <h6>Email</h6>
                    <p class="text-muted"><?php echo $canbo->CanboGetbyId($id_canbo)->email?></p>    
                </div>
                <h6>Thông tin</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Địa chỉ</h6>
                    <p class="text-muted"><?php echo $canbo->CanboGetbyId($id_canbo)->diachithuongtru?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Ngày vào làm</h6>
                    <p class="text-muted"><?php echo $canbo->CanboGetbyId($id_canbo)->ngay_vao_lam?></p>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<style>
    .gradient-custom {

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
}
</style>