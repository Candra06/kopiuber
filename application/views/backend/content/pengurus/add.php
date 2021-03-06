      
      <div class="br-pagetitle" >
      <i class="icon ion-ios-home-outline tx-70 lh-0"></i>
        <div class="" style="width: 90%;">
          <h4><?= $header ?></h4>
        </div>  
      </div><!-- d-flex -->

      <div class="br-pagebody">
      <div class="br-section-wrapper">
          <h6 class="br-section-label">Input Data Pengurus</h6>
          

          <div class="form-layout form-layout-1">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Pilih Anggota <span class="tx-danger">*</span></label>
                  <select class="form-control form-control-dark select-2" id="anggota" name="anggota" placeholder="Pilih Anggota" >
                    <option value="">Pilih Anggota</option>
                    <?php foreach ($data_anggota as $da) {?>
                    <option value="<?= $da['kd_anggota'];?>"><?= $da['nama_anggota']?></option>
                    <?php } ?>
                    
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Jabatan <span class="tx-danger">*</span></label>
                  <select class="form-control form-control-dark select-2" id="jabatan" name="jabatan" placeholder="Pilih Anggota">
                    <option value="">Pilih Jabatan</option>
                    <?php foreach ($data_jabatan as $dj) {?>
                    <option value="<?= $dj['kd_jabatan'];?>"><?= $dj['jabatan']?></option>
                    <?php } ?>
                    
                  </select>
                </div>
              </div><!-- col-4 -->
              

              <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">User Login <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" name="email" placeholder="Masukkan User Login Pengurus" required>
                </div>
              </div><!-- col-8 -->

              <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Foto <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="file" name="foto" required>
                </div>
              </div><!-- col-8 -->
              
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
     
