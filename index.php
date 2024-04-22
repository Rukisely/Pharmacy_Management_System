


<?php
  ob_start();
  require_once('includes/load.php');
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pharmacy Management System </title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="build/images/logo.png" />
  </head>

  <body class="login">
      <div class="login_wrapper">
        <div class="row">
          <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
              <div class="x_title">
                <center><img src="build/images/logo.png" alt="..." width="200"></center>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <?php echo display_msg($msg); ?>
              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
               method="post" action="auth_2.php">
              <div class="item form-group">
                <div class="col-md-12 col-sm-12  form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" name="username" placeholder="Username">
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12  form-group has-feedback">
                  <input type="password" class="form-control has-feedback-left" name="password" placeholder="*************">
                  <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="item form-group">
                <div class="col-md-12 col-sm-12">
                  <center>
                    <button type="submit" class="btn" style="background-color: rgb(22, 104, 122);color: rgb(192, 202, 211);">Login</button>
                  </center>
                </div>
              </div>

              </form>
              </div>
            </div>
          </div>
        </div>
        </div>
        <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

    
    <!-- Chart.js -->
    <script src="vendors/Chart.js/Chart.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
  </body>
</html>
