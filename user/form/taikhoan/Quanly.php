<div class="button-list">
    <a type="button" id="btn-user" class="btn btn-danger" href="indexuser.php?req=viewdoimatkhau">Đổi mật khẩu</a>
    <a type="button" id="btn-user" class="btn btn-primary" href="#" data-toggle="modal" data-target="#logoutModal">Đăng xuất</a>
    <a type="button" id="btn-user" class="btn btn-success">Success</a>
  </div>

  <style>
.button-list{
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    align-content: center;
}

#btn-user{
  font-family: 'Font Awesome 5 Free';
    display: flex;
    width: 70%;
    height: 60px;
    justify-content: center;
    margin-top: 20px;
    align-items: center;
}
  </style>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đăng xuất?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Bạn có muốn đăng xuất khỏi tài khoản không?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="form/Taikhoan/TaikhoanAct.php?reqact=userlogout">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>