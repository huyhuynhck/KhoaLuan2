<?php
                if(!isset($_SESSION['USER'])){
                    header('location: ../user/indexuser.php');
                }
                ?>

<!-- Bottom Nav Bar -->
<div class="footer">
         <div id="buttonGroup" class="btn-group selectors" role="group" aria-label="Basic example">
            <button id="home" type="button" class="btn btn-secondary button-inactive">
               <div class="selector-holder" >
                  <a class="fas fa-house-user" style="color: black; text-decoration: none" href="./indexuser.php" ><br><span >Home</span></a>
                  
               </div>
            </button>
            
            <button id="feed" type="button" class="btn btn-secondary button-inactive" >
               <div class="selector-holder">
               <a class="fas fa-key" style="color: black; text-decoration: none" href="./indexuser.php?req=viewdoimatkhau&id_taikhoan=<?=$_SESSION['USER']->id_taikhoan?>" ><br><span >Đổi Pass</span></a>
               </div>
            </button>
            <button id="account" type="button" class="btn btn-secondary button-inactive">
               <div class="selector-holder">
               <a class="fas fa-address-card" style="color: black; text-decoration: none"  href="./indexuser.php?req=accountview&id_canbo=<?= $_SESSION['USER']->id_canbo?>" ><br><span >Account</span></a>
               </div>
            </button>   
            <button id="create" type="button" class="btn btn-secondary button-inactive">
               <div class="selector-holder">
               <a class="fas fa-sign-out-alt" style="color: black; text-decoration: none" href="#" data-toggle="modal" data-target="#logoutModal"><br><span >Đăng Xuất</span></a>
               </div>
            </button>
         </div>
      </div>


        <!-- đăng xuất user-->
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
                    <a class="btn btn-primary" href="../index.php">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>
