 <!--==========================
  Header
  ============================-->
  

  <!--==========================
    Intro Section
  ============================-->
  <!-- <section id="intro" class="clearfix">
    
  </section>#intro -->

  

  <main id="main">

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="clearfix" style="padding-top: 10%;">
      <div class="container-fluid">

        <div class="section-header">
          <h3>Daftar Untuk Mulai Bergabung</h3>
        </div>

        <div class="row wow fadeInUp">

          <div class="col-lg-10" style="margin-left: auto; margin-right:auto;">

            <div class="form" style="position: center;">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>

              <form action="" method="post" enctype="multipart/form-data" class="contactForm">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <label for="" class="">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    
                  </div>
                  <div class="form-group col-lg-6">
                  <label for="" class="">NIM</label>
                    <input type="text" class="form-control" name="nim" id="nim" placeholder="NIM"  />
                    
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-lg-6">
                  <label for="" class="">Fakultas</label>
                  <select class="form-control" id="fakultas" name="fakultas" onchange="getDataProdi(this.options[this.selectedIndex].value)">
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
                  <select class="form-control" id="prodi" name="prodi">
                    <option value="">Pilih Prodi</option>
                  </select>
                    <!-- <input type="text" class="form-control" name="prodi" id="prodi" placeholder="Prodi"  /> -->
                    
                  </div>
                </div>

                <div class="form-row">
                <div class="form-group col-lg-6">
                <label for="" class="">Email</label>
                  <input type="text" class="form-control" name="email" id="email" placeholder="Email"  />
                  
                </div>

                <div class="form-group col-lg-6">
                <label for="" class="">Nomor HP/WA</label>
                  <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor HP"  />
                  
                </div>
                </div>

                <div class="form-group">
                <label for="" class="">Alamat</label>
                  <textarea class="form-control" name="alamat" id="alamat" rows="3" data-rule="required" data-msg="Please write something for us" placeholder="Alamat"></textarea>
                  
                </div>
                <div class="text-center"><button type="submit" title="Send Message"  onclick="java_script_:simpanData()">Daftar</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

  </main>


<script type="text/javascript">
              function simpanData(){
                  var nama      = $('#nama').val();
                  var nim       = $('#nim').val();
                  var fakultas  = document.getElementById("fakultas").value;
                  var prodi     = document.getElementById("prodi").value;
                  var email     = $('#email').val(); 
                  var no_hp    = $('#no_hp').val();   
                  var alamat    = $('#alamat').val();     

                  $.ajax({      //simpan ke tabel transaksi servis
                    type: "POST",
                    url: "<?= base_url() ?>home/register",
                    dataType: "JSON",
                    data: {
                        nama: nama,
                        nim: nim,
                        fakultas: fakultas,
                        prodi: prodi,
                        email: email,   
                        no_hp: no_hp, 
                        alamat: alamat
                    },success: function(data){
                      // console.log(data);
                      alert('Berhasil Input');
                      // reset();
                    },error: function(data){
                      alert('Gagal Input');
                    }
                  })
                }

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