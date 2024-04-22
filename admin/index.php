


<?php
error_reporting(0);
  $page_title = 'TRIPLE G-DLDM | Dashboard';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
 $c_categorie     = count_by_id('categories');
 $c_product       = count_by_id('products');
 $c_sale          = count_by_id('sales');
 $c_user          = count_by_id('users');
 $products_sold   = find_higest_saleing_product('10');
 $recent_products = find_recent_product_added('5');
 $recent_sales    = find_recent_sale_added('5')
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
                <h3><i class="fa fa-dashboard"></i> Dashboard</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_content">
                    <center>
                    <div class="tile_count">
                      <div class="col-md-3 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-users"></i> Total users </span>
                        <div class="count"><?php  echo $c_user['total']; ?></div>
                      </div>
                      <div class="col-md-3 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-medkit"></i> Total Medicine</span>
                        <div class="count"><?php  echo $c_product['total']; ?> </div>
                      </div>
                      <div class="col-md-3 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-desktop"></i> Total Sales</span>
                        <div class="count"><?php  echo $c_sale['total']; ?></div>
                      </div>
                      <div class="col-md-3 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-list"></i> category</span>
                        <div class="count"><?php  echo $c_categorie['total']; ?></div>
                      </div>
                    </div>
                  </center>
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