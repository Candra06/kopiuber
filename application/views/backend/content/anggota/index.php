      
      <div class="br-pagetitle" >
        <i class="icon ion-ios-home-outline tx-70 lh-0"></i>
          <div class="" style="width: 90%;">
            <h4><?= $header ?></h4>
          </div>
          <div style="width: 15%; float: right;">
            <a href="<?= base_url('anggota')?>/add" style="width: 120px; margin-right:5px;" class="btn btn-primary btn-block mg-b-5"><i class="fa fa fa-plus mg-r-10"> </i>Add Data</a>   
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
                  <th class="wd-10p">Nama</th>
                  <th class="wd-15p">NIM</th>
                  <th class="wd-15p">Fakultas</th>
                  <th class="wd-15p">Prodi</th>
                  <th class="wd-15p">Golongan</th>
                  <th class="wd-15p">Status Mahasiswa</th>
                  <th class="wd-15p">Status Keanggotaan</th>
                  <th class="wd-15p">Poin</th>
                  <th class="wd-10p">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($data as $d){
                ?>
                <tr>
                  <td><?= $d['nama_anggota']?></td>
                  <td><?= $d['nim']?></td>
                  <td><?= $d['fakultas']?></td>
                  <td><?= $d['prodi']?></td>
                  <td><?= $d['golongan']?></td>
                  <td><?= $d['st_mahasiswa']?></td>
                  <td><?= $d['st_anggota']?></td>
                  <td><?= $d['poin']?></td>
                  <td>
                    <a href="<?= base_url().$this->uri->segment(1)."/edit/$d[kd_anggota]"?>"><button type="" class="btn btn-primary btn-icon mg-r-5 mg-b-10"><div><i class="fa fa-pencil-alt"></i></div></button></a> 
                    <a href="<?= base_url().$this->uri->segment(1)."/delete/$d[kd_anggota]"?>"><button type="" class="btn btn-danger btn-icon mg-r-5 mg-b-10"><div><i class="fa fa-trash"></i></div></button></a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div><!-- table-wrapper -->
      </div><!-- br-pagebody -->
     
