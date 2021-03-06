 <!--==========================
  Header
  ============================-->
  

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container">

      <div class="intro-img">
        <img src="<?= base_url() ?>asset/frontend/img/Kopi_Uber.png" alt="" style="margin-left:;" class="img-fluid">
      </div>

      <div class="intro-info">
        <h2><span>Koperasi Digital</span><br>Universitas Negeri Jember</h2>
        <div>
          <a href="<?= base_url();?>home/registrasi" class="btn-get-started scrollto">Ayo Bergabung!</a>
        </div>
      </div>

    </div>
  </section><!-- #intro -->

  <main id="main">

   <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio" class="clearfix">
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Produk Kami</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <?php foreach($kategori as $k){?>
                <?php if ($k['kategori'] == 'Digital') { ?>
                   <li data-filter=".filter-app"><?= $k['kategori']?></li>
                <?php } else { ?>
                   <li data-filter=".filter-card"><?= $k['kategori']?></li>
                <?php } ?>
              <?php }?>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="<?= base_url() ?>asset/frontend/img/portfolio/app1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">Pulsa Prabayar</a></h4>
                <p>Jual Pulsa all Operator</p>
                <div>
                  <a href="" data-toggle="modal" data-target="#modal_pulsa" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <img src="<?= base_url() ?>asset/frontend/img/portfolio/web3.jpeg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">Kuliner</a></h4>
                <p>Pisang Coklat</p>
                <div>
                  <a href="<?= base_url() ?>asset/frontend/img/portfolio/web3.jpeg" class="link-preview" data-lightbox="portfolio" data-title="Web 3" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <img src="<?= base_url() ?>asset/frontend/img/portfolio/app2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">Token Listrik</a></h4>
                <p>App</p>
                <div>
                  <a href="<?= base_url() ?>asset/frontend/img/portfolio/app2.jpg" class="link-preview" data-lightbox="portfolio" data-title="App 2" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="<?= base_url() ?>asset/frontend/img/portfolio/card2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">Berbagai macam sembako</a></h4>
                <p>Card</p>
                <div>
                  <a href="<?= base_url() ?>asset/frontend/img/portfolio/card2.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 2" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <img src="<?= base_url() ?>asset/frontend/img/portfolio/app3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><a href="#">Paket data</a></h4>
                <p>App</p>
                <div>
                  <a href="<?= base_url() ?>asset/frontend/img/portfolio/app3.jpg" class="link-preview" data-lightbox="portfolio" data-title="App 3" title="Preview"><i class="ion ion-eye"></i></a>
                  <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #portfolio -->


    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>Visi dan Misi</h3>
          <p><b>Menjadi Lokomotif Terwujudnya Demokrasi Ekonomi di Era Digital</b></p>
        </header>

        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
           

            <div class="icon-box wow fadeInUp">
              <h4 class="title"><a href="">Melakukan edukasi dan praktik keadaban demokrasi ekonomi melalui wadah koperasi</a></h4>
              <p class="description"></p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
              
              <h4 class="title"><a href="">Membuka ruang partisipasi, inovasi,   dan solidaritas melalui teknologi informasi dan komunikasi</a></h4>
              <p class="description"></p>
            </div>

            <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
              <h4 class="title"><a href="">Mentransformasi modal sosial mahasiswa menjadi kekuatan ekonomi</a></h4>
              <p class="description"></p>
            </div>

          </div>

          <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">
            <img src="<?= base_url() ?>asset/frontend/img/about-img.svg" class="img-fluid" alt="">
          </div>
        </div>

       
      </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Landasan</h3>
          <p></p>
        </header>

        <div class="row">

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-analytics-outline" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="">Solidaritas</a></h4>
              
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-briefcase-outline" style="color: #e9bf06;"></i></div>
              <h4 class="title"><a href="">Transparansi</a></h4>
              
            </div>
          </div>

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-lightbulb-outline" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a href="">Inovatif</a></h4>
              
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-paper-outline" style="color:#41cf2e;"></i></div>
              <h4 class="title"><a href="">Kreatif</a></h4>
              
            </div>
          </div>

          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-world-outline" style="color: #d6ff22;"></i></div>
              <h4 class="title"><a href="">Partisipatif</a></h4>
              
            </div>
          </div>
          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-bookmarks-outline" style="color: #4680ff;"></i></div>
              <h4 class="title"><a href="">Edukatif</a></h4>
             
            </div>
          </div>

        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Why Us Section
    ============================-->
    <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>Mengapa Kopi Uber?</h3>
          <p>Kopi Uber merupakan sebuah organisasi Koperasi Digital yang berasaskan Gotong Royong dan Kekeluargaan serta menjunjung tinggi semangat nasionalisme dan keadilan dalam ekonomi.</p>
        </header>

        <div class="row row-eq-height justify-content-center">

          <div class="col-lg-3 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-money"></i>
              <div class="card-body">
                <h6 class="card-title">Mendapat sisa hasil usaha</h6>
                
                
              </div>
            </div>
          </div>

          <div class="col-lg-3 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-puzzle-piece"></i>
              <div class="card-body">
                <h6 class="card-title">Tabungan investasi untuk masa depan</h6>
                
                
              </div>
            </div>
          </div>

          <div class="col-lg-3 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-exchange"></i>
              <div class="card-body">
                <h6 class="card-title">Kemudahan bertransaksi online</h6>
                
                
              </div>
            </div>
          </div>

          </div>
          <div class="row row-eq-height justify-content-center">

          <div class="col-lg-3 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-location-arrow"></i>
              <div class="card-body">
                <h6 class="card-title">Area lingkup penjualan terjangkau</h6>
                
                
              </div>
            </div>
          </div>

          <div class="col-lg-3 mb-4">
            <div class="card wow bounceInUp">
                <i class="fa fa-cubes"></i>
              <div class="card-body">
                <h6 class="card-title">Tersedia barang baru dan barang bekas</h6>
                
                
              </div>
            </div>
          </div>

        </div>

        <div class="row counters">

          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up">5</span>
            <p>Anggota</p>
          </div>

          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up">1</span>
            <p>Mitra</p>
          </div>

          <div class="col-lg-4 col-6 text-center">
            <span data-toggle="counter-up">0</span>
            <p>Produk</p>
          </div>

         
  
        </div>

      </div>
    </section>

    <!--==========================
      Clients Section
    ============================-->
    <section id="testimonials" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Tim Kami</h3>
        </header>

        <div class="row justify-content-center">
          <div class="col-lg-8">

            <div class="owl-carousel testimonials-carousel wow fadeInUp">
            <?php foreach( $pengurus as $p) {?>
              <div class="testimonial-item">
                <img src="<?= base_url('asset/upload/pengurus/').$p['foto'];?>" class="testimonial-img" alt="" style="width: 120px; height: 120px;">
                <h3><?= $p['nama_anggota']?></h3>
                <h4><?= $p['jabatan']?></h4>
                <p>
                <?= $p['tempat_lahir']?>, <?= $p['tgl_lahir']?>
                </p>
                <p>
                <?= $p['prodi']?> - <?= $p['fakultas']?>
                </p>
              </div>
            <?php }?>
              
            </div>

          </div>
        </div>
      </div>
    </section><!-- #testimonials -->
  </main>

  <!-- Modal -->
  <div class="modal fade" id="modal_pulsa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pulsa Prabayar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <form action="<?= base_url("home/transaksi_pulsa")?>" method="post">
                <?php 
                foreach($saldo as $sd){
                  if ($sd['stok'] <= 50000 or $sd['status'] == 3) { 
                  ?>
                  <div class="form-group" id="pesan">
                    <label>Maaf saat ini Layanan Pulsa Prabayar tidak dapat melakukan proses transaksi</label>
                  </div>
               <?php } ?>
                  <div class="form-group">
                    <label>Pilih Operator</label>
                    <select name="operator" class="form-control" onchange="get_nominal(this.options[this.selectedIndex].value)">
                      <option value="">Pilih Operator</option>
                      <?php foreach($operator as $o ){?>
                      <option value="<?= $o['id_operator']; ?>"><?= $o['operator']; ?></option>
                      <?php } 
                      }?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Pilih Nominal</label>
                    <select name="nominal" id="nominal" class="form-control">
                      <option value="">Pilih Nominal</option>
                    </select>
                  </div>
              
                <div class="form-group">
                  <label for="">Nomor HP</label>
                  <input type="text" class="form-control" name="no_hp" placeholder="Nomor HP">
                </div>
                <div class="form-group">
                  <label for="">Kode Anggota</label>
                  <input type="text" class="form-control" name="anggota" placeholder="Kode Anggota">
                </div>
              
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" id="proses">Checkout</button>
          </div>
          </form> 
        </div>
      </div>
    </div>

    <script type="text/javascript">
      function get_nominal(select_item) {
          $.ajax({
            type: 'post',
            url: '<?= base_url()."home/get_nominal"?>',
            data: {
              get_option:select_item
            },success: function(response) {
              document.getElementById("nominal").innerHTML = response;
            },error: function(XMLHttpRequest, textStatus, errorThrown){
              alert("Status: " + textStatus); 
              alert("Error: " + errorThrown);
            }
          })
        }
    </script>