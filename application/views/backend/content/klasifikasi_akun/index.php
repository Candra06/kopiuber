      
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline tx-70 lh-0"></i>
          <div class="" style="width: 90%;">
            <h4><?= $header ?></h4>
          </div>
          <div style="width: 15%; float: right;">
            <a href=""  data-toggle="modal" data-target="#mdl_jabatan" style="width: 120px; margin-right:5px;" class="btn btn-primary btn-block mg-b-5"><i class="fa fa fa-plus mg-r-10"> </i>Add Data</a>   
          </div>  
      </div><!-- d-flex -->


      <div class="br-pagebody">
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
      <div class="table-wrapper responsive">
            <table id="datatable1" class="table responsive display">
              <thead>
                <tr>
                  <th class="wd-10p">Kode Klasifikasi</th>
                  <th class="wd-15p">Klasifikasi Akun</th>
                  <th class="wd-10p">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($data as $d){
                ?>
                <tr>
                  <td><?= $d['kode']?></td>
                  <td><?= $d['klasifikasi']?></td>
                  <td>
                    <a data-toggle="modal" data-target="#mdl_jabatan_updt<?=$d['kode']?>"
                    >
                    <!-- data-toggle="modal" data-target="#mdl_jabatan_updt" -->
                    <button type="" id='btn-edit' class="btn btn-primary btn-icon mg-r-5 mg-b-10"><div><i class="fa fa-pencil-alt"></i></div></button></a> 
                    <a href="<?= base_url().$this->uri->segment(1)."/delete/$d[kode]/1"?>"><button type="" class="btn btn-danger btn-icon mg-r-5 mg-b-10"><div><i class="fa fa-trash"></i></div></button></a>
                      <div aria-hidden="true" role="dialog" tabindex="-1" id="mdl_jabatan_updt<?=$d['kode']?>" class="modal fade">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content bd-0 tx-14">
                            <div class="modal-header pd-y-20 pd-x-25">
                              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Klasifikasi Akun</h6>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form method="POST" action="<?php base_url('akun/update_klasifikasi')?>"  class="">
                              <div class="modal-body pd-25">
                                <div class="form-group">
                                  <label for="form-control-label" class="">Klasifikasi</label>
                                  <input type="hidden" name="updt_kd_jabatan" value='<?= $d['kode']?>' id="updt_kd_jabatan" class="form-control pd-y-12" placeholder="Masukkan Jabatan">
                                  <input type="text" name="klasifikasi_edit" value='<?= $d['klasifikasi']?>' id="jabatan_edit" class="form-control pd-y-12" placeholder="Masukkan Jabatan">
                                </div><!-- form-group -->
                              
                              </div>
                              <div class="modal-footer">
                                <a href="<?= base_url().$this->uri->segment(1)."/akun/update_klasifikasi/$d[kode]"?>">
                                  <button type="button" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-semibold" >Simpan</button>
                                </a>
                                <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-semibold" data-dismiss="modal">Batal</button>
                              </div>
                            </form>
                            
                            
                          </div>
                        </div><!-- modal-dialog -->
                      </div><!-- modal -->
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div><!-- table-wrapper -->
      </div><!-- br-pagebody -->

       <!-- BASIC MODAL -->
    <div id="mdl_jabatan" class="modal fade">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Tambah Klasifikasi Akun</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action=""  class="">
              <div class="modal-body pd-25">
                <div class="form-group">
                  <label for="form-control-label" class="">Kode Klasifikasi Akun</label>
                  <input type="text" name="kode_klas" id="kode_klas" class="form-control pd-y-12" placeholder="Masukkan Kode">
                </div><!-- form-group -->
                <div class="form-group">
                  <label for="form-control-label" class="">Nama Klasifikasi Akun</label>
                  <input type="text" name="klasifikasi" id="klasifikasi" class="form-control pd-y-12" placeholder="Masukkan Klasifikasi Akun">
                </div><!-- form-group -->
              
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-semibold" >Simpan</button>
                <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-semibold" data-dismiss="modal">Batal</button>
              </div>
            </form>
            
            
          </div>
        </div><!-- modal-dialog -->
      </div><!-- modal -->

      <!-- BASIC MODAL -->

                    
     
