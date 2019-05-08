      
      <div class="br-pagetitle" >
      <i class="icon ion-ios-home-outline tx-70 lh-0"></i>
        <div class="" style="width: 90%;">
          <h4><?= $header ?></h4>
        </div>  
      </div><!-- d-flex -->

      <div class="br-pagebody">
      <div class="br-section-wrapper">
          <h6 class="br-section-label">Input Data Barang</h6>
          

          <div class="form-layout form-layout-1">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Nama Produk <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="text" name="nama_produk" placeholder="Masukkan Nama Produk" required>
                </div>
              </div><!-- col-8 -->
              
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Pilih Kategori <span class="tx-danger">*</span></label>
                  <select class="form-control form-control-dark select-2" id="kategori" name="kategori" placeholder="Pilih Kategori" >
                    <option value="">Pilih Kategori</option>
                    <?php foreach ($kategori as $kt) {?>
                    <option value="<?= $kt['kd_kategori'];?>"><?= $kt['kategori']?></option>
                    <?php } ?>
                    
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Harga <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="number" name="harga" placeholder="Masukkan Harga" >
                </div>
              </div><!-- col-8 -->

              <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Stok <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="number" name="stok" placeholder="Masukkan Stok">
                </div>
              </div><!-- col-8 -->

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Status Barang <span class="tx-danger">*</span></label>
                  <select class="form-control form-control-dark select-2" id="status" name="status" placeholder="Pilih Status Barang">
                    <option value="">Pilih Status Barang</option>
                    <option value="1">Ready</option>
                    <option value="2">Pre Order</option>
                    <option value="3">Sold Out</option>
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Foto Produk <span class="tx-danger">*</span></label>
                  <input class="form-control form-control-dark" type="file" name="foto">
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
     
