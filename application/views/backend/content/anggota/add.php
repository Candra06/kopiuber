      
      <div class="br-pagetitle">
      <i class="icon ion-ios-home-outline tx-70 lh-0"></i>
        <div class="" style="width: 90%;">
          <h4><?= $header ?></h4>
        </div>  
      </div><!-- d-flex -->

      <div class="br-pagebody">
      <div class="br-section-wrapper">
          <h6 class="br-section-label">Input Data Anggota</h6>
          

          <div class="form-layout form-layout-1">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row mg-b-25">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Nama Lengkap: <span class="tx-danger">*</span></label>
                  <input class="form-control " type="text" name="nama"  placeholder="Nama" required> 
                  <!-- // value="<?php  if( $data == null){ echo $kode_user; } else { echo Input_helper::postOrOr('kd_user', $data['kd_user']); } ?>" -->
                  <!-- <input class="form-control form-control-dark" type="hidden" name="kd_user" value="<?= Input_helper::postOrOr('kd_user', $data['kd_user']) ?>" placeholder="Kode Teknisi" disabled> -->
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">NIM: <span class="tx-danger">*</span></label>
                  <input class="form-control " type="number" name="nim" value="<?= Input_helper::postOrOr('nama', $data['nama']) ?>" placeholder="Masukkan NIM" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  <input class="form-control " type="email" name="email" value="<?= Input_helper::postOrOr('email', $data['email']) ?>" placeholder="Masukkan Email" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">No HP <span class="tx-danger">*</span></label>
                  <input class="form-control " type="number" name="no_hp" value="<?= Input_helper::postOrOr('email', $data['email']) ?>" placeholder="Masukkan No HP" required >
                  <!-- <input class="form-control form-control-dark" type="hidden" name="kd_user" value="<?= Input_helper::postOrOr('kd_user', $data['kd_user']) ?>" placeholder="Kode Teknisi" disabled> -->
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Fakultas: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="fakultas" data-placeholder="Pilih Fakultas">
                    <option value="">Pilih Fakultas</option>
                    <option value="1">Admin</option>
                    <option value="2">Teknisi</option>
                    <option value="3">Operator</option>
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Prodi: <span class="tx-danger">*</span></label>
                <select class="form-control select2" name="prodi" data-placeholder="Pilih Prodi">
                    <option value="">Pilih Prodi</option>
                    <option value="1">Admin</option>
                    <option value="2">Teknisi</option>
                    <option value="3">Operator</option>
                  </select>
                </div>
              </div><!-- col-4 -->
              

              <div class="col-lg-8">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Alamat: <span class="tx-danger">*</span></label>
                  <input class="form-control " type="text" name="alamat" value="<?= Input_helper::postOrOr('alamat', $data['alamat']) ?>" placeholder="Masukkan Alamat" required>
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                  <select class="form-control  select-2" name="status" placeholder="Pilih Status">
                    <option value="">Pilih Prodi</option>
                    <option value="1">Aktif</option>
                    <option value="0">Banned</option>
                    
                  </select>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-primary">Submit</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
            </form>
          </div><!-- form-layout -->

          
        </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->

      <script>
      $(function(){
        'use strict'

        $('.form-layout .form-control').on('focusin', function(){
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('.form-layout .form-control').on('focusout', function(){
          $(this).closest('.form-group').removeClass('form-group-active');
        });

        // Select2
        $('#select2-a, #select2-b').select2({
          minimumResultsForSearch: Infinity
        });

        $('#select2-a').on('select2:opening', function (e) {
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('#select2-a').on('select2:closing', function (e) {
          $(this).closest('.form-group').removeClass('form-group-active');
        });

      });
    </script>
     
