<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket Plus">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracketplus">
    <meta property="og:title" content="Bracket Plus">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title><?= $title ?></title>

    <!-- vendor css -->
    <link href="<?= base_url() ?>asset/app/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/app/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/app/lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/app/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/app/lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/app/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/app/lib/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/app/css/bracket.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/app/css/bracket.simple-white.css">

    <script src="<?= base_url() ?>asset/app/lib/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/moment/min/moment.min.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/peity/jquery.peity.min.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/rickshaw/vendor/d3.min.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/rickshaw/vendor/d3.layout.min.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/rickshaw/rickshaw.min.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/jquery.flot/jquery.flot.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/echarts/echarts.min.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/select2/js/select2.full.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg"></script>
    <script src="<?= base_url() ?>asset/app/lib/gmaps/gmaps.min.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/select2/js/select2.min.js"></script>
    

    <script src="<?= base_url() ?>asset/app/js/bracket.js"></script>
    <script src="<?= base_url() ?>asset/app/lib/highlightjs/highlight.pack.min.js"></script>
    <script src="<?= base_url() ?>asset/app/js/map.shiftworker.js"></script>
    <script src="<?= base_url() ?>asset/app/js/ResizeSensor.js"></script>
    <script src="<?= base_url() ?>asset/app/js/dashboard.js"></script>

    <script>
      $(function(){
        

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            
          }
        });
        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
  </head>

  <body>

    <?php

        include str_replace("system", "application/views/login/", BASEPATH)."layout/content.php";
    ?>

  </body>
</html>
