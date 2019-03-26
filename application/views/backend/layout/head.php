 <!-- ########## START: HEAD PANEL ########## -->
 <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
        
      </div><!-- br-header-left -->
      <div class="br-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
              <i class="icon ion-ios-email-outline tx-24"></i>
              <!-- start: if statement -->
              <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
              <!-- end: if statement -->
            </a>
            <div class="dropdown-menu dropdown-menu-header">
              <div class="dropdown-menu-label">
                <label>Messages</label>
                <a href="">+ Add New Message</a>
              </div><!-- d-flex -->

              <div class="media-list">
                
                <div class="dropdown-footer">
                  <a href=""><i class="fa fa-angle-down"></i> Show All Messages</a>
                </div>
              </div><!-- media-list -->
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
          <div class="dropdown">
            <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
              <i class="icon ion-ios-bell-outline tx-24"></i>
              <!-- start: if statement -->
              <?php if($notif) { ?>
                <span class="square-8 bg-danger pos-absolute t-15 r-5 rounded-circle"></span>
                <?php } else { ?>
                <span class="square-8 bg-danger pos-absolute t-15 r-5 rounded-circle" style="visibility: hidden;"></span>
               <?php } ?> 
              <!-- end: if statement -->
            </a>
            <div class="dropdown-menu dropdown-menu-header">
              <div class="dropdown-menu-label">
                <label>Notification</label>
                <a href="">Persetujuan</a>
              </div><!-- d-flex -->

              
              <div class="media-list">
                <!-- loop starts here -->
                <?php foreach ($notif as $nf) {?>
                <a href="" class="media-list-link read" data-toggle="modal" data-target="#modal_persetujuan">
                  <div class="media">
                    <div class="media-body">
                      <p class="noti-text"><b><?= $nf['nama_anggota'] ?></b> Menunggu diverifikasi oleh anda.</p>
                      <span><?= $nf['create_at'];?></span>
                    </div>
                  </div><!-- media -->
                </a>
                <?php } ?>
                <div class="dropdown-footer">
                  
                </div>
              </div><!-- media-list -->
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down"><?= $_SESSION['nama']; ?></span>
              <img src="https://via.placeholder.com/500" class="wd-32 rounded-circle" alt="">
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-250">
              <div class="tx-center">
                <a href=""><img src="https://via.placeholder.com/500" class="wd-80 rounded-circle" alt=""></a>
                <h6 class="logged-fullname"><?= $_SESSION['nama'];?></h6>
                <p><?= $_SESSION['username'];?></p>
              </div>
              <hr>
              <ul class="list-unstyled user-profile-nav">
                <li><a href="" data-toggle="modal" data-target="#modaldemo"><i class="icon ion-ios-person"></i> Edit Profile</a></li>
                <li><a href="<?= base_url('app/logout')?>"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        
      </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- BASIC MODAL -->
    <div id="modaldemo" class="modal fade">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"><?php echo $head; ?></h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body pd-25">
              <div class="form-group">
                <label for="form-control-label" class="">Nama</label>
                <input type="text" name="email" value="<?= Input_helper::postOrOr('nama', $data['nama']) ?>" class="form-control pd-y-12" placeholder="Masukkan nama">
              </div><!-- form-group -->
              <!-- <div class="form-group">
                <label for="form-control-label" class="">Email</label>
                <input type="email" name="email" value="" class="form-control pd-y-12" placeholder="Masukkan email">
              </div>form-group -->
              <!-- <div class="form-group">
                <label for="form-control-label" class="">Alamat</label>
                <textarea rows="2" id="alamat" name="alamat" value="" class="form-control" placeholder="Masukkan alamat"></textarea>
              </div>form-group -->
              <!-- <div class="form-group">
                <label for="form-control-label" class="">No HP</label>
                <input type="text" name="no_hp" value="" class="form-control pd-y-12" placeholder="Masukkan No HP">
              </div>form-group -->
              <!-- <div class="form-group mg-b-20">
                <label for="form-control-label" class="">Password</label>
                <input type="password" name="password" class="form-control pd-y-12" placeholder="Kosongkan jika tidak ingin dirubah">
                
              </div>form-group -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-semibold">Save changes</button>
              <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-semibold" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div><!-- modal-dialog -->
      </div><!-- modal -->


      <!-- BASIC MODAL -->
    <div id="modal_persetujuan" class="modal fade">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Menunggu Persetujuan</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php foreach($notif as $n) {?>
            <div class="modal-body pd-25">
              <div class="form-group">
                
                <h4 class=""><b><?= $n['nama_anggota']; ?></b> menunggu verifikasi akun dari anda</h4>
              </div><!-- form-group -->
            </div>
            <div class="modal-footer">
              <a href="<?= base_url().$this->uri->segment(1)."/terima/$n[kd_anggota]"?>" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-semibold">Setujui</a>
              <a href="<?= base_url().$this->uri->segment(1)."/tolak/$n[kd_anggota]"?>" class="btn btn-danger tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-semibold">Tolak</a>
              <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-semibold" data-dismiss="modal">Close</button>
            </div>
            <?php } ?>
          </div>
        </div><!-- modal-dialog -->
      </div><!-- modal -->