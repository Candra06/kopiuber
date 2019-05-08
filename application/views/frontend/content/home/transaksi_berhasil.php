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
      <h3>Transaksi Berhasil</h3>
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

      <div class="col-lg-8" style="margin-left: auto; margin-right:auto;">

        <div class="form" style="position: center;">

          <form action="<?= base_url("Home")?>" method="post" >
            <div class="form-row">
              <div class="form-group col-lg-12">
                <p style="color: #f70408;">*Note : Pembayaran dilakukan secara CASH melalui Pak Asep - Pelayanan Kelas FISIP (0823-0233-6430) </p>
                <p style="color: #f70408;">-> Alfareza - Administasi Negara'18 (0853-2226-0296)</p>
                <p style="color: #f70408;">-> Dara Administrasi Bisnis'18 (0815-1541-4340)</p>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" name="cek_out">SELESAI</button>
            </div>
          </form>
        </div>
      </div>

    </div>

  </div>
</section><!-- #contact -->
  </main>

  