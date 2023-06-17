<?php
    require './form/mod/taikhoanCls.php';
    $id_taikhoan = $_GET['id_taikhoan'];
    $taikhoan = new taikhoan();
    $list_taikhoan = $taikhoan->TaikhoanGetbyId($id_taikhoan);
  ?>
<div class="container mt-3">
  <h2>Đổi mật khẩu tại đây!!!</h2>
  <form action="" method="POST">
    <input type="hidden" class="form-control" placeholder="" name="id_taikhoan" value="<?=$list_taikhoan->id_taikhoan?>">
    <div class="mb-3">
      <label class="form-label">Tên tài khoản:</label>
      <input type="text" class="form-control" placeholder="" name="ten_taikhoan">
    </div>
    <div class="mb-3">
      <label class="form-label">Mật khẩu cũ</label>
      <input type="password" required class="form-control" placeholder="" name="password_cu">
    </div>
    <div class="mb-3">
      <label class="form-label">Mật khẩu mới</label>
      <input type="password" required class="form-control" placeholder="" name="password_moi">
    </div>
    <button type="submit" name="doimatkhau" class="btn btn-primary">Đổi mật khẩu</button>
  </form>
</div>
<script src="../assets/vendor/sweetalert2@11.js"></script>
<?php
    require 'form/mod/config.php';
	if(isset($_POST['doimatkhau'])){
    
		$id_taikhoan = $_POST['id_taikhoan'];
    $ten_taikhoan = $_POST['ten_taikhoan'];
		$matkhau_cu = $_POST['password_cu'];
		$matkhau_moi = $_POST['password_moi'];
		$sql = "SELECT * FROM taikhoan WHERE ten_taikhoan='$ten_taikhoan' AND matkhau='$matkhau_cu' LIMIT 1";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);
		if($count>0){
			$sql_update = mysqli_query($mysqli,"UPDATE taikhoan SET matkhau='$matkhau_moi' WHERE id_taikhoan='$id_taikhoan'");
			echo "<script>
      Swal.fire({
          title: 'Đổi mật khẩu thành công!',
          text: 'Hãy trở lại Trang Chủ để thao tác',
          icon: 'success',
          confirmButtonColor: '#3085d6',
          });
      </script>";
		}else{
			echo "<script>
            Swal.fire({
                title: 'Vui lòng nhập lại',
                text: 'Tài khoản hoặc mật khẩu không đúng!',
                icon: 'warning',
                confirmButtonColor: '#3085d6',
                });
            </script>";
		}
	} 
?>