      
      <div class="br-pagetitle">
      <i class="icon ion-ios-home-outline tx-70 lh-0"></i>
        <div class="" style="width: 90%;">
          <h4><?= $header ?></h4>
        </div>
        <!-- <div style="width: 15%; float: right;">
          <a href="<?= base_url('pelanggan')?>/index" style="width: 120px; margin-right:5px;" class="btn btn-primary btn-block mg-b-5"><i class="fa fa fa-plus mg-r-10"> </i>Add Data</a>   
        </div>      -->
      </div><!-- d-flex -->

      <div class="br-pagebody" style="margin-left: auto; margin-right: auto;">
      <?php
            if(isset($_SESSION['message'])){
              echo "<div style='margin-top:20px' class='alert alert-".$_SESSION['message'][0]."'>
                ".$_SESSION['message'][1]."
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
            }
      ?>
      <div class="row row-sm mg-b-20">
             
            <div class="col-sm-6 col-xl-3">
            <a href="" data-toggle="modal" data-target="#modal_pengajuan_usaha" class="">
              <div class="bg-info rounded overflow-hidden">
              
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10"></p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">Pengajuan Usaha</p>
                    
                  </div>
                </div>
                
                <div id="ch1" class="ht-50 tr-y-1"></div>
              </div>
              </a>
            </div><!-- col-3 -->
          
          
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <a href="" data-toggle="modal" data-target="#modal_pengajuan_prodak">
              <div class="bg-purple rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                  
                  <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10"></p>
                    <p class="tx-22 tx-white tx-lato tx-bold mg-b-0 lh-1">Pengajuan Prodak</p>
                    
                  </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
              </div>
              </a>
            </div><!-- col-3 -->
          </a>
      </div><!-- br-pagebody -->

       <!-- BASIC MODAL -->
        <div id="modal_pengajuan_usaha" class="modal fade">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Buat Pengajuan Usaha</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-25">
                  <div class="form-group">
                    <label for="form-control-label" class="">Nama Usaha</label>
                    <input type="text" name="fakultas" id="fakultas" class="form-control pd-y-12" placeholder="Masukkan Nama Usaha">
                  </div><!-- form-group -->
                  <div class="form-group">
                    <label for="form-control-label" class="">Kategori Usaha</label>
                    <input type="text" name="fakultas" id="fakultas" class="form-control pd-y-12" placeholder="Masukkan Kategori">
                  </div><!-- form-group -->
                  <div class="form-group">
                    <label for="form-control-label" class="">Proposal Usaha</label>
                    <input type="text" name="fakultas" id="fakultas" class="form-control pd-y-12" placeholder="Masukkan Nama Fakultas">
                  </div><!-- form-group -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-semibold" onclick="java_script_:simpanFakultas()">Simpan</button>
                  <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-semibold" data-dismiss="modal">Batal</button>
                </div>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->


           <!-- BASIC MODAL -->
        <div id="modal_pengajuan_prodak" class="modal fade">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Buat Pengajuan Prodak</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body pd-25">
                  <div class="form-group">
                    <label for="form-control-label" class="">Nama Prodak</label>
                    <input type="text" name="fakultas" id="fakultas" class="form-control pd-y-12" placeholder="Masukkan Nama Prodak">
                  </div><!-- form-group -->
                  <div class="form-group">
                    <label for="form-control-label" class="">Nama Usaha</label>
                    <input type="text" name="fakultas" id="fakultas" class="form-control pd-y-12" placeholder="Masukkan Nama Usaha">
                  </div><!-- form-group -->
                  <div class="form-group">
                    <label for="form-control-label" class="">Foto Prodak</label>
                    <input type="text" name="fakultas" id="fakultas" class="form-control pd-y-12" placeholder="Masukkan Foto">
                  </div><!-- form-group -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-semibold" onclick="java_script_:simpanFakultas()">Simpan</button>
                  <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-semibold" data-dismiss="modal">Batal</button>
                </div>
              </div>
            </div><!-- modal-dialog -->
          </div><!-- modal -->
     
