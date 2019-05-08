 <!--==========================
  Header
  ============================-->
  


  <main id="main">

<!--==========================
  Contact Section
============================-->
<section id="contact" class="clearfix">
  <div class="container-fluid">

    <div class="section-header" style="margin-top:5%;">
      <h3>CheckOut</h3>
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

      <div class="col-lg-4" style="margin-left: auto; margin-right:auto;">

        <div class="form" style="position: center;">

          <form action="<?= base_url("Home/proses_transaksi")?>" method="post" >
            <div class="form-row">
              <div class="form-group col-lg-6">
                <label for="" class="">Layanan</label>
              </div>
              <div class="form-group col-lg-6">
                <label for="" class=""><?= $nomor?> - </label>
                <label for="" class=""><?= $operator?></label>
                <input type="hidden" name="nomor" value="<?= $nomor?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-lg-6" style="float: right;">
                <label for="" class="">Harga</label>
              </div>
              <div class="form-group col-lg-6">
                <label for="" class=""><?= $harga?></label>                
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-lg-6">
                <label for="" class="">Keanggotaan</label>
              </div>
              <div class="form-group col-lg-6">
                <label for="" class=""><?= $anggota?></label>
              </div>
            </div>
           
            <div class="text-center">
              <button type="submit" name="cek_out">Checkout</button>
            </div>
          </form>
        </div>
      </div>

    </div>

  </div>
</section><!-- #contact -->
  </main>

  