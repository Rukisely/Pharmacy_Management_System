
<?php
error_reporting(0);
  $page_title = 'TRIPLE G-DLDM | All Supplier';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
  <?php include 'include/header.php';?>
        <style type="text/css">
          .btn{
            cursor: pointer;
          }
        </style>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-truck"></i> Supplier</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Suppliers</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="add-supplier.php" class="btn btn-sm btn-info text-white"><i class="fa fa-plus"></i> Add Supplier</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Supplier Name</th>
                          <th>Contact</th>
                          <th>Email</th>
                          <th>Complete Address</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <tr>
                          <td>Supplier 1</td>
                          <td>+6392978376192</td>
                          <td>supplier1@gmail.com</td>
                          <td>456 Boni Av. Mandaluyong, Metro Manila</td>
                          <td>
                              <a class="btn btn-sm btn-success text-white"><i class="fa fa-edit"></i> edit</a>
                              <a class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> delete</a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include 'include/footer.php';?>
  </body>
</html>
