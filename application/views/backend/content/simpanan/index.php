      
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline tx-70 lh-0"></i>
          <div class="" style="width: 90%;">
            <h4><?= $header ?></h4>
          </div>
          <div style="width: 15%; float: right;">
            <a href="<?= base_url('pengurus')?>/add" style="width: 120px; margin-right:5px;" class="btn btn-primary btn-block mg-b-5"><i class="fa fa fa-plus mg-r-10"> </i>Add Data</a>   
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
                  <th class="wd-10p">Kode Pengurus</th>
                  <th class="wd-15p">Nama</th>
                  <th class="wd-15p">Jabatan</th>
                  <th class="wd-15p">Email</th>
                  <th class="wd-10p">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($data as $d){
                ?>
                <tr>
                  <td><?= $d['kd_pengurus']?></td>
                  <td><?= $d['nama_anggota']?></td>
                  <td><?= $d['jabatan']?></td>
                  <!-- <td><img src="<?= base_url('asset/upload/pengurus/').$d['foto'];?>" alt="" class="" style="width: 50px;height: 50px;"></td> -->
                  <td><?= $d['email']?></td>
                  <td>
                    <a href="<?= base_url().$this->uri->segment(1)."/edit/$d[kd_pengurus]"?>"><button type="" class="btn btn-primary btn-icon mg-r-5 mg-b-10"><div><i class="fa fa-pencil-alt"></i></div></button></a> 
                    <a href="<?= base_url().$this->uri->segment(1)."/delete/$d[kd_pengurus]"?>"><button type="" class="btn btn-danger btn-icon mg-r-5 mg-b-10"><div><i class="fa fa-trash"></i></div></button></a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div><!-- table-wrapper -->
      </div><!-- br-pagebody -->
     
