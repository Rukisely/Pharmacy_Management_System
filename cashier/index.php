



  <?php 
  $page_title = 'TRIPLE G-DLDM | Dashboard';
  include 'include/header.php';
  //page_require_level(1);
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
<?php
$sales = find_all_sale();
?>
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
                  <div class="row">
                    <center>
                    <div class="tile_count">
                      <div class="col-md-6 col-sm-6  tile_stats_count">
                        <span class="count_top"><i class="fa fa-money"></i> Number of Sales</span>
                        <div class="count"><?php  echo $c_sale['total']; ?></div>
                      </div>
                      <div class="col-md-6 col-sm-6  tile_stats_count">
                        <span class="count_top"><i class="fa fa-dollar"></i> Total Sales</span>
                        <div class="count"><?php  echo $c_sale['total']; ?></div>
                      </div>
                    </div>
                  </center>
</div>
                  <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sales Amount</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="lineChart"></canvas>
                  </div>
                </div>
              </div>              
              <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Top 10 Selling Items</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table class="table table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Item Name</th>
                          <th>Quantity</th>
                          <th>Price</th>
                          <th>date</th>
                        </tr>
                      </thead>
                        <?php foreach ($sales as $sale):?>
             <tr>
               <td class="text-center"><?php echo count_id();?></td>
               <td><?php echo remove_junk($sale['name']); ?></td>
               <td class="text-center"><?php echo (int)$sale['qty']; ?></td>
               <td class="text-center"><?php echo remove_junk($sale['price']); ?></td>
               <td class="text-center"><?php echo $sale['date']; ?></td>
               
             </tr>
             <?php endforeach;?>
                      <tbody>
                        
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
        </div>
      </div>
    </div>

    <?php include 'include/footer.php';?>
  </body>
</html>
