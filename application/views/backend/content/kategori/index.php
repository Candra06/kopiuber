      
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline tx-70 lh-0"></i>
          <div class="" style="width: 90%;">
            <h4><?= $header ?></h4>
          </div>
          <div style="width: 15%; float: right;">
            <a href="" data-toggle="modal" data-target="#modalfakultas" style="width: 120px; margin-right:5px;" class="btn btn-primary btn-block mg-b-5"><i class="fa fa fa-plus mg-r-10"> </i>Add Data</a>   
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
                  <th class="wd-20p">Kode Kategori</th>
                  <th class="wd-20p">Kategori</th>
                  <th class="wd-20p">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($data as $d){
                ?>
                <tr>
                  <td><?= $d['kd_kategori'] ?></td>
                  <td><?= $d['kategori'] ?></td>
                  <td>
                    <a href="<?= base_url().$this->uri->segment(1)."/edit/$d[kd_kategori]"?>"><button type="" class="btn btn-primary btn-icon mg-r-5 mg-b-10"><div><i class="fa fa-pencil-alt"></i></div></button></a> 
                    <a href="<?= base_url().$this->uri->segment(1)."/delete/$d[kd_kategori]"?>"><button type="" class="btn btn-danger btn-icon mg-r-5 mg-b-10"><div><i class="fa fa-trash"></i></div></button></a>
                  </td>
                </tr>
                  <?php } ?>
              </tbody>
            </table>
          </div><!-- table-wrapper -->
      </div><!-- br-pagebody -->

       <!-- BASIC MODAL -->
    <div id="modalfakultas" class="modal fade">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content bd-0 tx-14">
            <div class="modal-header pd-y-20 pd-x-25">
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Tambah Kategori</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body pd-25">
              <form class="" method="POST" enctype="multipart/form-data">
              
              <div class="form-group">
                <label for="form-control-label" class="">Nama Kategori</label>
                <input type="text" name="kategori" id="kategori" class="form-control pd-y-12" placeholder="Masukkan Nama Kategori">
              </div><!-- form-group -->
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-semibold" onclick="java_script_:simpanKategori()" >Simpan</button>
              <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-semibold" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </div><!-- modal-dialog -->
      </div><!-- modal -->

      <script type="text/javascript">
          function simpanKategori(){
                        var kategori    = $('#kategori').val();

                        $.ajax({      //simpan ke tabel transaksi servis
                          type: "POST",
                          url: '<?= base_url() ?>kategori/input',
                          dataType: "JSON",
                          data: {
                              kategori: kategori
                          },success: function(data){
                            alert("Berhasil");
                            console.log(data);
                          },error: function(data){
                            alert("Gagal");
                              console.log(data);
                          }
                        })
                      }
      </script>

     
     
