<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Parallax, Template, Registration, Landing">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">

   

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title><?= $tittle ?></title>

    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/frontend/css/line-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/frontend/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/frontend/css/owl.theme.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/frontend/css/nivo-lightbox.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/frontend/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/frontend/css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/frontend/css/animate.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/frontend/css/main.css">    
    <link rel="stylesheet" href="<?= base_url() ?>asset/frontend/css/responsive.css">

     <script src="<?= base_url() ?>asset/frontend/js/jquery-min.js"></script>
    <script src="<?= base_url() ?>asset/frontend/js/popper.min.js"></script>
    <script src="<?= base_url() ?>asset/frontend/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>asset/frontend/js/jquery.mixitup.js"></script>
    <script src="<?= base_url() ?>asset/frontend/js/nivo-lightbox.js"></script>
    <script src="<?= base_url() ?>asset/frontend/js/owl.carousel.js"></script>    
    <script src="<?= base_url() ?>asset/frontend/js/jquery.stellar.min.js"></script>    
    <script src="<?= base_url() ?>asset/frontend/js/jquery.nav.js"></script>    
    <script src="<?= base_url() ?>asset/frontend/js/scrolling-nav.js"></script>    
    <script src="<?= base_url() ?>asset/frontend/js/jquery.easing.min.js"></script>    
    <script src="<?= base_url() ?>asset/frontend/js/smoothscroll.js"></script>    
    <script src="<?= base_url() ?>asset/frontend/js/jquery.slicknav.js"></script>     
    <script src="<?= base_url() ?>asset/frontend/js/wow.js"></script>   
    <script src="<?= base_url() ?>asset/frontend/js/jquery.vide.js"></script>
    <script src="<?= base_url() ?>asset/frontend/js/jquery.counterup.min.js"></script>    
    <script src="<?= base_url() ?>asset/frontend/js/jquery.magnific-popup.min.js"></script>    
    <script src="<?= base_url() ?>asset/frontend/js/waypoints.min.js"></script>    
    <script src="<?= base_url() ?>asset/frontend/js/form-validator.min.js"></script>
    <script src="<?= base_url() ?>asset/frontend/js/contact-form-script.js"></script>   
    <script src="<?= base_url() ?>asset/frontend/js/main.js"></script>

    <script src="<?= base_url() ?>asset/app/lib/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  </head>

  <body>

    <?php
        if(isset($_SESSION['email'])){
            if($_SESSION['email']){
                redirect(base_url('dashboard'));
            }
        }

        include str_replace("system", "application/views/frontend/", BASEPATH)."layout/content.php";
    ?>

  </body>
</html>
