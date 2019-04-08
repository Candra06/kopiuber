
  

  <main id="main">

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="clearfix" style="padding-top: 10%;">
      <div class="container-fluid">

        <div class="section-header">
          <h3>Daftar Untuk Mulai Bergabung</h3>
        </div>

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

        <div class="row wow fadeInUp">

          <div class="col-lg-10" style="margin-left: auto; margin-right:auto;">

            <div class="form" style="position: center;">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>

              <form action="<?= base_url("home/register")?>" method="post" class="contactForm">
                <div class="form-row">
                  <div class="form-group col-lg-12">
                    <label for="" class="">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required />
                    
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-lg-12">
                  <label for="" class="">NIM</label>
                    <input type="text" class="form-control" name="nim" id="nim" placeholder="NIM" required />
                    
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-lg-4">
                    <label for="" class="">Tempat Tanggal Lahir</label>
                    <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat Lahir" required />
                    
                  </div>

                  <div class="form-group col-lg-8">
                    <label for="" class="" style="color: white;">-</label>
                    <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="" required />
                    
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-lg-6">
                  <label for="" class="">Fakultas</label>
                    <select class="form-control" id="fakultas" required name="fakultas" onchange="getDataProdi(this.options[this.selectedIndex].value)">
                    <option value="">Pilih Fakultas</option>
                    <?php foreach($data_fakultas as $df){?>
                      <option value="<?= $df['kd_fakultas'];?>"><?= $df['fakultas'];?></option>
                    <?php }?>
                  </select>
                    <!-- <input type="text" name="fakultas" class="form-control" id="fakultas" placeholder="Fakultas"  /> -->
                    
                  </div>
                  <script type="text/javascript">
                    function getDataProdi(select_item) {
                        $.ajax({
                          type: 'post',
                          url: '<?= base_url()."home/getProdi"?>',
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
                  <div class="form-group col-lg-6">
                  <label for="" class="">Prodi</label>
                    <select class="form-control" id="prodi" name="prodi" required>
                      <option value="">Pilih Prodi</option>
                    </select>
                    <!-- <input type="text" class="form-control" name="prodi" id="prodi" placeholder="Prodi"  /> -->
                    
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <label for="" class="">Email</label>
                    <input type="text" class="form-control" required name="email" id="email" placeholder="Email"  />
                    
                  </div>

                  <div class="form-group col-lg-6">
                    <label for="" class="">Nomor HP/WA</label>
                    <input type="number" class="form-control" required name="no_hp" id="no_hp" placeholder="Nomor HP"  />
                    
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="">Alamat</label>
                  <textarea class="form-control" name="alamat"  required id="alamat" rows="3" data-rule="required" data-msg="Please write something for us" placeholder="Alamat"></textarea>
                </div>

                <div class="form-group">
                  <p></p>
                </div>
                <div class="text-center">
                  <button type="submit" title="Send Message">Daftar</button>
                </div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

  </main>


<script type="text/javascript">

            function reset(){
                  document.getElementById("fakultas").value = '';
                  document.getElementById("prodi").value = '';
                  document.getElementById("nama").value = '';
                  document.getElementById("nim").value = '';
                  document.getElementById("no_hp").value = '';
                  document.getElementById("email").value = '';
                  document.getElementById("alamat").value = '';
            }

           
</script>