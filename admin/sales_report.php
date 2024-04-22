
<?php
error_reporting(0);
  $page_title = 'TRIPLE G-DLDM | Sales By Dates';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>

  <?php include 'include/header.php';?>


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="col-sm-12">
                <?php echo display_msg($msg); ?>
            </div>
              <div class="title_left">
                <h4><i class="fa fa-medkit"></i> Add Medicine</h3>
              </div>
            </div>

            <div class="clearfix"></div>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Medicine Information</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form id="demo-form2" method="post" action="sale_report_process.php" data-parsley-validate class="form-horizontal form-label-left">
                  <div class="row">
                  <div class="col-md-6 col-sm-4">
                    <input type="date" name="start-date" class="form-control has-feedback-left" placeholder="" value="" >
                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                  </div>
                  <div class="col-md-6 col-sm-4">
                    <input type="date" name="end-date" class="form-control has-feedback-left" placeholder="" value="" >
                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                  </div><br><br><br>
                  <div class="col-md-12 col-sm-12 ">
                      <button class="btn btn-primary" type="button">Cancel</button>
                      <button type="submit" name="submit" class="btn btn-success">Submit</button>
                  </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include 'include/footer.php';?>
  </body>
</html>
