      
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
                  <input class="form-control " type="text" name="nama"  placeholder="Nama" value="<?= Input_helper::postOrOr('nama', $data['nama_anggota']) ?>" required> 
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">NIM/NIP: <span class="tx-danger">*</span></label>
                  <input class="form-control " type="number" name="nim" value="<?= Input_helper::postOrOr('nim', $data['nim']) ?>" placeholder="Masukkan NIM/NIP" required>
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
                  <input class="form-control " type="number" name="no_hp" value="<?= Input_helper::postOrOr('no_hp', $data['no_hp']) ?>" placeholder="Masukkan No HP" required >
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Fakultas: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="fakultas"  onchange="getDataProdi(this.options[this.selectedIndex].value)" data-placeholder="Pilih Fakultas">
                    <option value="">Pilih Fakultas</option>
                    <?php foreach($data_fakultas as $df){?>
                      <option value="<?= $df['kd_fakultas'];?>"><?= $df['fakultas'];?></option>
                    <?php }?>
                  </select>
                </div>
              </div><!-- col-4 -->
              <script type="text/javascript">
                    function getDataProdi(select_item) {
                        $.ajax({
                          type: 'post',
                          url: '<?= base_url()."Anggota/getProdi"?>',
                          data: {
                            get_option:select_item
                          },success: function(response) {
                            document.getElementById("prodi").innerHTML = response;
                          },error: function(XMLHttpRequest, textStatus, errorThrown){
                            alert("Status: " + textStatus); 
                            alert("Error: " + errorThrown);
                          }
                        })
                      }
                  </script>
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Prodi: <span class="tx-danger">*</span></label>
                <select class="form-control select2" name="prodi" id="prodi" data-placeholder="Pilih Prodi">
                    <option value="">Pilih Prodi</option>
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Tempat Lahir <span class="tx-danger">*</span></label>
                  <input class="form-control " type="text" name="tempat_lahir" value="<?= Input_helper::postOrOr('tempat_lahir', $data['tempat_lahir']) ?>" placeholder="Masukkan Tempat Lahir" required >
                  
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Tanggal Lahir<span class="tx-danger">*</span></label>
                  <input class="form-control " type="date" name="tgl_lahir" value="<?= Input_helper::postOrOr('tgl_lahir', $data['tgl_lahir']) ?>" placeholder="Masukkan Tanggal Lahir" required >
                  
                </div>
              </div><!-- col-4 -->

              
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                  <select class="form-control  select-2" name="status" placeholder="Pilih Status">
                    <option value="">Pilih Status</option>
                    <option value="1">Aktif</option>
                    <option value="0">Banned</option>
                    
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-8">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Alamat Rumah/KOS: <span class="tx-danger">*</span></label>
                  <input class="form-control " type="text" name="alamat" value="<?= Input_helper::postOrOr('alamat', $data['alamat']) ?>" placeholder="Masukkan Alamat" required>
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
     
