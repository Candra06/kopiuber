      
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline tx-70 lh-0"></i>
        <div class="" style="width: 90%;">
          <h4><?= $header ?></h4>
        </div>  
      </div><!-- d-flex -->

      <div class="br-pagebody">
      <div class="br-section-wrapper">
          <h6 class="br-section-label">Input Data Usaha</h6>
          <p class="br-section-text">A form with a label on top of each form control.</p>

          <div class="form-layout form-layout-1">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Nama Usaha <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" name="nama_usaha" value="<?= Input_helper::postOrOr('nama_usaha', $data['nama_usaha']) ?>" placeholder="Masukkan Nama Usaha" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Kategori <span class="tx-danger">*</span></label>
                  <select name="kategori" class="form-control" id="">
                    <option value="">Pilih Kategori</option>
                    <?php foreach($kategori as $dt){?>
                      <option value="<?= $dt['kd_kategori']?>"><?= $dt['kategori']?></option>
                    <?php }?>
                  </select>
                </div>
              </div><!-- col-8 -->
             
              

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
     
