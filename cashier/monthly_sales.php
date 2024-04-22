
<?php
error_reporting(0);
  $page_title = 'TRIPLE G-DLDM | Monthly Sales';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>

<?php
 $year = date('Y');
 $sales = monthlySales($year);
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
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daily Sales</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th> Product name </th>
                <th class="text-center" style="width: 15%;"> Quantity sold</th>
                <th class="text-center" style="width: 15%;"> Price per each</th>
                <th class="text-center" style="width: 15%;"> Total </th>
                <th class="text-center" style="width: 15%;"> Date </th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($sales as $sale):?>
                        <tr>
                          <td class="text-center"><?php echo count_id();?></td>
                          <td><?php echo remove_junk($sale['name']); ?></td>
                          <td class="text-center"><?php echo (int)$sale['qty']; ?></td>
                          <td class="text-center"><?php echo remove_junk($sale['price']); ?></td>
                          <td class="text-center"><?php echo remove_junk($sale['total_saleing_price']); ?></td>
                          <td class="text-center"><?php echo $sale['date']; ?></td>
                        </tr>
             <?php endforeach;?>
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
